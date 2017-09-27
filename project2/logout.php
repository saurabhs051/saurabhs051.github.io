<?php
session_start();
if($_SESSION['id']==1)
{
	session_unset();
session_destroy();
header('Location: http://localhost/project2/login.php');
}
else
echo "<h1>You are Not Logged in</h1>";

?>