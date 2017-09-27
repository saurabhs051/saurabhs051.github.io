<?php
$r=filter_input(INPUT_POST,'roll');
$n=filter_input(INPUT_POST,'name');
if(!empty($r)&&!empty($n))
{
	$user = 'root';
$pswrd = '';
$db = 'testdb';
$conn = new mysqli('localhost',$user,$pswrd,$db);
	if(mysqli_connect_error())
		echo mysqli_connect_error();
	else
		{
			$sql = "INSERT INTO table1(ROLL,NAME) values('$r','$n')";
			if($conn->query($sql))
			{
				
				header('Location: http://localhost/project1/thank.html');
			}
			else
				{
					die("Can't Insert");
				}


		}
}
else
echo "Cannot leave it empty";
?>