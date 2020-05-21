<?php

include 'connectdb.php';

$title = $_POST["title"];
$price = $_POST["price"];
$state = $_POST["state"];
$city = $_POST["city"];
$category = $_POST["category"];
$description = $_POST["description"];
$file = $_POST["file"];

$spl = "INSERT INTO product (title, price, state, city, category, description, photo) VALUES ("$title", "$price", "$state", "$city", "$category", "$description", "$file");";
mysqli_query($con, $sql);

header("Location: homepage.php");
 ?>
