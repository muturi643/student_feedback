# Student Feedback System (PHP & MySQL)

A simple **Student Complaint / Feedback Management System** built with **PHP**, **MySQL**, **HTML**, and **CSS**.  
Students can submit complaints, while admins can log in, view, and manage feedback via a dashboard.

---

## 📁 Project Structure

```

student_feedback/
│
├── index.html          # Student Complaint Form (Home)
├── submit.php          # Logic to save complaints
├── admin_login.php     # Admin Login Page
├── dashboard.php       # Admin Dashboard (View/Resolve)
├── logout.php          # Logout Logic
├── db_connect.php      # Database Connection (Critical!)
│
├── css/
│   └── style.css       # Styles
│
└── vercel.json         # Required for Vercel hosting

```

---

## 🚀 Requirements

Make sure you have the following installed:

- **XAMPP** (Apache + MySQL)
- **PHP 8+**
- **MySQL / MariaDB**
- **Git**
- Web Browser (Chrome, Edge, Firefox)

---

## 🔧 XAMPP Setup (IMPORTANT)

### 1️⃣ Install XAMPP
Download from:
```

[https://www.apachefriends.org/](https://www.apachefriends.org/)

````

During installation, ensure these are checked:
- ✅ Apache
- ✅ MySQL
- ✅ PHP
- ✅ phpMyAdmin

---

### 2️⃣ Start Services
Open **XAMPP Control Panel** and start:
- ▶ Apache
- ▶ MySQL

Both must show **Running** ✅

---

## 📥 Clone the Repository

Open **Git Bash / PowerShell**:

```bash
cd C:\xampp\htdocs
git clone https://github.com/muturi643/student_feedback.git
cd student_feedback
````

> Your project path should look like:

```
C:\xampp\htdocs\student_feedback
```

---

## 🗄️ Database Setup (MySQL)

### 1️⃣ Open phpMyAdmin

Go to:

```
http://localhost/phpmyadmin
```

---

### 2️⃣ Create Database

```sql
CREATE DATABASE student_feedback;
```

---

### 3️⃣ Use the Database

```sql
USE student_feedback;
```

---

### 4️⃣ Create Complaints Table

```sql
CREATE TABLE complaints (
    id INT AUTO_INCREMENT PRIMARY KEY,
    student_name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    complaint TEXT NOT NULL,
    status VARCHAR(50) DEFAULT 'Pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

---

### 5️⃣ (Optional) Create Admin Table

```sql
CREATE TABLE admins (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
);
```

Insert a test admin (password: **admin123**):

```sql
INSERT INTO admins (username, password)
VALUES ('admin', MD5('admin123'));
```

---

## 🔌 Database Connection (`db_connect.php`)

Make sure your file looks like this:

```php
<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "student_feedback";

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
```

⚠️ **Important**

* MySQL must be running
* Default MySQL port is **3306**

---

## ▶ Running the Project

### Option 1: Apache (Recommended)

Open browser:

```
http://localhost/student_feedback/index.html
```

Admin login:

```
http://localhost/student_feedback/admin_login.php
```

---

### Option 2: PHP Built-in Server

From the project folder:

```bash
php -S localhost:8000
```

Then open:

```
http://localhost:8000
```

---

## 🌐 Vercel Hosting (Frontend Only)

> ⚠️ PHP **does NOT run on Vercel**.
> `vercel.json` is included for static deployment only.

For full PHP + MySQL hosting, use:

* InfinityFree
* 000Webhost
* Render
* Railway
* Hostinger

---

## ❗ Common Errors & Fixes

### ❌ `No connection could be made because the target machine actively refused it`

✔ Fix:

* Start MySQL in XAMPP
* Check `db_connect.php`
* Ensure database name is correct

---

### ❌ `php is not recognized`

✔ Fix:

* Add PHP to system PATH
  OR
* Use:

```bash
C:\xampp\php\php.exe -v
```

---

## ✅ Features

* Student complaint submission
* Secure database storage
* Admin login system
* Admin dashboard
* Complaint status tracking
* Clean folder structure

---

## 👨‍💻 Author

**Ernest Mwaura**
Telegram: **@Mrmwas24**

---

## 📜 License

This project is for **educational purposes**.
Feel free to modify and improve it.

