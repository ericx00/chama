<?php

$dbFile = __DIR__ . '/database/chama.sqlite';

// Create PDO connection
$pdo = new PDO("sqlite:$dbFile");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Create users table
$pdo->exec("
    CREATE TABLE IF NOT EXISTS users (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        name VARCHAR(255),
        email VARCHAR(255) UNIQUE,
        email_verified_at TIMESTAMP NULL,
        password VARCHAR(255),
        remember_token VARCHAR(100),
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )
");

// Create members table
$pdo->exec("
    CREATE TABLE IF NOT EXISTS members (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        user_id INTEGER NOT NULL,
        member_code VARCHAR(50) UNIQUE,
        status TEXT CHECK(status IN ('active', 'inactive', 'suspended')),
        join_date DATE,
        share_price DECIMAL(10, 2),
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (user_id) REFERENCES users(id)
    )
");

// Create contributions table
$pdo->exec("
    CREATE TABLE IF NOT EXISTS contributions (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        member_id INTEGER NOT NULL,
        amount DECIMAL(10, 2),
        contribution_date DATE,
        status TEXT CHECK(status IN ('pending', 'verified')),
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (member_id) REFERENCES members(id)
    )
");

// Create loans table
$pdo->exec("
    CREATE TABLE IF NOT EXISTS loans (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        member_id INTEGER NOT NULL,
        amount DECIMAL(10, 2),
        interest_rate DECIMAL(5, 2),
        loan_date DATE,
        due_date DATE,
        status TEXT CHECK(status IN ('pending', 'approved', 'rejected', 'repaid')),
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (member_id) REFERENCES members(id)
    )
");

// Create repayments table
$pdo->exec("
    CREATE TABLE IF NOT EXISTS repayments (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        loan_id INTEGER NOT NULL,
        amount DECIMAL(10, 2),
        repayment_date DATE,
        status TEXT CHECK(status IN ('pending', 'received')),
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (loan_id) REFERENCES loans(id)
    )
");

// Create meetings table
$pdo->exec("
    CREATE TABLE IF NOT EXISTS meetings (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        title VARCHAR(255),
        description TEXT,
        meeting_date DATE,
        location VARCHAR(255),
        status TEXT CHECK(status IN ('scheduled', 'completed', 'cancelled')),
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )
");

// Create meeting_attendees table
$pdo->exec("
    CREATE TABLE IF NOT EXISTS meeting_attendees (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        meeting_id INTEGER NOT NULL,
        member_id INTEGER NOT NULL,
        attendance_status TEXT CHECK(attendance_status IN ('present', 'absent', 'excused')),
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (meeting_id) REFERENCES meetings(id),
        FOREIGN KEY (member_id) REFERENCES members(id)
    )
");

// Create meeting_attachments table
$pdo->exec("
    CREATE TABLE IF NOT EXISTS meeting_attachments (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        meeting_id INTEGER NOT NULL,
        file_path VARCHAR(255),
        file_name VARCHAR(255),
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (meeting_id) REFERENCES meetings(id)
    )
");

// Create admin user
$pdo->exec("
    INSERT OR IGNORE INTO users (id, name, email, password, created_at, updated_at)
    VALUES (1, 'Admin', 'admin@chama.local', '\$2y\$10\$xyz', datetime('now'), datetime('now'))
");

echo "✅ Database tables created successfully!\n";
