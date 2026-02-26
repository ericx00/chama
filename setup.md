# Chama Digital Record-Keeping System - Setup Guide

## Prerequisites
- PHP 8.0+
- Composer
- MySQL/PostgreSQL
- Node.js (for npm packages)

## Quick Start

### 1. Clone and Setup
```bash
composer install
npm install
cp .env.example .env
php artisan key:generate
```

### 2. Configure Database
Edit `.env` file with your database credentials:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=chama_db
DB_USERNAME=root
DB_PASSWORD=
```

### 3. Run Migrations
```bash
php artisan migrate
php artisan seed:database
```

### 4. Start Development Server
```bash
php artisan serve
npm run dev
```

Visit: `http://localhost:8000`

## Default Login Credentials
- **Admin**: admin@chama.local / password
- **Member**: member@chama.local / password

## Project Structure
- `app/Models` - Database models
- `app/Http/Controllers` - Controllers
- `database/migrations` - Database tables
- `database/seeders` - Sample data
- `resources/views` - Blade templates
- `resources/css` - Tailwind CSS
- `public/` - Static files
