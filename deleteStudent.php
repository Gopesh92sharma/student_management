<?php
require_once "connection.php";

	$id = $_GET['id'];
	
	
$delete_query = "delete from students where id = '$id'";
					$delete_query_run = $conn->prepare($delete_query);
					$delete_query_run->execute();
					header('location: schoolMain.php');

?>
