<?php
$ProductID = $_POST['productID'];
$ProductName = $_POST['productName'];
$ProductDesc = $_POST['productDescription'];
$ProductPrice = $_POST['productPrice'];
include_once 'config.php';

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO product VALUES ($ProductID, '$ProductName', '$ProductDesc', $ProductPrice)";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>