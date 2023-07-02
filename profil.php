
<!doctype html>
<html lang="pl">
    <link rel="stylesheet" href="kamil.css">
<title>profil</title>
<head>
</head>
<body>
<nav>
    <div class="logo">
        <a href="index.php" target="_blank"><img src="logo.png"></a>
    </div>

    <div class="odnosniki">
        <p><a href="https://www.facebook.com/polskojaponska/">facebook</a></p>
        <p><a href="https://www.instagram.com/polskojaponska/">instagram</a></p>
        <p><a href="https://twitter.com/polskojaponska">Twitter</a></p>
    </div>

</nav>


<section class="main">
	<div class="main_1">
		<div class="main_1_1">
			<img src="photo.png" alt="">
		</div>
		<div class="main_1_2">
			<center><h2>CZEŚĆ <?php
require_once('connection.php');
session_start();
	if(!isset($_SESSION['user'])){
    header('location:logowanie.php');
		}else{
			
					

echo $_SESSION['user'];

$zapytanie2="SELECT klient.imie,klient.nazwisko,klient.telefon,klient.adres,klient.kodpocztowy,klient.kraj,klient.miejscowosc FROM klient,logowanie WHERE 
klient.email='".$_SESSION['user']."' AND klient.email=logowanie.Email";
$resoult2=mysqli_query($conn,$zapytanie2)or die("error");
echo "<p><br><p>DANE:<p>";
if($resoult2->num_rows > 0){
$wiersz1 = $resoult2->fetch_assoc();
echo"<br><br></center><h2>";
			echo "Imie: $wiersz1[imie]<p>";
			echo "Naziwsko: $wiersz1[nazwisko]<p>";
			echo "numer telefonu: $wiersz1[telefon]<p>";
			echo "adres zamieszkania: $wiersz1[adres]<p>";
			echo "kod pocztowy: $wiersz1[kodpocztowy]<p>";
			echo "miejscowosc: $wiersz1[miejscowosc]<p>";
			echo "kraj: $wiersz1[kraj]";
			}else{
	
echo "uzupełnij dane";
echo "<a href='informacje.php' ><input class='easybutton' type='submit' value='Uzupełnij informacje do wysyłek'></a>";
}
if($_SESSION['user']=="ADMIN"){
echo "<p><a href='ADMIN.php' ><input class='easybutton1' type='submit' value=' ADMIN CONSOLE '></a></p>";
		}else{
		}}
			
			
			?></h2>
		</div>
	</div>
	
	<div class="main_2">
		<ul>
		<li><h2><center>Przyciski:</center></h2></li>
		<li><a href="koszyk.php" ><input class="easybutton" type="submit" value="koszyk"></a></li>
		<li><a href="zmiendane.php" ><input class="easybutton" type="submit" value="zmień dane do wysyłki"></a></li>
		<li><a href="wyloguj.php" ><input class="easybutton" type="submit" value="wyloguj"></a></li>
		<li><a href="support.php" ><input class="easybutton" type="submit" value="support"></a></li>
		<li><a href="usunosobe.php" ><input class="easybutton" type="submit" value="usun konto"></a></li>
		</ul>
	</div>
</section>


<footer>
    <p>Kontakt</p>
    <p>Pomoc</p>
</footer>








</body>
</html>