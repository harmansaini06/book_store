<?php
include "db.php";

// Check if an ID is provided for editing 
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM books WHERE id=$id");
    $book = $result->fetch_assoc();
}
// update book details
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $price = $_POST['price'];
    $cover_image = $book["cover_image"]; // Keep the existing image by defult

    // Handle image Upload (if new image is uploaded)
    if (!empty($_FILES["cover_image"]["name"])) {
        $target_dir = "uploads/";
        $target_file = $target_dir.basename($_FILES["cover_image"]["name"]);
        move_uploaded_file($_FILE["cover_image"]["tmp_name"], $target_file);

        //Delete old image
        if (file_exist($book['cover_image'])){
            unlink($book['cover_image']);
        }
        $cover_image = $target_file; // Updatewith new image
    }
    // Update database
    $sql = "UPDATE Books SET title='$title', author='$author', price='$price',
    cover_image='$cover_image' WHERE id='$id'";
    $conn->query($sql);
    echo "<script> alert('Book Updated') </script>";
    header("Location: admin.php"); // Redirect back to admin panel
    exit();

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Admin Panel</h1>
<h3>Add Books</h3>

<form method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $book['id']?>">
    <input type="text" name="title" value="<?php echo $book['title']?>" required>
    <input type="text" name="author" value="<?php echo $book['author']?>">
    <input type="text" name="price" value="<?php echo $book['price']?>">
    <label>Current Cover:</label><br>
    <img src="<?=$book['cover_image']?>" width="100" height="140"><br><br>

    <label>Upload New Cover (optional):</label>
    <input type="file" name="cover_image" accept="image/*">


    <button type="submit">Update Book</button>
    </form>
    <a href="logout.php">Logout</a>
</body>
</html>