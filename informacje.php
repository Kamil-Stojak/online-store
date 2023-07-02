<head>
<meta charset="utf-8">
    <link rel="stylesheet" href="css.css">
</head>
    <title>dodatkowe informacje</title>
<body>

<div class="wysylanie">
<div class="php">
CZEŚĆ 
<?php
require_once('connection.php');
	session_start();
	echo $_SESSION['user'];
	
	if(!isset($_SESSION['user'])){
    header('location:logowanie.php');
		}
		echo"<h2><p>";
	if(isset($_GET['error']))
{
	if($_GET['error']=="puste_pola"){
		echo"wypełnij wszystkie pola";
	}
		if($_GET['error']=="zły_numer_telefonu"){
		echo"numer telefonu powinien posiadać składać się z 9 cyfr od 0 do 9 oddzielonymi myślikami co 3 np.000-000-000";
	}
	  if($_GET['error']=="tonieimie"){
		echo"Twoje imie posiada zakazane znaki lub jest za krótkie";
	}
		  if($_GET['error']=="tonienazwisko"){
		echo"Twoje nazwisko posiada zakazane znaki lub jest za krótkie";
	}
		  if($_GET['error']=="kodpocztowy"){
		echo"Kod Pocztowy powinien być napisany następująco-> 00-000";
	}
	if($_GET['error']=="kraj"){
		echo"twoja nazwa kraju posiada niedozwolone znaki lub długość kraju jest krótsza od 4";
	}
	if($_GET['error']=="miejscowosc"){
		echo"twoja nazwa miejscowości posiada niedozwolone znaki";
	}
}
/*	
	  if($_GET['error']==""){
		echo"";
	}
	
	*/
	echo"</h2></p>";
?>
</div>
<form method="POST" action="informacje3.php">
<h2>dodatkowe informacje</h2>
Imie:<input name="imie" type="text"> <br>
Nazwisko:<input name="nazwisko" type="text"><br>
numer telefonu:<input name="telefon" type="text"><br>
adres zamieszkania:<input name="adres" type="text"><br>
kodpocztowy:<input name="kodpocztowy" type="text"><br>
Miejscowość:<input name="miejscowosc" type="text"><br>
Kraj<input name="kraj" type="text"><br>
<input class="easybutton" type="submit" value="Zapisz"><br>

</div>
</form>
</body>