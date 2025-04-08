@extends('layouts.app')

@section('title', 'dashboardM')
@section('header', 'Tableau de bord')

@section('content')
    <div class="row">
        <div class="col-md-3 mb-4">
            <div class="card text-white bg-primary">
                <div class="card-body">
                    <h5 class="card-title">Restaurants</h5>
                    <p class="card-text display-4">25</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card text-white bg-success">
                <div class="card-body">
                    <h5 class="card-title">Commandes du jour</h5>
                    <p class="card-text display-4">156</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card text-white bg-warning">
                <div class="card-body">
                    <h5 class="card-title">Utilisateurs</h5>
                    <p class="card-text display-4">1254</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card text-white bg-danger">
                <div class="card-body">
                    <h5 class="card-title">Livreurs actifs</h5>
                    <p class="card-text display-4">48</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header">
                    Commandes récentes
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Client</th>
                                <th>Restaurant</th>
                                <th>Montant</th>
                                <th>Statut</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>#12345</td>
                                <td>Jean Dupont</td>
                                <td>Pizza Express</td>
                                <td>24.99€</td>
                                <td><span class="badge bg-success">Livrée</span></td>
                            </tr>
                            <tr>
                                <td>#12344</td>
                                <td>Marie Martin</td>
                                <td>Sushi Bar</td>
                                <td>32.50€</td>
                                <td><span class="badge bg-warning">En cours</span></td>
                            </tr>
                            <tr>
                                <td>#12343</td>
                                <td>Pierre Dubois</td>
                                <td>Burger House</td>
                                <td>18.75€</td>
                                <td><span class="badge bg-info">Préparation</span></td>
                            </tr>
                            <tr>
                                <td>#12342</td>
                                <td>Sophie Leroy</td>
                                <td>Pasta Palace</td>
                                <td>29.90€</td>
                                <td><span class="badge bg-success">Livrée</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Revenus mensuels
                </div>
                <div class="card-body">
                    <canvas id="revenueChart" height="250"></canvas>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('revenueChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin'],
                datasets: [{
                    label: 'Revenus (K€)',
                    data: [12, 19, 15, 22, 25, 30],
                    backgroundColor: 'rgba(255, 107, 0, 0.2)',
                    borderColor: 'rgba(255, 107, 0, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
