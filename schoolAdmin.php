<?php
require_once "connection.php";

if($_SERVER['REQUEST_METHOD'] == "POST")
{
	/*if(isset($_POST['admin'])){
		$name = $_POST['username'];
		$password = $_POST['password'];
		$name = $_POST['username'];
		
		$select_query = "select Username,Password from admin where Username = '$name' AND Password = '$password'";
								$select_query_run = $conn->prepare($select_query);
								
								$select_query_run->execute();*/
			
	
/*
		
			if(isset($_POST['submit'])){
				
				
			$name = $_POST['username'];
			$password = $_POST['password'];
			/*if($name == "admin" && $password == "admin"){
				echo "congratulation";
			}else{
				echo "enter username and password";
			}
			$select_query = "select Username,Password from admin where Username = '$name' AND Password = '$password'";
								$select_query_run = $conn->prepare($select_query);
								
								$select_query_run->execute();
									
								if($select_query_run->rowCount()>0){
									$row = $select_query_run->fetch();
									$username = $row['Username'];
									$password = $row['Password'];
									
								session_start();
									
									$_SESSION["loggedin"] = true;
									$_SESSION["id"] = $id;
									$_SESSION["username"] = $username;
									//$_SESSION["password"] = $password;
									
									header("location: schoolMain.php");
								}
		
		*/
		
		
		
		
	if(isset($_POST['username'])){
		
		
		if(isset($_REQUEST['submit'])){
			$name = $_POST['username'];
		$password = $_POST['password'];
			$select_query = "select Username,Password from admin where Username = '$name' AND Password = '$password'";
								$select_query_run = $conn->prepare($select_query);
								
								$select_query_run->execute();
									
								if($select_query_run->rowCount()>0){
									$row = $select_query_run->fetch();
									$username = $row['Username'];
									$password = $row['Password'];
									
										session_start();
									
									$_SESSION["loggedin"] = true;
									$_SESSION["id"] = $id;
									$_SESSION["username"] = $username;
									//$_SESSION["password"] = $password;
									
									header("location: schoolMain.php");
			
								}
			
			
			$logintype = $_REQUEST['logintype'];
			if($logintype == 'admin'){
				
				
				echo "login as admin";
				
			}
			
			
			
			if($logintype == 'student'){
				
				echo "login as student";
				
			}
			
			
		}	
		
		$name = $_POST['username'];
		$password = $_POST['password'];
		
		
		/*$select_query = "select Username,Password from admin where Username = '$name' AND Password = '$password'";
								$select_query_run = $conn->prepare($select_query);
								
								$select_query_run->execute();
									
								if($select_query_run->rowCount()>0){
									$row = $select_query_run->fetch();
									$username = $row['Username'];
									$password = $row['Password'];
									
								session_start();
									
									$_SESSION["loggedin"] = true;
									$_SESSION["id"] = $id;
									$_SESSION["username"] = $username;
									//$_SESSION["password"] = $password;
									
									header("location: schoolMain.php");
	
		
	}	
	*/	
		
		
		
		}
	}

						




?>


<!Doctype html>
<html>
<head>
<style>
.wraper{
	
	margin:auto;
	border-style: solid;
	border-radius: 5px;
	background-color: #f2f2f2;
	height:50%;
	width: 60%;
	padding: 10px;
	
}
.header{
	margin:auto;
	background-color: #FA8072;
	color:white;
	height:5%;
	padding: 10px;
	border-style:solid;
	border-radius: 5px;

}

body{
	
	font: 14px sans-serif;
}
</style>
</head>
<body>



<div class="wraper">

<div class="header">
<h1 align="left">Student Management System</h1>
</div>


<h1 align = center>Admin Login</h1>

<form id = "loginform" method = "post" action = "" align = center border = "1px solid">

<b>Username</b>
<input type = "text" name = "username" placeholder = "Enter username" required><br>
<br>
<b>Password</b>
<input type = "password"   name = "password" placeholder = "Enter password" required><br>
<br>

<!--<input type = "text"  id="logintype" name = "logintype" value = "" ><br>-->


<input type = "submit" onclick="login_admin()" name = "submit" value = "Login"><br>
<br>
<!--<h5 align = "center">Login As</h5><br>-->
<br>
<!--<input onclick ="login_admin()" id ="admin_id" type = "button" name = "admin" value = "Login as Admin">-->
<!--<input onclick ="login_student()"  id ="student_id"  type = "button" name = "student" value = "Login as Student">---->


</form>

</div>




</body>


</html>



<script>


function login_admin(){

//var test_value;

//test_value = document.getElementById("test_id").value;

document.getElementById("logintype").value = "admin";
	
//	alert(test_value);
document.getElementById("loginform").submit();
//	alert("login admin");


	
	
	
	
	
}


function login_student(){
	

	alert("login_student");
	
	document.getElementById("logintype").value = "student";
	
//	alert(test_value);
document.getElementById("loginform").submit();
//	alert("login admin");

	
}




 </script>
