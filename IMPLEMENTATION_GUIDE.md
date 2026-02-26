# CHAMA DIGITAL RECORD-KEEPING SYSTEM
## Complete Implementation Guide

### 📋 Table of Contents
1. [Overview](#overview)
2. [System Architecture](#system-architecture)
3. [Database Schema](#database-schema)
4. [Installation & Setup](#installation--setup)
5. [Core Features](#core-features)
6. [User Roles & Permissions](#user-roles--permissions)
7. [API Endpoints](#api-endpoints)
8. [Deployment Guide](#deployment-guide)

---

## Overview

The Chama Digital Record-Keeping System is a web-based application designed for rotating savings and credit associations (CHAMAs) in Kenya. It simplifies member management, contribution tracking, loan processing, and financial reporting.

### Key Features:
✅ **Member Management** - Register and manage chama members  
✅ **Contribution Tracking** - Record and track member contributions  
✅ **Loan Management** - Process loan requests with approval workflow  
✅ **Repayment System** - Track repayments and outstanding balances  
✅ **Meetings Module** - Schedule meetings and record minutes  
✅ **Financial Reports** - Generate PDF reports with comprehensive analytics  
✅ **Role-Based Access** - Admin and member-level permissions  

---

## System Architecture

### Technology Stack
```
Frontend: HTML5, CSS3 (Tailwind CSS), JavaScript (Alpine.js)
Backend: Laravel 10+
Database: MySQL 5.7+ or PostgreSQL 10+
Additional Tools: DOMPDF (for PDF generation)
```

### Directory Structure
```
chama/
├── app/
│   ├── Models/              # Database models
│   │   ├── User.php
│   │   ├── Member.php
│   │   ├── Contribution.php
│   │   ├── Loan.php
│   │   ├── Repayment.php
│   │   ├── Meeting.php
│   │   └── MeetingAttachment.php
│   └── Http/
│       ├── Controllers/     # Application controllers
│       │   ├── DashboardController.php
│       │   ├── MemberController.php
│       │   ├── ContributionController.php
│       │   ├── LoanController.php
│       │   ├── RepaymentController.php
│       │   ├── MeetingController.php
│       │   └── ReportController.php
│       └── Middleware/
├── database/
│   ├── migrations/          # Database migrations
│   └── seeders/             # Sample data seeders
├── resources/
│   ├── views/               # Blade templates
│   ├── css/                 # Tailwind CSS
│   └── js/                  # Frontend scripts
├── routes/
│   └── web.php              # Web routes
└── public/                  # Static files
```

---

## Database Schema

### Tables Overview

#### Users Table
- id (Primary Key)
- name (string)
- email (unique)
- password (hashed)
- role (enum: admin, member)
- phone (string)
- member_id (Foreign Key - nullable)

#### Members Table
- id (Primary Key)
- name (string)
- phone (unique)
- id_number (unique) - National ID
- email (unique, nullable)
- address (text, nullable)
- date_joined (date)
- status (enum: active, inactive, suspended)

#### Contributions Table
- id (Primary Key)
- member_id (Foreign Key)
- amount (decimal)
- date (date)
- month (integer)
- year (year)
- notes (text, nullable)

#### Loans Table
- id (Primary Key)
- member_id (Foreign Key)
- amount (decimal)
- interest_rate (decimal)
- status (enum: pending, approved, rejected, fully_repaid)
- approved_date (datetime, nullable)
- approval_notes (text, nullable)
- due_date (date, nullable)
- balance_remaining (decimal, nullable)

#### Repayments Table
- id (Primary Key)
- loan_id (Foreign Key)
- member_id (Foreign Key)
- amount (decimal)
- date (date)
- notes (text, nullable)

#### Meetings Table
- id (Primary Key)
- title (string)
- description (text, nullable)
- scheduled_date (datetime)
- location (string, nullable)
- status (enum: scheduled, completed, cancelled)
- minutes (longText, nullable)
- created_by (Foreign Key - users)

#### Meeting Attendees Table
- id (Primary Key)
- meeting_id (Foreign Key)
- member_id (Foreign Key)
- attended (boolean)

#### Meeting Attachments Table
- id (Primary Key)
- meeting_id (Foreign Key)
- filename (string)
- file_path (string)
- file_type (string)
- uploaded_by (Foreign Key - users)

---

## Installation & Setup

### Prerequisites
- PHP 8.0 or higher
- Composer
- MySQL 5.7+ or PostgreSQL 10+
- Node.js 14+ (for frontend tools)
- Git

### Step-by-Step Installation

#### 1. Clone the Repository
```bash
cd c:\Users\user\Desktop
git clone <repository-url> chama
cd chama
```

#### 2. Install Dependencies
```bash
composer install
npm install
```

#### 3. Environment Configuration
```bash
cp .env.example .env
```

Edit `.env` file with your database credentials:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=chama_db
DB_USERNAME=root
DB_PASSWORD=your_password
```

#### 4. Generate Application Key
```bash
php artisan key:generate
```

#### 5. Run Migrations
```bash
php artisan migrate
```

#### 6. Seed Database (Optional - for sample data)
```bash
php artisan db:seed
```

#### 7. Build Frontend Assets
```bash
npm run dev
```

#### 8. Start Development Server
```bash
php artisan serve
```

Visit: `http://localhost:8000`

---

## Core Features

### 1. Member Management
**URL:** `/members`

- **List Members:** View all registered chama members
- **Add Member:** Register new member with details
- **View Member Profile:** See member's full history
- **Edit Member:** Update member information
- **Delete Member:** Remove inactive members
- **Search Members:** Find by name, ID, or phone

### 2. Contribution Management
**URL:** `/contributions`

- **Record Contribution:** Add member contribution
- **View History:** See all contributions
- **Monthly Report:** Generate monthly summaries
- **Member Contributions:** View per-member totals

### 3. Loan Management
**URL:** `/loans`

- **Request Loan:** Members submit loan applications
- **Approve/Reject:** Admin approval workflow
- **View Loans:** List all loans with status
- **Pending Loans:** Filter loans awaiting approval
- **Outstanding Loans:** Track active loans

### 4. Repayment Tracking
**URL:** `/repayments`

- **Record Repayment:** Add repayment transactions
- **Payment History:** View all repayments
- **Overdue Alerts:** Identify late payments
- **Loan Statements:** Get detailed repayment info

### 5. Meetings Module
**URL:** `/meetings`

- **Schedule Meeting:** Create new meetings
- **Mark Attendance:** Record member attendance
- **Record Minutes:** Document meeting discussions
- **Upload Attachments:** Attach agendas, decisions
- **View History:** Access past meetings

### 6. Financial Reports
**URL:** `/reports`

- **Contributions Report:** PDF export of all contributions
- **Loans Report:** Complete loan portfolio summary
- **Financial Summary:** Overall chama financials
- **Charts & Analytics:** Visual data representation

---

## User Roles & Permissions

### Administrator (Treasurer/Secretary/Chairperson)
```
✓ Full system access
✓ Add/edit/delete members
✓ Approve/reject loans
✓ Generate all reports
✓ Manage meetings
✓ View all financial data
```

### Regular Member
```
✓ View own profile
✓ View own contributions
✓ Submit loan requests
✓ View own loan status
✓ View announcements
✓ Access meeting information
✗ Cannot edit records
✗ Cannot approve loans
✗ Cannot delete data
```

---

## API Endpoints

### Authentication
```
POST   /login              - User login
POST   /logout             - User logout
```

### Members
```
GET    /members            - List all members
POST   /members            - Create new member
GET    /members/{id}       - View member details
PUT    /members/{id}       - Update member
DELETE /members/{id}       - Delete member
GET    /members/search     - Search members
```

### Contributions
```
GET    /contributions      - List contributions
POST   /contributions      - Record contribution
GET    /contributions/{id} - View contribution
GET    /contributions/monthly-report - Monthly report
GET    /members/{id}/contributions - Member's contributions
```

### Loans
```
GET    /loans              - List all loans
POST   /loans              - Request new loan
GET    /loans/{id}         - View loan details
POST   /loans/{id}/approve - Approve loan (Admin)
POST   /loans/{id}/reject  - Reject loan (Admin)
GET    /loans/pending      - Pending loans (Admin)
GET    /loans/outstanding  - Outstanding loans
```

### Repayments
```
GET    /repayments         - List repayments
POST   /repayments         - Record repayment
GET    /loans/{id}/repayments - Loan repayments
GET    /repayments/overdue - Overdue loans (Admin)
```

### Meetings
```
GET    /meetings           - List meetings
POST   /meetings           - Create meeting
GET    /meetings/{id}      - View meeting details
PUT    /meetings/{id}      - Update meeting
POST   /meetings/{id}/attend - Mark attendance
```

### Reports
```
GET    /reports            - Reports dashboard
GET    /reports/contributions/pdf - Download contributions PDF
GET    /reports/loans/pdf  - Download loans PDF
GET    /reports/financial/pdf - Download financial PDF
```

---

## Deployment Guide

### Shared Hosting Deployment (cPanel)

#### 1. Prepare Files
```bash
# Optimize for production
composer install --optimize-autoloader --no-dev
npm run build
php artisan optimize
```

#### 2. Upload to Server
- Upload all files via FTP to public_html or subdirectory
- Upload via cPanel File Manager

#### 3. Configure Database
- Create MySQL database in cPanel
- Create database user with full privileges
- Import initial schema

#### 4. Set Permissions
```bash
chmod 755 storage
chmod 755 bootstrap/cache
```

#### 5. Update .env
```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://yourdomain.com
```

#### 6. Run Migrations
```bash
php artisan migrate --force
```

### Laravel Forge Deployment

#### 1. Create Server
- New Forge server (Ubuntu/CentOS)
- Configure SSH keys

#### 2. Create Site
```bash
forge site:create chama.example.com
```

#### 3. Configure GitHub
- Connect GitHub repository
- Enable auto-deployment

#### 4. Database Setup
- Create PostgreSQL/MySQL database
- Run migrations automatically

#### 5. SSL Certificate
```bash
forge certificate:issue chama.example.com
```

---

## Configuration Files

### Key Configuration Areas

#### database/seeders/DatabaseSeeder.php
```php
// Create admin user
User::create([
    'name' => 'Administrator',
    'email' => 'admin@chama.local',
    'password' => bcrypt('password'),
    'role' => 'admin',
]);
```

#### config/app.php
```php
'timezone' => 'Africa/Nairobi',
'locale' => 'en',
```

---

## Default Credentials

**Administrator:**
- Email: `admin@chama.local`
- Password: `password`

**Member:**
- Email: `member@chama.local`
- Password: `password`

⚠️ **Change these immediately in production!**

---

## Troubleshooting

### Common Issues & Solutions

#### Issue: Migration Errors
```bash
# Solution: Reset and re-migrate
php artisan migrate:refresh
php artisan db:seed
```

#### Issue: File Upload Errors
```bash
# Check permissions
chmod -R 755 storage/
chmod -R 755 bootstrap/cache/
```

#### Issue: Database Connection Failed
```bash
# Clear cache
php artisan cache:clear
php artisan config:cache
```

---

## Support & Maintenance

### Regular Maintenance Tasks
1. **Backup Database:** Weekly automated backups
2. **Update Dependencies:** Monthly security updates
3. **Monitor Logs:** Check storage/logs/ regularly
4. **User Management:** Archive inactive accounts

### Performance Optimization
1. Enable database query caching
2. Implement Redis for session storage
3. Use CDN for static assets
4. Optimize PDF generation

---

## Additional Resources

### Documentation
- [Laravel Documentation](https://laravel.com/docs)
- [Tailwind CSS Guide](https://tailwindcss.com/docs)
- [DOMPDF Guide](https://github.com/barryvdh/laravel-dompdf)

### Support
- Email: support@chama.local
- Issues: GitHub Issues
- Documentation: /docs

---

**Last Updated:** November 2025  
**Version:** 1.0.0  
**License:** MIT
