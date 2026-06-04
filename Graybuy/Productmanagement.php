<!DOCTYPE html>
<div class = "graybox">
<link rel="stylesheet" href = "stylesheet.css">
<?php include 'Components/Topbar.html';?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">




<title> Product Management </title>

<head>

</head>

<body>
<form action = "Productmanagement.php" method = "post" class = "graybox">
<label for ="photoname"> Photo Name </label> <br>
<input type = "text" name = "photo" id = "photo"><br><br>

<label for ="productname"> Product Name </label> <br>
<input type = "text" name = "productname" id = "productname"><br><br>

<label for ="productprice"> Product Price </label> <br>
<input type = "text" name = "productprice" id = "productprice"><br><br>

<input type = "submit" name = "submit" id = "submit" value = "Add Product"> 


</form>
</body><br>
<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
	include 'GraybuyDB.php';
	if($_POST["productname"] == NULL || $_POST["productprice"] == NULL || $productphoto = $_POST["photo"] == NULL){
		echo "Please enter all parameters, Admin.";
		
	}
	else{
		$productname = $_POST["productname"];
		$productprice = $_POST["productprice"];
		$productphoto = $_POST["photo"];
	
		$product = $sqlConnection -> prepare("INSERT INTO products (Name, Price, Image) VALUES (?,?,?)");
		$product -> bind_param("sds", $productname, $productprice, $productphoto);
	
		$product -> execute();
		$product -> close();
		echo "Product Added";
	}

}


?>









</div>
</html>