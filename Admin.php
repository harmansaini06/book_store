
<?php
include "db.php";
if (isset($_GET['delete'])) {
    $deleteid = $_GET['delete'];
    $delquery = $conn->query("DELETE FROM books WHERE id= $deleteid");
    echo "Book deleted successfully1";
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $price = $_POST['price'];

  // Handle Image Upload
  $target_dir = "uploads/"; // Folder to store images
  $target_file = $target_dir.basename($_FILES["cover_image"]["name"]);
  move_uploaded_file($_FILES["cover_image"]["tmp_name"], $target_file);

  // Insert into database
  $sql = "INSERT INTO books (title, author, price, cover_image) VALUES
  ('$title', '$author', '$price', '$target_file')";
  $conn->query($sql);
  echo "Book added!";
}
// See all the books in the table
$result = $conn->query("SELECT * FROM books");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Store</title>
</head>
<body>
    <form method="POST" enctype="multipart/form-data">
    <h1>Admin Panel</h1>
    <h3>Add Books</h3>
    <input type="text" name="title" placeholder="Book Title" required>
    <input type="text" name="author" placeholder="Author">
    <input type="text" name="price" placeholder="price">
    <input type="file" name="cover_image" accept="image/*" required>
    <button type="submit">Add Book</button>
    </form>

    <h1>All Books</h1>
    <h3>Books currently are in stock</h3>
    <table border="1">
        <tr>
            <th> Cover</th>
            <th>Title</th>
            <th>Author</th>
            <th>Price</th>
            <th>Action</th>
        </tr>

        <?php while($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <!-- Reading books from the database -->
            <td><img src="<?php echo $row['cover_image'] ?>" width="50" height="70"></td>
            <td><?php echo $row['title']; ?></td>
            <td><?php echo $row['author']; ?></td>
            <td><?php echo $row['price']; ?></td>
            <td><a href="edit_books.php?id=<?php echo $row['id'] ?>">Edit</a> | <a href="?delete=<?php echo $row['id'] ?>">Delete</a> </td>
        </tr>
        <?php } ?>
     </table>
    <a href="index.html">Logout</a>

</body>
</html>