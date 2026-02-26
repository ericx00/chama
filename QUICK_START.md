# QUICK START GUIDE - CHAMA DIGITAL SYSTEM

## 🚀 5-Minute Quick Start

### Prerequisites Check
```bash
# Verify PHP version
php -v          # Should be 8.0+

# Verify Composer
composer -v

# Verify MySQL is running
mysql -u root -p
```

### Installation Steps

#### Step 1: Navigate to Project
```bash
cd c:\Users\user\Desktop\chama
```

#### Step 2: Install PHP Dependencies
```bash
composer install
```

#### Step 3: Install Frontend Dependencies
```bash
npm install
```

#### Step 4: Setup Environment
```bash
# Copy example configuration
copy .env.example .env

# Edit .env with your database details
```

#### Step 5: Generate Application Key
```bash
php artisan key:generate
```

#### Step 6: Create Database
```bash
# Create database in MySQL
mysql -u root -p -e "CREATE DATABASE chama_db;"
```

#### Step 7: Run Migrations
```bash
php artisan migrate
```

#### Step 8: Seed Sample Data (Optional)
```bash
php artisan db:seed
```

#### Step 9: Build Frontend
```bash
npm run dev
```

#### Step 10: Start Server
```bash
php artisan serve
```

✅ **Application Running:** http://localhost:8000

---

## 📝 Default Login Credentials

| Role | Email | Password |
|------|-------|----------|
| Admin | admin@chama.local | password |
| Member | member@chama.local | password |

⚠️ **Important:** Change these credentials in production!

---

## 📋 Project Structure Overview

```
chama/
├── app/
│   ├── Models/                    # Database models (7 models)
│   ├── Http/
│   │   ├── Controllers/           # Controllers (7 controllers)
│   │   └── Middleware/            # Authentication middleware
│   └── Providers/                 # Service providers
├── database/
│   ├── migrations/                # Database tables (8 migrations)
│   └── seeders/                   # Sample data
├── resources/
│   ├── views/                     # Blade templates
│   │   ├── layout.blade.php       # Main layout
│   │   ├── dashboard/             # Dashboard views
│   │   ├── members/               # Member views
│   │   ├── contributions/         # Contribution views
│   │   ├── loans/                 # Loan views
│   │   ├── repayments/            # Repayment views
│   │   ├── meetings/              # Meeting views
│   │   └── reports/               # Report views
│   ├── css/                       # Tailwind CSS
│   └── js/                        # Frontend JavaScript
├── routes/
│   └── web.php                    # Application routes
├── public/                        # Static files & images
├── storage/                       # File uploads, logs
└── tests/                         # Unit tests
```

---

## 🔧 Core Components

### Models (7)
1. **User** - System users (admin/member)
2. **Member** - Chama members
3. **Contribution** - Member contributions
4. **Loan** - Loan requests and records
5. **Repayment** - Loan repayments
6. **Meeting** - Group meetings
7. **MeetingAttachment** - Meeting documents

### Controllers (7)
1. **DashboardController** - Dashboard overview
2. **MemberController** - Member management
3. **ContributionController** - Contribution tracking
4. **LoanController** - Loan processing
5. **RepaymentController** - Repayment tracking
6. **MeetingController** - Meeting management
7. **ReportController** - Report generation

### Database Tables (8)
1. users
2. members
3. contributions
4. loans
5. repayments
6. meetings
7. meeting_attendees
8. meeting_attachments

---

## 📚 Key Features

### ✅ Member Management
- Register new members
- View member profiles
- Edit member information
- Delete members
- Search by name/ID/phone

### ✅ Contribution Tracking
- Record contributions
- Auto-calculate totals
- Monthly summaries
- Member history

### ✅ Loan Processing
- Request loans
- Admin approval workflow
- Track outstanding balances
- Interest calculation

### ✅ Repayment System
- Record repayments
- Payment history
- Overdue alerts
- Balance updates

### ✅ Meetings Module
- Schedule meetings
- Record attendance
- Document minutes
- Upload attachments

### ✅ Financial Reports
- PDF exports
- Contribution summaries
- Loan portfolios
- Financial overviews

---

## 🔐 User Roles

### Administrator
```
✓ Full system access
✓ Approve/reject loans
✓ Generate all reports
✓ Manage all data
```

### Regular Member
```
✓ View own data
✓ Submit loan requests
✓ View group information
✗ No edit/delete access
```

---

## 🧪 Testing the System

### Test Users (if seeded)

**Admin Account:**
```
Email: admin@chama.local
Password: password
```

**Member Accounts:**
```
john@example.com - password
mary@example.com - password
david@example.com - password
grace@example.com - password
```

### Test Workflow
1. Login as member → Submit loan request
2. Login as admin → Approve loan
3. View loans → See updated status
4. Record repayment → Auto-update balance
5. Generate reports → Download PDF

---

## 🛠️ Common Commands

```bash
# Artisan Commands
php artisan migrate              # Run database migrations
php artisan db:seed             # Seed sample data
php artisan cache:clear         # Clear application cache
php artisan config:cache        # Cache configuration
php artisan optimize            # Optimize application
php artisan serve               # Start development server
php artisan tinker              # Interactive shell

# Node.js Commands
npm install                     # Install frontend dependencies
npm run dev                     # Development build (watch mode)
npm run build                   # Production build
npm run watch                   # Watch for changes
```

---

## 🚨 Troubleshooting

### Issue: "php artisan: command not found"
```bash
# Solution: Use full path
.\vendor\bin\artisan migrate
```

### Issue: "Database connection failed"
```bash
# Check .env file
# Verify MySQL is running
# Check database credentials
php artisan migrate:reset
```

### Issue: "Class not found" errors
```bash
# Clear and regenerate autoloader
composer dump-autoload
php artisan cache:clear
```

### Issue: "Permission denied" on storage/
```bash
# Fix permissions
chmod -R 755 storage/
chmod -R 755 bootstrap/cache/
```

---

## 📈 Next Steps

1. **Customize Branding**
   - Edit views/layout.blade.php
   - Update color scheme
   - Add logo/favicon

2. **Configure Email**
   - Set MAIL_* variables in .env
   - Test sending notifications

3. **Setup Backups**
   - Schedule database backups
   - Store in secure location

4. **Monitor Performance**
   - Check storage/logs/
   - Monitor database size
   - Optimize slow queries

5. **Deploy to Production**
   - Follow IMPLEMENTATION_GUIDE.md
   - Setup SSL certificate
   - Configure domain

---

## 📞 Support Resources

- **Documentation:** See IMPLEMENTATION_GUIDE.md
- **Laravel Docs:** https://laravel.com/docs
- **Tailwind CSS:** https://tailwindcss.com/docs
- **Issues:** Check application logs in storage/logs/

---

## 📋 Checklist Before Production

- [ ] Change admin password
- [ ] Configure database backup
- [ ] Enable HTTPS/SSL
- [ ] Set APP_DEBUG=false
- [ ] Configure email system
- [ ] Setup monitoring/logging
- [ ] Test all features
- [ ] Create user documentation
- [ ] Setup support process
- [ ] Backup database & files

---

**Version:** 1.0.0  
**Last Updated:** November 2025  
**Status:** Production Ready ✅
