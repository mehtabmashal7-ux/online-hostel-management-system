# 🏨 Online Hostel Management System

![PHP](https://img.shields.io/badge/PHP-8.x-777BB4?logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-4479A1?logo=mysql&logoColor=white)
![HTML5](https://img.shields.io/badge/HTML5-E34F26?logo=html5&logoColor=white)
![CSS3](https://img.shields.io/badge/CSS3-1572B6?logo=css3&logoColor=white)
![JavaScript](https://img.shields.io/badge/JavaScript-F7DF1E?logo=javascript&logoColor=black)
![GitHub](https://img.shields.io/badge/GitHub-181717?logo=github&logoColor=white)

---

## 📖 Project Overview

The **Online Hostel Management System** is a web-based application developed using **PHP, MySQL, HTML, CSS, and JavaScript**. It is designed to simplify hostel management by providing separate dashboards for administrators and users. The system helps manage student information, room records, payments, and hostel expenses through a simple and user-friendly interface.

---

## ✨ Features

- 🔐 User Registration & Login
- 👨‍💼 Admin Dashboard
- 👨‍🎓 User Dashboard
- 🛏️ Room Management
- 📋 Room Records
- 👥 Student Management
- 📄 Student Records
- 💳 Payment Records
- 💰 Fare & Hostel Expense Management
- 📊 Expense Reports
- 📈 Total Expense Tracking
- 🚪 Secure Logout
- 🔌 MySQL Database Connectivity

---

## 👥 User Roles

### 👨‍💼 Administrator

The administrator can:

- Manage student records
- Manage room information
- View room records
- Manage payment records
- Manage hostel expenses
- View expense reports
- Monitor total expenses

### 👨‍🎓 User

The user can:

- Register an account
- Log in securely
- Access the user dashboard
- View room records
- View personal information

---

## 🔄 Project Workflow

```
User Registration
        │
        ▼
     User Login
        │
        ▼
Role Verification
        │
 ┌──────┴──────┐
 │             │
 ▼             ▼
Admin      User
Dashboard  Dashboard
 │             │
 │             │
Manage      View
Students    Room Records
Rooms
Payments
Expenses
Reports
```

---

## 🛠️ Technologies Used

- PHP
- MySQL
- HTML5
- CSS3
- JavaScript
- XAMPP

---

## 📂 Project Structure

```
Online Hostel Management System
│
├── admin_dashboard.php
├── user_dashboard.php
├── index.php
├── login.php
├── logout.php
├── register.php
├── connection.php
├── book.php
├── rent.php
├── rooms.php
├── room_records.php
├── student_management.php
├── student_records.php
├── payment_records.php
├── fare_expense.php
├── expense_reports.php
├── total_expense.php
├── screenshots/
│   ├── home-page.png
│   ├── login-page.png
│   ├── admin-dashboard.png
│   ├── user-dashboard.png
│   ├── room-records.png
│   └── fare-hostel-expense.png
└── README.md
```

---

## 🚀 Installation

1. Clone the repository

```bash
git clone https://github.com/mehtabmashal7-ux/online-hostel-management-system.git
```

2. Move the project folder to the **htdocs** directory inside XAMPP.

3. Start **Apache** and **MySQL** from the XAMPP Control Panel.

4. Import the MySQL database into **phpMyAdmin**.

5. Open your browser and visit:

```
http://localhost/onlinehostel/
```

---

## 📸 Project Screenshots

### 🏠 Home Page

![Home Page](screenshots/home page.png)

### 🔐 Login Page

![Login Page](screenshots/login page.png)

### 👨‍💼 Admin Dashboard

![Admin Dashboard](screenshots/admin dashboard.png)

### 👨‍🎓 User Dashboard

![User Dashboard](screenshots/user dashboard.png)

### 🛏️ Room Records

![Room Records](screenshots/room records.png)

### 💰 Fare & Hostel Expense

![Fare & Hostel Expense](screenshots/expenses management.png)

---

## 🔮 Future Improvements

- Improve user interface and responsiveness
- Implement role-based access control
- Add search and filtering options
- Add password recovery functionality
- Improve form validation
- Add email notifications
- Generate PDF reports
- Enhance application security

---

## 📄 License

This project is created for **educational and portfolio purposes**.

---

## 👨‍💻 Author

**Mehtab Ahmad**

- GitHub: https://github.com/mehtabmashal7-ux

---

## ⭐ Support

If you found this project useful, please consider giving it a ⭐ on GitHub.
