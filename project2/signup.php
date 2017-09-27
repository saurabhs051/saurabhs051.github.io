<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<title>SignUp</title>
</head>
<body>

<?php

$n=$_POST['name'];
$e=$_POST['email'];
$g=$_POST['gender'];
$id=$_POST['id1'];
$pwd=$_POST['pwd1'];
$user='root';
$pswrd='';
$db='logindb';
$conn=new mysqli('localhost',$user,$pswrd,$db);
if(mysqli_connect_error())
echo "Connection Failed";
else
{
	if(empty($id)||empty($pwd)||empty($n)||empty($e)||empty($g))
	echo "Empty Field";
else
{
	$sql="INSERT INTO table1(NAME,EMAIL,GENDER,ID,PASSWORD) values('$n','$e','$g','$id','$pwd')";
	if(!$conn->query($sql))
		echo "Can't Read Database";
	else{
		echo "Successfully Registered";
		}

}
}
?>

<center><a href="http://localhost/project2/login.php">Home</a></center>

</body>
</html>
