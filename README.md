
# 🔐 PHP & MySQL Login System (Register, Login, and My Page)

> This is a practical project where I built a simple but fully functional login system using **PHP and MySQL**.  
> It includes user registration, login with hashed passwords, and a personal dashboard ("My Page") using PHP sessions.  
> The UI is clean and modern with some stylistic enhancements using Google Fonts and CSS.

---

## 📁 Features Overview

| Feature       | Description |
|---------------|-------------|
| Register      | Save new user info (username + hashed password) in MySQL |
| Login         | Authenticate user and start session |
| My Page       | Protected page showing user info if logged in |
| Logout        | Ends session and redirects to login page |
| Design        | Modern look using CSS and Google Fonts |

---

## 🏗️ Tech Stack

- Language: `PHP 8.x`
- Database: `MySQL`
- Server: `XAMPP`, `MAMP`, or similar (Apache + MySQL)
- Fonts: [Google Fonts - Outfit](https://fonts.google.com/specimen/Outfit)

---

## 📂 File Structure

```
project/
├── login1.php         # Login with session and redirection to mypage
├── register.php       # User registration form and DB insert
├── mypage.php         # Displays logged-in user info
├── logout.php         # Ends session and redirects to login
└── database.sql       # MySQL table creation script
```

---

## 💾 SQL - Create `users` Table

```sql
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);
```

---

## 🧪 Code Highlights

### 🔐 Password Hashing (on registration)

```php
$password_hashed = password_hash($_POST['password'], PASSWORD_DEFAULT);
```

### ✅ Session Start After Login

```php
$_SESSION['user_id'] = $user['id'];
$_SESSION['username'] = $user['username'];
header("Location: mypage.php");
```

### 🚫 Login Error Handling

```php
<p class="error">❌ Invalid username or password.</p>
```

---

## 🎨 UI Preview

> 🖼️ Basic responsive design with Google Fonts and styled form

![login1](https://github.com/user-attachments/assets/d1810412-630d-4a68-a490-7b8c8debee52)  
![register](https://github.com/user-attachments/assets/6131d72c-7587-4f2a-b108-99d3ff7b95aa)  
![mypage](https://github.com/user-attachments/assets/cd66a472-0268-4a0b-b6db-0e5c5bc91a0f)

---

## 🚀 Possible Improvements

- 🔐 Password reset flow
- 📧 Email or OTP-based verification
- 📱 Responsive mobile layout
- 🛡️ Use of prepared statements to prevent SQL injection

---

## 📝 Conclusion

This project helped me understand the essentials of building an authentication system using PHP and MySQL.  
It covers user management, session handling, and secure password storage using hash functions.  
A great starting point for beginners looking to connect frontend forms with a database securely.

> 👉 Full source code available on GitHub  
> [🔗 GitHub Repository Link]

---
