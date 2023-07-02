<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="kamil.css">
    <title>Browar pod Pjatkiem</title>
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
		<p><p>
		<?php
require_once('connection.php');
session_start();
		if(!isset($_SESSION['user'])){
echo "<p><a href='register.php' ><input class='easybutton1' type='submit' value=' register '></a></p>";
echo "<p><a href='logowanie.php' ><input class='easybutton1' type='submit' value=' login '></a></p>";
		}else{
echo "Hello: <br>"; echo "<a href='profil.php'> $_SESSION[user] </a>";
echo "<p><a href='wyloguj.php' ><input class='easybutton' type='submit' value='wyloguj'></a>";
		}
?>
    </div>

</nav>
   <center><h1>Browar pod pjatkiem</h1></center>
<section class="sekcja_1">
<div class="sekcja_1_1">
<?php
include 'kategorie.php';

?>
</div>
    <div class="sekcja_1_2">
	<form method="POST">


<?php
if($_GET['id']==NULL){
header('location:index.php');
}else{

$conn = new mysqli("localhost","root","","piwa")or die("błąd"
);
$wynik = $conn->query("SELECT * FROM produkt where ID='".$_GET['id']."'");
if($wynik->num_rows > 0){
$wiersz = $wynik->fetch_assoc();
		echo "<center><h2>'".$wiersz['nazwa']."'</h2></center>";
			$_SESSION['IDD']=$wiersz['ID'];
			$_SESSION['ILOSC']=$wiersz['ILOSC'];
		 echo"<img src=$wiersz[zdj] alt=error404 width='100%'>";
}
else{
	echo " baza jest pusta";

}}
?>
</form>
		
	</div>

    <div class="sekcja_1_3">

   <br>
     <form action="" method="post">
                <?php
				
				
	if( isset($_POST["ilosc1"]) ){
$ilosc1 = $_POST["ilosc1"];
$_SESSION['ilosc1']= $_POST["ilosc1"];
{
                if(isset($_POST["dodaj"])){
                    include 'connect.php';

                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
					
					if($_POST["ilosc1"]>$wiersz['ILOSC']){
      echo"w magazynie jest niewystarczająca ilość produktu!!!!! ";              
}else{
	if($_POST["ilosc1"] < 0){
						echo"podaj większą liczbę od 0<p>";
					}else{
                    $user = $_SESSION['user'];
                    $sql = "INSERT INTO koszyk (klient_id,produkt_id, potwierdzenie, status,ilosc) VALUES ('".$_SESSION['user']."','".$wiersz['ID']."','0','Przyjęta','".$_POST["ilosc1"]."')";
                    

                    if ($conn->query($sql) === TRUE) {
                        header('location:koszyk.php');

                    }
	}}}}}
           echo"NA STANIE MAMY:";
echo $wiersz['ILOSC'];
echo " szt.";
                ?>
   <?php

   echo "<span><h2 >Cena: </h3><input disabled value=$wiersz[cena] class='easybutton2'></span>";
   
   echo "<span><h3 >Ilość: </h3><input value='1' class='easybutton2' name='ilosc1'></span>";
     
	 ?>

                <a  style="text-decoration:none;" >  <button class="easybutton2"  name="dodaj" type="submit" role="button">Dodaj do koszyka</button></a>
            </form>
			OPIS:
						<?php
			echo "<p><br>" ;
			echo $wiersz['Opis'];
			echo "<p><br>" ;
			?>
			OPINIE:
			<?php
			$wynik44 = $conn->query("SELECT Opinia,klient_Email FROM opinie WHERE produkt_id='".$_GET['id']."'");
			if($wynik44->num_rows > 0){
				while($wiersz = $wynik44->fetch_assoc()) {
echo "<p>";
			 echo $wiersz['klient_Email'];
			 echo "<p>";
		          echo $wiersz["Opinia"];
				  echo "<p>";
			}}
			?>


<form action="opinia2.php" method="POST">
<h2>Dodaj opinię:</h2>
Email:<input name="email5" type="email"> <br>
Opinia:<input name="opinia" type="text"><br>
<input class="easybutton" type="submit" value="Dodaj opinię"><br>

</div>

</section>
<footer>
    <p>Kontakt</p>
    <p>Pomoc</p>
</footer>

</body>
</html>