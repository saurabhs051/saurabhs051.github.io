<?php

$user = 'root';
$pswrd = '';
$db = 'testdb';
$conn = new mysqli('localhost',$user,$pswrd,$db);
	if(mysqli_connect_error())
		echo mysqli_connect_error();
	else
		{

				$query="SELECT * FROM table1";
				$result=mysqli_query($conn,$query);
				$no=$result->num_rows;
				$i=0;
				echo "<b><center>DATABASE</center></b><br><br>";
				while($i<$no)
				{
					$d=$result->fetch_assoc();
					echo "ROLL : ".$d['ROLL']."    "."NAME : ".$d['NAME']."<br>";
					$i++;
				}
		}
?>
<br><br><form action="delete.php" method="post">
	DELETE BY NAME : <input type="text" name="del" placeholder="Enter Name">
</form>





<center><a href="http://localhost/project1/form.html"><br><br>Home</a></center>