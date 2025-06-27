<?php
include "db.php";
$result =$conn->query("SELECT * FROM books");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <header>
      <h1>Welcome to the back store</h1>
      <nav>
        <a href="index.php">Home</a>
        <a href="#about">About</a>
        <a href="admin.php">Admin</a>
      </nav>
    </header>
    <section class="hero">
      <!--Hero image-->
    </section>
    <section class="products">
      <h2>Our Collection</h2>
      <div class="book-container">
        

        <?php while ($row = mysqli_fetch_assoc($result)){

        ?>
        <div class="book-card">
            <img src="<?php echo $row['cover_image']; ?>" alt="" />
            <h3><?php echo $row['title'] ?></h3>
            <p>By<?php echo $row['author'] ?></p>
            <p>Price: Rs.<?php echo $row['price'] ?></p>
            <button>Buy</button>
          </div>
        <?php }
         ?>
      </div>
    </section>
    <section>
      <h2>About us</h2>
      <p>
        I am a finalyear BCA student at Govt. college Gurdas, and my journey
        herte has been truly enriching. Over the years, I have had the
        opportunity to learn from experienced facutly, gain hands-on experience
        in programing,
      </p>
    </section>
    <footer>
      <p>&copy; 2025 Book store. All Rights Reserved.</p>
    </footer>
  </body>
</html>
