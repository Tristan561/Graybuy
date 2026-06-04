<!DOCTYPE html>
<div class = "graybox">



<head>

</head>


<title> Shopping </title>
<?php include 'Components/Topbar.html'; ?>
<link rel="stylesheet" href = "stylesheet.css">
<?php
include 'GraybuyDB.php';
$productquery = $sqlConnection -> query("SELECT Name, Price, Image FROM products");
$productrows = $productquery ->num_rows;
$productarray = array();
if ($productrows > 0){
	for($i = 0; $i < $productrows; $i++){
		$product = $productquery->fetch_assoc();
		array_push($productarray, $product);
	}
	
}


?>

<div class = "graybox">
Welcome to our product range, please explore.<br>
</div>
<div class = "graybox">
<table id = "ShoppingTable"> <!--4 Column Table -->
<tr>
<th>
Cart: 
</th >
<th id = "cartamount">>
R 0
</th>


</tr>
<tr>
<th>
Photos
</th>
<th>
Product Name:
</th>
<th>
Product Price:
</th>
<th>
Add to cart:
</th>
</tr>

<script>

	const orderobj = {
		obname: "",
		obprice: 0,
		obamount: 0
	};
	let desorder = []; //Shortened for deserialized order
</script>

<script>

if(typeof sessionStorage.getItem("carttotal") != 'undefined'){
	const carttotal = JSON.parse(sessionStorage.getItem("carttotal"));
	var cartamount = document.getElementById("cartamount");
	total = carttotal;
	if(total != null){
		cartamount.innerHTML = "R " + total;
	}
	
}

</script>




<script>

function expandTable(name, price, src){
	var shoppingtable = document.getElementById("ShoppingTable");
	var rowsize = shoppingtable.rows.length;
	var newrow = shoppingtable.insertRow(rowsize);
	var newcartbutton = document.createElement('Button');
	var image = document.createElement("img");
	image.src = "Images/" + src;
	image.width = 75;
	image.height = 75;
	
	
	const currentorderobj = Object.create(orderobj);
	currentorderobj.obname = name;
	currentorderobj.obprice = price;
	newcartbutton.innerHTML = "Add to cart";
	newcartbutton.onclick = function(){
		var cartamount = document.getElementById("cartamount");
		total = Number(price + pastprice);
		pastprice = total;
		if(total != null){
			cartamount.innerHTML = "R " + total;
		}
		currentorderobj.obamount = currentorderobj.obamount + 1;
		for(var i = 0; i<desorder.length;i++){
			if(desorder[i].obname == name){ //Finds item and replace to prevent duplicates.
				desorder[i] = currentorderobj;
				break;
			}
			if(i == desorder.length - 1){ //No item, but not first.
				desorder.push(currentorderobj);
				break;
			}

		}
		if(desorder.length == 0){ // first item
			desorder.push(currentorderobj);
		}
		
		sessionStorage.setItem("cartitems", JSON.stringify(desorder));
		sessionStorage.setItem(("carttotal"), total);
		//const cartitemstorage = JSON.parse(sessionStorage.getItem("cartitems")); // Two dimension array and example fetch
		//To work with use cartitemstroage[index] to find the item, and .property to find the property desired.
		// Properties are obname, obprice, obamount
		
		
	};
	var cell_0 = newrow.insertCell(0);
	var cell_1 = newrow.insertCell(1);
	var cell_2 = newrow.insertCell(2);
	var cell_3 = newrow.insertCell(3);
	cell_1.innerHTML = name;
	cell_2.innerHTML = "R " + price;
	cell_3.appendChild(newcartbutton);
	cell_0.appendChild(image);
}


</script>

<script>
function transferCart(){
	
	
	
	
}





</script>




<script>
	const products = <?php echo json_encode($productarray)?>; //Gets the array's length
for(var i = 0; i < products.length; i++){ //products added through sql queries.
	const productname = products[i]["Name"];
	const productprice = products[i]["Price"];
	const productimage = products[i]["Image"];
	expandTable.call(this, productname,Number(productprice), productimage);
	
}







var pastprice = 0;
var total = 0;

</script>


</div>;
</table><br>



<div class = "middlebox">
<input type = "Button" value = "Cart" onclick = "location.href = 'CartScreen.php' " class = "button">
</div>



</div>
</html>