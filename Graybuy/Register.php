<!DOCTYPE html>
<div class = "graybox">
<head>
<title> Register </title>
</head>
<body>
<?php include 'Components/Topbar.html';?>
<link rel="stylesheet" href = "stylesheet.css">
<form action = "Register.php" method="post" class = "graybox">
<label for = "username">Username:</label><br>
<input type = "text" name = "username" id = "username"><br><br>

<label for = "password">Password:</label><br>
<input type = "password" name = "password" id = "password"><br><br>


<input type = "submit" name = "submit" id = "submit" value = "Register" class = "button"> 


</form>

</body><br>


<?php 
if($_SERVER["REQUEST_METHOD"] == "POST"){
include 'GraybuyDB.php';
/* protection against sql injections */


$username = $_POST['username'];
$password = $_POST['password'];

$usercheck = $sqlConnection ->prepare("SELECT Username FROM users WHERE Username = ?");
$usercheck ->bind_param("s", $username);
$usercheck ->execute();
$usercheck ->store_result();

if($_POST["username"] == NULL || $_POST["password"] == NULL){

	echo "Please enter a valid name and password.";

}
else{



	if ($usercheck->num_rows > 0){
		echo "This account already exists.";
		

	}
	else{
		echo "You have been registered. " . $_POST["username"];
		$sqlInsert = $sqlConnection ->prepare("Insert INTO users (Username, Password) VALUES (?, ?) ");
		$sqlInsert -> bind_param("ss", $username, $password);
		$sqlInsert -> execute();
		
		
	}


}

}
?>

</div>
</html>