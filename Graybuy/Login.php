<!DOCTYPE html>
<div class = "graybox">
<?php
include 'GraybuyDB.php';


if($_SERVER["REQUEST_METHOD"] == "POST"){
$username = $_POST['username'];



$usercheck = $sqlConnection -> prepare("SELECT Username, Password FROM users WHERE Username = ?");
$usercheck ->bind_param("s", $username);
$usercheck ->execute();
/* 
usercheck is used as a sql select to find the correct variable.
Username and Password use capital letters in the database, whereas in deployment lowercase is used.
This helps to keep track of all the variables as they are similar.
$p_userset stores the result of the usercheck, userset then as the name suggests gets the keypair.
Validation on the registration end ensures that no duplicate entries exist.

*/

if($_POST["username"] == NULL || $_POST["password"] == NULL){
	echo "Please enter a password and username.";
}
else{
	
	$p_userset = $usercheck -> get_result();
	$userset = $p_userset -> fetch_assoc();
	if(is_null($userset))
	{
		echo "The password you entered does not exist in the system.";	
	}
	else{
		$username = $userset["Username"];
		$password = $userset["Password"];
		unset($_COOKIE["auth"]);
		setcookie("auth", $username, time() + 28800, '/'); /* 8 hour cookie time for authentication*/
		
		if ($p_userset -> num_rows > 0){
			
			if($userset["Password"] == $_POST["password"]) {
				echo "Thank you for logging in ". $userset["Username"];
			
				$_SESSION["username"] = $username;
				$_SESSION["password"] = $password;
				if($username == "Admin"){
					header("Location: AdminDashboard.php");
				}
				else{
					header("Location: Dashboard.php");
					
				}
			
		}
		
		}
	
	}

}

}




?>




<head>
<title> Login </title>


</head>
<body>
<?php include 'Components/Topbar.html'; ?> 
<link rel="stylesheet" href = "stylesheet.css">
<form action = "Login.php" method = "post" class = "graybox">




<label for = "username">Username:</label><br>
<input type = "text" name = "username" id = "username"><br><br>

<label for = "password">Password:</label><br>
<input type = "password" name = "password" id = "password"><br><br>

<input type = "submit" name = "submit" id = "submit" value = "Login" class = "button">



</form>
</body>

<main>

</main>
</div>
</html>
