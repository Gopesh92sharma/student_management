<?php

require_once "connection.php";


session_start();
$username = $_SESSION["username"];
$id = $_SESSION["id"];
//echo $username;
echo "<br>";
echo $id;


/*if($_SERVER['REQUEST_METHOD']== "POST"){
	
	$old = $_POST['old'];
	$new = $_POST['new'];
	$con_new = $_POST['con_new'];
	echo $old;
	echo "<br>";*/
	
	if(isset($_POST['change']))
	{
		$old = $_POST['old'];
	$new = $_POST['new'];
	$con_new = $_POST['con_new'];
	/*echo $old;
	echo "<br>";*/
	
	
	
	
		$select_query = "SELECT Password FROM `admin` WHERE Username = '$username'";
						$select_query_run = $conn->prepare($select_query);
						$select_query_run->execute();
					    
						
						while($result = $select_query_run->fetch(PDO::FETCH_ASSOC)){
							
							$pass = $result['Password'];
							
							
						if($old == $pass && !empty($new) && !empty($con_new)){
							if($new == $con_new){
						
						
						
						$update_query = "UPDATE `admin` SET `Password`='$new' WHERE Username = '$username'";
											$update_query_run = $conn->prepare($update_query);
											$update_query_run->execute();
											echo '<script> alert("Password Updated !!!!!!")</script>';
						}
						else{
							echo '<script> alert(" New Password and Confirm Password does not match!!!!!!")</script>';
						}
						}
												else{
	echo '<script> alert(" Insert All valid values!!!!!!")</script>';
}
						
							
						}

							
						
}

						if(isset($_POST['home'])){
							header("location: schoolMain.php");
						}

	
	
	
	
	


	

?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
</head>

<body>

<div class = "wraper">
<?php include('includefiles/header.php'); ?>

<form  method = "post">
<input type = "submit"   name = "home" value = "Home" >

<table align = center>
<tr>
<td><b>Old Password:<b></td>
<td><input type = "password" name="old" ><td><br>
</tr>
<br>
<tr>
<td><b>New Password:<b></td>
<td><input type = "password" name = "new" ><td><br>
</tr>
<br>
<tr>
<td><b>Confirm New Password:<b></td>
<td><input type = "password" name = "con_new" ></td><br>
</tr>
<br>
<tr>
<td><input type = "submit" name = "change" value = "Change Password"></td>
</tr>

</table>

</form>

</div>

</body>

</html>