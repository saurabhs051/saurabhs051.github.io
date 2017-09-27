<?php
session_start();
if($_SESSION['id']!=1)
header('Location: http://localhost/project2/login.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>WELCOME</title>
	<style type="text/css">
		div{
			color: red;
		}
	</style>
</head>
<body>
<h1>YOU ARE LOGGED IN</h1>
<div style="text-align:right;"><a href="http://localhost/project2/logout.php">Logout</a></div>;
<div>

<?php
$id=$_SESSION['id1'];	
$pwd=$_SESSION['pwd'];
$user='root';
$pswrd='';
$db='logindb';
$conn=new mysqli('localhost',$user,$pswrd,$db);
if(mysqli_connect_error())
echo "Connection Failed";
else
{
	
	$sql='SELECT * FROM table1';
	if(!$conn->query($sql))
		echo "Can't Read Database";
	else{
		$result=$conn->query($sql);
		for($i=0;$i<$result->num_rows;$i++)
		{
			$d=$result->fetch_assoc();
			if($id==$d['ID'])
			{
				echo "Hello",$d['ID'],"<br><br><br>";
				echo "Name : ".$d['NAME']."<br>";
				echo "e-mail : ".$d['EMAIL']."<br>";
				echo "Gender : ".$d['GENDER']."<br>";
			}
		}
		
	}

}
?>
</div>
</body>
</html>