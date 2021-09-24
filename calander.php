
<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
	$dob = $_POST['DOB'];
	echo $dob;
}
?>





<!Doctype html>
<html>
<body>
<form align = "center" method = "post">
<input type = "date" name = "DOB" placeholder = "Enter your date of birth">
<input type = "submit"  value = "submit">
</form>
</body>
</html>