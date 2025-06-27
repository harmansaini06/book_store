<?php
$conn = new mysqli("localhost", "root","", "book_store");
if ($conn->connect_error) {
    die("Connection failed:" . $conn->cpnnect_error);
}
?>