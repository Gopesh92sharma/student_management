<html>
<head>
</head>
<body>
<?php

session_start();
$_SESSION = array();
session_destroy();
header("location: schoolAdmin.php");
exit();

?>

</body>
</html>