<?php


if( isset($_POST["imie"]) ){
	$imie = $_POST["imie"];
	$nazwisko = $_POST["nazwisko"];
	$adres = $_POST["adres"];
		$telefon = $_POST["telefon"];
   $kodpocztowy = $_POST["kodpocztowy"];
   $kraj = $_POST["kraj"];
    $miejscowość = $_POST["miejscowość"];
	
	
	 require_once'connection.php';
	 require_once'informacje2.php';
	 
	 	 /*sprawdzanie*/
	 
 if(imionka2($imie,$nazwisko,$telefon,$kodpocztowy,$kraj,$miejscowosc,$adres) !==false){
	 header("location:informacje.php?error=puste_pola");
     exit();
 }
if(invalidPhone($telefon) !==false){
	 header("location:informacje.php?error=zły_numer_telefonu");
 exit();
	 }
if(namevalidation($imie) !==false){
	 header("location:informacje.php?error=tonieimie");
 exit();
	 }
if(surnamevalidation($nazwisko) !==false){
	 header("location:informacje.php?error=tonienazwisko");
 exit();
	 }
if(kodpocztowy($kodpocztowy) !==false){
	 header("location:informacje.php?error=kodpocztowy");
 exit();
	 }
if(miejscowosc($miejscowosc) !==false){
	 header("location:informacje.php?error=miejscowosc");
 exit();
	 }
if(kraj($kraj) !==false){
	 header("location:informacje.php?error=kraj");
 exit();
	 }

     $zapytanie2="INSERT INTO klient(imie,nazwisko,telefon,adres,kodpocztowy,email,miejscowosc,kraj) VALUES ('$imie','$nazwisko','$telefon','$adres','$kodpocztowy','".$_SESSION['user']."','$miejscowosc','$kraj')";
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
?>