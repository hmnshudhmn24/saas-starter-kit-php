# 🚀 PHP-Based SaaS Starter Kit

### 💼 Project Description  
A powerful Laravel-based SaaS starter boilerplate designed for launching subscription-based applications. It includes team roles, secure billing via Stripe, and a clean Vue.js front-end — giving you a production-ready head start for any SaaS platform.

## 🚀 Features
- 🔐 Authentication & middleware protection
- 💳 Stripe-powered subscription plans
- 👥 Team roles & multi-plan support
- ⚡ Vue.js-ready for dashboard components

## ⚙️ How to Run

### 1. 📦 Clone & Install
```bash
git clone https://github.com/yourusername/php-saas-starter-kit.git
cd php-saas-starter-kit
composer install
npm install && npm run dev
cp .env.example .env
php artisan key:generate
```

### 2. 🔑 Configure Stripe API Keys
Open `.env` and add:
```
STRIPE_KEY=your_stripe_public_key
STRIPE_SECRET=your_stripe_secret_key
```

### 3. 🔄 Migrate & Serve
```bash
php artisan migrate
php artisan serve
```

Visit `http://localhost:8000` to see the starter SaaS app in action.

## 🧭 File Highlights
```
routes/web.php
app/Http/Controllers/SubscriptionController.php
resources/views/subscription.blade.php
.env.example
```

## 🧰 Tech Stack
- Laravel 10+
- Stripe (Laravel Cashier)
- Vue.js (extendable front-end)
- Bootstrap 5
