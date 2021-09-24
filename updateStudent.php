<?php
	require_once "connection.php";
	
	$id = $_GET['id'];
	//echo $id;
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		if(isset($_POST['done'])){
			
		$name = $_POST['name'];
		$email = $_POST['email'];
		$class = $_POST['class'];
		$mobile = $_POST['mobile'];
		$address = $_POST['address'];

    // Get hidden input value
    $id = $_GET['id'];
		
		if(!empty(trim($name)) && !empty(trim($email)) && !empty(trim($class)) && !empty(trim($mobile)) && !empty(trim($address)))
	{
		
		
		$update_query = "update students SET Name='$name', Email='$email', Class='$class', Mobile='$mobile', Address='$address'
						where id = '$id'";
						$update_query_run = $conn->prepare($update_query);
						$update_query_run->execute();
						header('Location: schoolMain.php');
						
						
						echo "Record updated!!!";
	}else{
		echo '<script>alert("insert all valid values")</script>';
	}
		
						
						
						
		
	}
	}
	if(isset($_POST['back'])){
		header('Location: schoolMain.php');
	}
	else{
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			
			$select_query = "select * from students where id = $id";
							$select_query_run = $conn->prepare($select_query);
							$select_query_run->execute();
						
							if($select_query_run->rowCount() == 1){
								
								$row = $select_query_run->fetch(PDO::FETCH_ASSOC);
								
								$name = $row["Name"];
								$email = $row["Email"];
								$class = $row["Class"];
								$mobile = $row["Mobile"];
								$address = $row["Address"];
								 
						

								
							}
							
			
		}
		
	}
	
	
	
?>




<!doctype html>
<html>
<style>
.wraper{
	
	margin:auto;
	border-style: solid;
	border-radius: 5px;
	background-color: #f2f2f2;
	height:100%;
	padding: 20px;
	
}

body{
	
	font: 14px sans-serif;
}
</style>

<body>
<div class = "wraper">

<form method = "post" align = center >

<table border= "1px solid green" border = "merg" align = center>
<tr>
<td><b>Enter Student Name:</b></td>
<td><input type = "text" name = "name"  value="<?php echo $name; ?>"></td><br><br>
</tr>
<tr>
<td><b>Enter Student Email:</b></td>
<td><input type = "text" name = "email" value="<?php echo $email; ?>"></td><br><br>
</tr>
<tr>
<td><b>Select Student Class:</b></td>

<td><select name = "class" value="<?php echo $class; ?>">
<option value = "First">First</option>
<option value = "Second">Second</option>
<option value = "Third">Third</option>
<option value = "Fourth">Fourth</option>
<option value = "Fifth">Fifth</option>
</select></td><br><br>
</tr>
<tr>
<td><b>Enter Student Mobile:</b></td>
<td><input type = "text" name = "mobile" value="<?php echo $mobile; ?>"></td><br><br>
</tr>
<tr>
<td><b>Enter Student Address:</b></td>
<td><textarea name = "address"  rows = "5" cols = "40"  ><?php echo $address;?> </textarea></td><br><br>
</tr>
<tr>
<td><input type = "submit" name = "done" value = "Done"></td>
<td><input type = "submit" name = "back" value = "Back">
</tr>

</table>

</form>

</div>

</body>
</html>
