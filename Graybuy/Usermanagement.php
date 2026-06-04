<!DOCTYPE html>
<div class = "graybox">
<?php include 'Components/Topbar.html';?>

<title> User Management </title>

<head>
<link rel="stylesheet" type="text/css" href = "stylesheet.css">
</head>

<body>
<form action = "Usermanagement.php" method = "post" class = "graybox">
<label for ="username"> Username </label> <br>
<input type = "text" name = "username" id = "username"><br><br>

<label for ="password"> Password </label> <br>
<input type = "text" name = "password" id = "password"><br><br>

<input type = "submit" name = "submit" id = "submit" value = "Create Account" class = "button"> <br><br>





<table>
<tr>
<th>
Username
</th>

<th>
Password
</th>
</tr>
<?php
include 'GraybuyDB.php';
$usercheck = "SELECT Username, Password FROM users";
$usercheck = $sqlConnection ->query($usercheck);
$totalusers = $usercheck -> num_rows;
for($i = 0; $i < $totalusers; $i++){
	$currentuser = $usercheck -> fetch_assoc();
	echo "<tr>";
	echo "<td>" . $currentuser["Username"] . "</td>";
	echo "<td>" . $currentuser["Password"] . "</td>";
	echo "</tr>";
}

?>


</table>





</form>
</body><br>


<?php 
if($_SERVER["REQUEST_METHOD"] == "POST"){
include 'GraybuyDB.php';


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
		echo "Account " . $_POST["username"] . " has been created.";
		$sqlInsert = $sqlConnection ->prepare("Insert INTO users (Username, Password) VALUES (?, ?) ");
		$sqlInsert -> bind_param("ss", $username, $password);
		$sqlInsert -> execute();
		header("Refresh: 1");
		
	}


}

}
?>







</div>
</html>