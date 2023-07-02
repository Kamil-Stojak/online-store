<head>
<meta charset="utf-8">
    <link rel="stylesheet" href="css.css">
</head>
    <title>zmień informacje</title>
<body>

<div class="wysylanie" id="margin">
<div class="php">
CZEŚĆ 
<?php
require_once('connection.php');
	session_start();
	echo $_SESSION['user'];
if( isset($_POST["imie"]) ){
	$imie = $_POST["imie"];
	$nazwisko = $_POST["nazwisko"];
	$telefon = $_POST["telefon"];
	$adres = $_POST["adres"];
    $kodpocztowy = $_POST["kodpocztowy"];

if( empty($imie) || empty($nazwisko) || empty($telefon) || empty($adres) || empty($kodpocztowy))
{
	echo "wypełnij wszystkie pola ! ! !";
}
else
{
     $zapytanie2="";
	 $odp=mysqli_query($conn,$zapytanie2)or die("error404");
	 
	 
	 if($odp)
	 {
		 echo"<p>dodano informacje";
		 header('location:profil.php');
	 }
	 else
	 {
		 echo"nie dodano informacji!";
		 
	 }
}
}
?>
</div>
<form method="POST" action="informacje.php">
<h2>dodatkowe informacje</h2>
Imie:<input name="imie" type="text"> <br>
Nazwisko:<input name="nazwisko" type="text"><br>
numer telefonu:<input name="telefon" type="text"><br>
adres zamieszkania:<input name="adres" type="text"><br>
kodpocztowy:<input name="kodpocztowy" type="text"><br>
<input class="easybutton" type="submit" value="Zapisz"><br>

</div>
</form>
</body>