<!DOCTYPE html>
<div class = "graybox">
<link rel="stylesheet" href = "stylesheet.css">
<title>
Payment
</title>
<input type = "Button" value = "Back To Cart" onclick = "location.href ='CartScreen.php'" class = "button"><br><br>
<label for = "username">First and last name:</label><br>
<input type = "text" name = "Name" id = "Name"><br><br>

<label for = "username">Credit Card:</label><br>
<input type = "text" name = "Credit Card" id = "Credit Card"><br><br>

<label for = "username">House Address:</label><br>
<input type = "text" name = "HouseAddress" id = "username"><br><br>

<label for = "username">DeliveryAddress:</label><br>
<input type = "text" name = "DeliveryAddress" id = "username"><br><br>

<label for = "username">Username:</label><br>
<input type = "text" name = "username" id = "username"><br><br><br>

<input type = "Button" value = "Pay" onclick = "thank()" class = "button"><br><br>

<script>
function thank(){
	alert("Thank you for participating");
	
}
</script>

Note this is for R&D purposes only, your details will not be used.
</div>
</html>