
# 📚 Book Store

A simple web-based Book Store application built using **HTML, CSS, PHP**, and **MySQL**. This project demonstrates the use of **CRUD operations** to manage book records. Users can view available books on the landing page, and an admin can add, update, or delete book entries through a separate dashboard.

---

## 🔧 Technologies Used

- **Frontend**: HTML, CSS  
- **Backend**: PHP  
- **Database**: MySQL

---

## ✨ Features

- 📖 View all books on a user-friendly landing page
- 🔐 Admin panel to manage books
- ➕ Add new books
- 📝 Edit existing book details
- ❌ Delete books
- 🗃️ Store book info in a MySQL database
- 🔄 Fully functional CRUD operations

---



## 🗃️ Database Schema

Create a MySQL database named `bookstore` and run the following SQL:

```sql
CREATE TABLE books (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  author VARCHAR(255) NOT NULL,
  price DECIMAL(10, 2) NOT NULL,
  image VARCHAR(255)
);
```

📌 You can also import the `bookstore.sql` file included in the `/sql` directory.

---

## 🚀 Getting Started

### 1. Clone the Repository

```bash
git clone https://github.com/yourusername/book-store.git
```

### 2. Set Up the Database

- Open phpMyAdmin or any MySQL client
- Create a new database: `bookstore`
- Import the SQL file: `sql/bookstore.sql`

### 3. Configure the Database Connection

Edit `db/config.php`:

```php
<?php
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'book_store';

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
```

### 4. Run the Project

- Use **XAMPP**, **WAMP**, or any local PHP server
- Place the project folder in the `htdocs` (for XAMPP) or appropriate directory
- Navigate to `http://localhost/book-store/index.php` in your browser

---

---

## 🙋‍♂️ Author

**Harmanjot Singh**  
📍 Gurdaspur, Punjab, India  
📧 sainisaab0638f@gmail.com

---

## 📝 License

This project is open source and free to use for educational purposes.

---

> “A room without books is like a body without a soul.” – *Cicero*
