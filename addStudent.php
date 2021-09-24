<?php

require_once "connection.php";

if($_SERVER['REQUEST_METHOD'] == "POST"){
	
	if(isset($_POST['submit'])){
	$name = $_POST['name'];
	$email = $_POST['email'];
	$class = $_POST['class'];
	$mobile = $_POST['mobile'];
	$address = $_POST['address'];
	
	if(!empty(trim($name)) && !empty(trim($email)) && !empty(trim($class)) && !empty(trim($mobile)) && !empty(trim($address)))
	{
		
	
	
		
	
	
	
	$insert_query = "insert into students(Name,Email,Class,Mobile,Address)
						values('$name','$email','$class','$mobile','$address')";
						$insert_query_run = $conn->prepare($insert_query);
						$insert_query_run->execute();
						echo "inserted";
						header("location:schoolMain.php");
	}else {
		echo '<script> alert(" Insert All valid values!!!!!!")</script>';
	}
}
}
if(isset($_POST['back'])){
	header("location:schoolMain.php");
}

?>










<!Doctype html>
<html>

<head>
<link rel="stylesheet" href="style.css">
</head>


<body>
<div class = "wraper">

<?php include('includefiles/header.php'); ?>

<form method = "post" align = center >

<table border= "1px solid green" border = "merg" align = center>
<tr>
<td><b>Enter Student Name:</b></td>
<td><input type = "text" name = "name" ></td><br><br>
</tr>
<tr>
<td><b>Enter Student Email:</b></td>
<td><input type = "text" name = "email" ></td><br><br>
</tr>
<tr>
<td><b>Select Student Class:</b></td>

<td><select name = "class">
<option value = "First">First</option>
<option value = "Second">Second</option>
<option value = "Third">Third</option>
<option value = "Fourth">Fourth</option>
<option value = "Fifth">Fifth</option>
</select></td><br><br>
</tr>
<tr>
<td><b>Enter Student Mobile:</b></td>
<td><input type = "text" name = "mobile" ></td><br><br>
</tr>
<tr>
<td><b>Enter Student Address:</b></td>
<td><textarea name = "address" rows = "5" cols = "40"></textarea></td><br><br>
</tr>
<tr>
<td><input type = "submit" name = "submit" value = "Add new student record"></td>
<td><input type = "submit" name = "back" value = "Back">
</tr>


</table>

</form>

</div>

</body>

</html>