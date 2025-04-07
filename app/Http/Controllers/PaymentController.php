<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    /**
     * Affiche la page de paiement
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Tu peux récupérer les articles du panier à partir de la session ou d'une table temporaire
        // Voici un exemple avec des données statiques comme dans ton HTML
        $orderItems = [
            [
                'name' => 'Classic Beef Burger',
                'price' => 8.99,
                'quantity' => 2,
                'image_url' => 'https://images.unsplash.com/photo-1571091718767-18b5b1457add?ixlib=rb-4.0.3'
            ],
            [
                'name' => 'Berry Smoothie',
                'price' => 5.99,
                'quantity' => 1,
                'image_url' => 'https://images.unsplash.com/photo-1625807752781-544f90255196?ixlib=rb-4.0.3'
            ]
        ];
        
        // Calcul des totaux
        $subtotal = 0;
        foreach ($orderItems as $item) {
            $subtotal += $item['price'] * $item['quantity'];
        }
        
        $deliveryFee = 2.99;
        $tax = round($subtotal * 0.075, 2); // Exemple de taxe à 7.5%
        $total = $subtotal + $deliveryFee + $tax;
        
        return view('payment', compact('orderItems', 'subtotal', 'deliveryFee', 'tax', 'total'));
    }
    
    /**
     * Traite le paiement
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function process(Request $request)
    {
        // Validation des données du formulaire
        $validated = $request->validate([
            'cardName' => 'required|string|max:255',
            'cardNumber' => 'required|string|min:13|max:19',
            'expiryDate' => 'required|string|regex:/^\d{2}\/\d{2}$/',
            'cvv' => 'required|string|size:3',
            'billingAddress' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'zipCode' => 'required|string|max:20',
            'country' => 'required|string|max:100',
        ]);
        
        // Dans une vraie application, tu intégrerais ici un service de paiement comme Stripe
        // Exemple simplifié : création de l'ordre en base de données
        
        $order = Order::create([
            'user_id' => Auth::id(),
            'subtotal' => $request->session()->get('subtotal'),
            'delivery_fee' => $request->session()->get('deliveryFee'),
            'tax' => $request->session()->get('tax'),
            'total' => $request->session()->get('total'),
            'status' => 'paid',
            'billing_address' => $validated['billingAddress'],
            'billing_city' => $validated['city'],
            'billing_zip' => $validated['zipCode'],
            'billing_country' => $validated['country'],
            'payment_method' => 'credit_card',
        ]);
        
        // Enregistrement des articles de la commande
        // Dans un cas réel, tu récupérerais ces informations de ta session/panier
        $cartItems = $request->session()->get('cart', []);
        foreach ($cartItems as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['id'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
                'name' => $item['name']
            ]);
        }
        
        // Vider le panier après commande
        $request->session()->forget('cart');
        
        // Redirection vers la page de succès
        return redirect()->route('payment.success')->with('order_id', $order->id);
    }
    
    /**
     * Affiche la page de confirmation du paiement
     *
     * @return \Illuminate\View\View
     */
    public function success()
    {
        return view('payment');
    }
}