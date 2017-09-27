<?php
$del=filter_input(INPUT_POST,'del');
$user = 'root';
$pswrd = '';
$db = 'testdb';
$conn = new mysqli('localhost',$user,$pswrd,$db);
	if(mysqli_connect_error())
		echo mysqli_connect_error();
	else
		{
			$sql = "DELETE FROM table1 WHERE NAME='$del'";
			if($conn->query($sql))
			{
				
				header('Location: http://localhost/project1/display.php');
			}
			else
				{
					die("Can't Delete");
				}


		}

?>