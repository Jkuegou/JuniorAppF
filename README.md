<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# MultiAuthApp

Here is a Laravel application implementing multi-way authentication (Admin and User) for a couple of my students at Localhost academy Yaounde.

## **Table of Contents**

1. [Prerequisites](#prerequisites)
2. [Installation](#installation)
3. [Configuration](#configuration)
4. [Testing the Application](#testing-the-application)
5. [Usage](#usage)

---

## **Prerequisites**

Before setting up the project, make sure you have the following installed:

- **PHP (>= 8.0)**  
- **Composer**  
- **MySQL / MariaDB**  
- **Node.js** (for frontend assets)  
- **Git**

---

## **Installation**

### 1. **Clone the Repository**

To clone this project to your local machine, open a terminal and run:
```bash
git clone https://github.com/FOMUBAD-BORISTA-FONDI/MultiAuthApp.git
```

```bash
cd MultiAuthApp
```

### 2. **Install PHP Dependencies**

Run the following command to install Laravel’s PHP dependencies using Composer:
```bash
composer install
```
### 3. **Install Frontend Dependencies**

You will need to install frontend dependencies using **npm** (Node.js package manager):
```bash
npm install
```
---

## **Configuration**

### 1. **Create `.env` File**

Laravel uses an `.env` file to manage environment-specific settings. To create the `.env` file, copy the example file:
```bash
cp .env.example .env
```
### 2. **Generate Application Key**

Laravel requires an application key. Run the following command to generate it:
```bash
php artisan key:generate
```
### 3. **Set Up Database**

Make sure you have MySQL (or MariaDB) running. Update your `.env` file with the correct database configuration:

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=multi_auth_app
DB_USERNAME=your_username(root)
DB_PASSWORD=your_password
```

### 4. **Migrate Database**

Run migrations to set up the required tables in your database:
```bash
php artisan migrate
```
### 5. **Seed the Database**

You can seed the database with an admin user by running the following command:
```bash
php artisan db:seed --class=AdminSeeder
```
---

## **Testing the Application**

### 1. **Start the Development Server**

Once everything is set up, you can start the Laravel development server:

```bash
php artisan serve
```
The application should now be available at `http://localhost:8000`.

### 2. **Access the Application**

- **Admin Login:** The admin credentials can be found in the `AdminSeeder.php` file. By default, the admin user is:
  - Email: `admin@example.com`
  - Password: `password`
  
- **User Login:** You can register a user through the registration page or use the default user credentials.

---

## **Usage**

- Admin users will be directed to the admin dashboard, while regular users will be directed to the user dashboard.
- You can customize the user roles or authentication logic based on your needs.

---

## License**

This project is open-source and available under the [MIT License](LICENSE).


## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
