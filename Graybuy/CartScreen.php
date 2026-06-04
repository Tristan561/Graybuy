<!DOCTYPE html>
<div class = "graybox">
<link rel="stylesheet" href = "stylesheet.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<head>

</head>

<body>
<title>Cart</title>
<input type = "Button" value = "Back to shopping" onclick = "location.href ='ShoppingScreen.php'" class = "button"><br>

Welcome, here you will see the items in your cart.<br>

<table id = "carttable">
<tr>
<th>
Name:
</th>
<th>
Price:
</th>

<th>
Amount:
</th>

</tr>

</table>



<input type = "Button" value = "Pay" onclick = "location.href ='Payment.php'" class = "button">
<input type = "Button" value = "Clear Cart" onclick = "ClearCart()" class = "button"><br>




</body>

<script>
	const cartitemstorage = JSON.parse(sessionStorage.getItem("cartitems"));
	var rowsize = carttable.rows.length;
	var cell_0;
	var cell_1;
	var cell_2;
	if(cartitemstorage != null){
		cartitemstorage.forEach(function (cartitem) {
		newrow = carttable.insertRow(rowsize);
		cell_0 = newrow.insertCell(0);
		cell_1 = newrow.insertCell(1);
		cell_2 = newrow.insertCell(2);
		cell_0.innerHTML = cartitem.obname;
		cell_1.innerHTML = "R " + cartitem.obprice;
		cell_2.innerHTML = cartitem.obamount;

});
	rowsize = carttable.rows.length;

	newrow = carttable.insertRow(rowsize);
	var cell_3 = newrow.insertCell(0);
	cell_3.innerHTML = "Total: ";
	var cell_4 = newrow.insertCell(1);
	cell_4.innerHTML = "R " + sessionStorage.getItem("carttotal");
	}


</script>
<script>
function ClearCart(){
	var table = document.getElementById("carttable");
	for(var i = table.rows.length-1; i > 0; i--){
		table.deleteRow(i);
		sessionStorage.setItem("cartitems", null);
		sessionStorage.setItem("carttotal","R 0");
	}
	
	
}
</script>





</div>
</html>