<?php
session_start();
/*conn*/
$conn = new mysqli("localhost","root","","piwa")or die("błąd");

if(isset($_POST['email']))
{
	
if(empty($_POST['email']) || empty($_POST['password']))
{
	echo "wypełnij wszystkie pola ! ! !";
}
else
{

    $resoult = $conn->query("SELECT * FROM logowanie WHERE Email='"$_POST['email']"' AND password='"$_POST['password']"'")or die("error");
	
	if(mysqli_fetch_assoc(resoult))
	{
		$_SESSION['user']=$_POST['email'];
		header("location:profil.php");
	}else
	{
		
	}
  }
	if($slowo->num_rows > 0){
	header('location:profil.php');
	}
}
?>