
<head>
<meta charset="utf-8">
    <link rel="stylesheet" href="css.css">
</head>
    <title>LOGOWANIE</title>
<body>

<div class="wysylanie" id="margin">
<div class="php">
</div>
<form method="POST" action="logowanie.php">
<h2>LOGOWANIE</h2>

<?php
require_once('connection.php');
session_start();
/*conn*/
if(isset($_POST['email']))
{
	
if(empty($_POST['email']) || empty($_POST['password']))
{
	echo "wypełnij wszystkie pola ! ! !<p>";
}
else
{
    $zapytanie="SELECT * FROM logowanie WHERE Email='".$_POST['email']."' and password='".$_POST['password']."'";
    $resoult=mysqli_query($conn,$zapytanie)or die("error");

	if(mysqli_fetch_assoc($resoult))
	{
		$_SESSION['user']=$_POST['email'];

		header("location:index.php");
	}else{
	}

?>

<?php
		echo"<h3>Sprawdź czy twój email i hasło są poprawne<p>";
			{
		
	}

}}
?>

Email:<input name="email" type="text"> <br>
Haslo:<input name="password" type="password"><br>
<input class="easybutton" type="submit" value="zaloguj"><br>

</div>
</form>
</body>