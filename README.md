# Student Feedback System (PHP & MySQL)

A simple PHP-based Student Feedback System that allows students to submit feedback and administrators to log in and view feedback data.  
Built using **PHP**, **MySQL**, and **XAMPP**.

---

## 🚀 Requirements

Make sure you have the following installed:

- Windows 10 / 11
- **XAMPP** (Apache + MySQL)
- PHP **8.x** (comes with XAMPP)
- Web browser (Chrome, Edge, Firefox)

---

## 📦 Project Structure

```

student_feedback/
│
├── admin_login.php
├── db_connect.php
├── index.php
├── submit_feedback.php
├── assets/
│   └── css/
├── database/
│   └── student_feedback.sql
└── README.md

```

---

## ⚙️ XAMPP SETUP (IMPORTANT)

### 1️⃣ Install XAMPP
Download and install XAMPP from:  
👉 https://www.apachefriends.org/index.html

During installation:
- Enable **Apache**
- Enable **MySQL**

---

### 2️⃣ Start Services
Open **XAMPP Control Panel** and start:
- ✅ Apache
- ✅ MySQL

Both should turn **green**.

---

### 3️⃣ Move Project Folder
Copy your project folder to:

```

C:\xampp\htdocs\student_feedback

```

⚠️ **Do NOT run PHP projects directly from Downloads** when using XAMPP.

---

## 🗄️ DATABASE SETUP (MySQL)

### 1️⃣ Open phpMyAdmin
Go to:
```

[http://localhost/phpmyadmin](http://localhost/phpmyadmin)

````

---

### 2️⃣ Create Database
Click **New**, then:

- Database name: `student_feedback`
- Collation: `utf8mb4_general_ci`
- Click **Create**

---

### 3️⃣ Create Tables (SQL)

Run this SQL inside the database:

```sql
CREATE TABLE admins (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE feedback (
    id INT AUTO_INCREMENT PRIMARY KEY,
    student_name VARCHAR(100),
    reg_number VARCHAR(50),
    message TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Default admin login
INSERT INTO admins (username, password)
VALUES ('admin', MD5('admin123'));
````

---

## 🔌 DATABASE CONNECTION (db_connect.php)

Make sure your `db_connect.php` looks like this:

```php
<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "student_feedback";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}
?>
```

✅ **XAMPP default MySQL user is `root` with NO password**

---

## ▶️ RUNNING THE PROJECT

### Option A: Using Apache (Recommended)

Open browser and go to:

```
http://localhost/student_feedback/
```

Admin login:

```
http://localhost/student_feedback/admin_login.php
```

---

### Option B: PHP Built-in Server (Optional)

If you insist on using CLI:

```powershell
cd C:\xampp\htdocs\student_feedback
php -S localhost:8000
```

Then open:

```
http://localhost:8000
```

⚠️ MySQL **MUST be running in XAMPP**, or you’ll get:

```
No connection could be made because the target machine actively refused it
```

---

## ❌ COMMON ERRORS & FIXES

### ❗ Error: Connection Refused

**Cause:** MySQL is not running
**Fix:** Start MySQL in XAMPP Control Panel

---

### ❗ Error: php.exe not found

**Fix:**
Add PHP to PATH:

```
C:\xampp\php
```

Restart terminal.

---

### ❗ Port 3306 Error

**Fix:**

* Open XAMPP → Config → Service & Port Settings
* Ensure MySQL port is **3306**

---

## 🔐 DEFAULT ADMIN LOGIN

```
Username: admin
Password: admin123
```

(Change this before production.)

---

## 🛠️ TECHNOLOGIES USED

* PHP 8.x
* MySQL
* XAMPP
* HTML / CSS
* phpMyAdmin

---

## 📄 LICENSE

This project is for **academic and learning purposes**.

---

## 👨‍💻 AUTHOR

Developed by **Ernest Mwaura**
Telegram: **@Mrmwas24**

```

