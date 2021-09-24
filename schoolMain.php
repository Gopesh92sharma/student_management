<?php
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: schoolMain.php");
    exit();
}
require_once "connection.php";

if(isset($_REQUEST['action']) && $_REQUEST['action']!=""){
				if(isset($_REQUEST['ids'])){
							$ids=implode(',', $_REQUEST['ids']);
							if(isset($_REQUEST['action']) && $_REQUEST['action']=='d' )
		{
			$query=" DELETE FROM `students` WHERE id IN ($ids) ";
			
			$stmt = $conn->prepare($query);
                        $stmt->execute();
		}
						}
}







$select_query = "select * from students";
					$select_query_run = $conn->prepare($select_query);
					$select_query_run->execute();
					
					if(isset($_POST['search']))
					{
						$search = $_POST['search'];
						if(!empty(trim($search))){
						

						$select_query = "select * from students where Name Like '$search'";
					$select_query_run = $conn->prepare($select_query);
					$select_query_run->execute();
						
					}
					}
					
		
					
					
					
					
					

?>












<!Doctype html>
<html>
<head>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="style.css">



</head>

<body>


<div class="wraper">

<?php include('includefiles/header.php'); ?>
<?php /*include('includefiles/sidebar.php');*/ ?>


<!--header-->
<form method = "post" action = "<?php echo $_SERVER['PHP_SELF'];?>">
<div>

<h1>HI  <?php echo $_SESSION["username"];?></h1>

<!--<span style="float:right"><select name = "action">
<option value = "" selected = "selected">Bulk Action</option>
<option value = "p">Published</option>
<option value = "u">UnPublished</option>
<option value = "d">Delete</option>

</select>
</span>-->
</div>
<table border = "1px solid">
<tr>


<td>
<a href = "">Home</a>
</td>

<td>
<a href = "addStudent.php" target = "_self">Add Student</a>
</td>



<td>

<input type = "text"  name = "search" placeholder = "search by name" required>
<input type = "submit" value = "search">

</td>

<td>

<a href = "updatePassword.php">Change_password</a>

</td>

<td>
<button><a href = "schoolLogout.php" name="logout" value = "logout">Logout</a></button>

</td>

</tr>

</table>
</form>





<!--display students-->

<table border="2px solid" width="100%" border="merg">

<tr>
<th><input type = "checkbox"></th>
<th>Name</th>
<th>Email</th>
<th>Class</th>
<th>Mobile</th>
<th>Address</th>
<th colspan="2">Action</th>
</tr>


<?php
while($result = $select_query_run->fetch(PDO::FETCH_ASSOC)){
?>

<tr>
<td><input type = "checkbox" name = "ids[]" value = "<?php echo $result['id'];?>" > </td>
<!--<td><?php //echo $result['id'];?></td>-->
<td><?php echo $result['Name'];?></td>
<td><?php echo $result['Email'];?></td>
<td><?php echo $result['Class'];?></td>
<td><?php echo $result['Mobile'];?></td>
<td><?php echo $result['Address'];?></td> 

<td><button><a href = "updateStudent.php?id=<?php echo $result['id']; ?>">Update</a></button></td>

<td><button><a href = "deleteStudent.php?id=<?php echo $result['id']; ?>">Delete</a></button></td>

</tr>

<?php
}
?>


</table>







</div>

</body>
</html>