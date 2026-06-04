function toDashboard(){ 
	const cookiename = "Admin";
	var decodedcookie = decodeURIComponent(document.cookie);
	var cookiearray = decodedcookie.split(';');
	var cookietoken;
	
	for(var i = 0; i < cookiearray.length; i++){ // Breaks cookies into pairs
		cookietoken = cookiearray[i].split('=');
	}
	
	for(var j = 0; j < cookietoken.length; j++){ //Removes spaces
	if(cookietoken[j].charAt(0) == ' '){
		var processed_cookie_token = cookietoken[j].substring(1);
		cookietoken[j] = processed_cookie_token;
	}
	
	
	else{
		var processed_cookie_token = cookietoken[j];
		cookietoken[j] = processed_cookie_token;
	}
	
	}
	
	if(cookietoken[1] == "Admin"){
		window.location.href = "AdminDashboard.php";
	}
	else{
		window.location.href = "Dashboard.php";
	}
	const dashbutton = document.getElementById("DashboardButton");
	

}