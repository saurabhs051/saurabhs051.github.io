<?php
session_start();
$_SESSION['id']=0;
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
	<style type="text/css">
		div
		{
			background-color: #ccc;
			padding-top: 30px;
			padding-bottom: 30px;
			text-align: center;
		}
		span{
			color:red;
		}
		h1{text-align: center;
			text-decoration-style: bold;}
			.cl{
				padding-right: 20px;
			}
	</style>
</head>
<body>
<h1>HOME PAGE</h1>
<br><br>
<div>
	<div class=cl><strong>LOGIN</strong></div>
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
		ID<input type="text" name="id">
		PASSWORD<input type="password" name="pwd">
		<input type="submit" name="submit" value="Submit">
	</form>
</div>

<?php
if(isset($_POST['submit']))
{
	$id=$_POST['id'];
$pwd=$_POST['pwd'];
$user='root';
$pswrd='';
$db='logindb';
$conn=new mysqli('localhost',$user,$pswrd,$db);
if(mysqli_connect_error())
echo "Connection Failed";
else
{
	if(empty($id)||empty($pwd))
	echo "Empty Field";
else
{
	$sql='SELECT * FROM table1';
	if(!$conn->query($sql))
		echo "Can't Read Database";
	else{
		$result=$conn->query($sql);
		$flag=0;
		for($i=0;$i<$result->num_rows;$i++)
		{
			$d=$result->fetch_assoc();
			if($id==$d['ID']&&$pwd==$d['PASSWORD'])
			{
				$_SESSION['id']=1;
				$_SESSION['id1']=$d['ID'];
				$_SESSION['pwd']=$d['PASSWORD'];
				$flag=1;
				echo "You are logged in";
				header('Location: http://localhost/project2/welcome.php');
			}
		}
		if($flag==0)
			echo "Wrong ID or Password!";
	}

}
}

}
?>


<br><br>
<div>
	<div class=cl><strong>New User? &nbsp&nbspSIGNUP</strong></div><form action="http://localhost/project2/signup.php" method="post">
		NAME<input type="text" name="name"><br><br>
		E-MAIL<input type="text" name="email"><br><br>
		GENDER<input type="radio" name="gender" value="male">Male
		<input type="radio" name="gender" value="female">Female<br><br>
		ID           <input type="text" name="id1"><br><br>
		PASSWORD<input type="password" name="pwd1"><br><br>
		<input type="submit" value="Submit">
	</form>
</div>
</body>
</html>