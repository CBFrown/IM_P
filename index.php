<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <form action="save.php" method="POST">
        <input type="text" id="productID" name="productID" placeholder="Product ID"><br>
        <input type="text" id="productName" name="productName" placeholder="Product Name"><br>
        <input type="text" id="productDescription" name="productDescription" placeholder="Product Description"><br>
        <input type="text" id="productPrice" name="productPrice" placeholder="Product Price"><br>
        <input type="submit" value="Save">
    </form>
    <?php 
    include_once 'config.php';

    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT * FROM product";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        echo "<table border='1'>";
        echo "<tr>";
        echo "<th>Product ID</th><th>Product Name</th><th>Product Description</th><th>Product Price</th>";
        echo "</tr>";
        while($row = $result-> fetch_assoc()){
            echo "<tr>";
            echo "<td>".$row['Prod_ID']."</td>";
            echo "<td>".$row['Prod_Name']."</td>";
            echo "<td>".$row['Prod_Desc']."</td>";
            echo "<td>".$row['Prod_Price']."</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }
    $conn->close();
    ?>
</body>
<script src="js/script.js"></script>
</html>