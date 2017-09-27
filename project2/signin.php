<?php
session_start();
$_SESSION['logged_in']=0;
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
				$_SESSION['logged_in']=1;
				header('Location: http://localhost/project2/welcome.html');
			}
		}
		if($flag==0)
			echo "Wrong ID or Password!";
	}

}
}
?>