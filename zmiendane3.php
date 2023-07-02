<?php


if( isset($_POST["imie"]) ){
	$imie = $_POST["imie"];
	$nazwisko = $_POST["nazwisko"];
	$adres = $_POST["adres"];
		$telefon = $_POST["telefon"];
   $kodpocztowy = $_POST["kodpocztowy"];
   $kraj = $_POST["kraj"];
    $miejscowosc = $_POST["miejscowosc"];
	
	
	 require_once'connection.php';
	 require_once'zmiendane2.php';
	 
	 	 /*sprawdzanie*/
	 
 if(imionka3($imie,$nazwisko,$telefon,$kodpocztowy,$kraj,$miejscowosc,$adres) !==false){
	 header("location:zmiendane.php?error=puste_pola");
     exit();
 }
if(invalidPhone($telefon) !==false){
	 header("location:zmiendane.php?error=zły_numer_telefonu");
 exit();
	 }
if(namevalidation($imie) !==false){
	 header("location:zmiendane.php?error=tonieimie");
 exit();
	 }
if(surnamevalidation($nazwisko) !==false){
	 header("location:zmiendane.php?error=tonienazwisko");
 exit();
	 }
if(kodpocztowy($kodpocztowy) !==false){
	 header("location:zmiendane.php?error=kodpocztowy");
 exit();
	 }
if(miejscowosc($miejscowosc) !==false){
	 header("location:zmiendane.php?error=miejscowosc");
 exit();
	 }
if(kraj($kraj) !==false){
	 header("location:zmiendane.php?error=kraj");
 exit();
	 }
	 
	 
      $zapytanie2="UPDATE klient SET imie='$imie', nazwisko='$nazwisko',telefon='$telefon' , adres='$adres' , kodpocztowy='$kodpocztowy',miejscowosc='$miejscowosc',kraj='$kraj' WHERE email= '$_SESSION[user]'";
	 
	 $odp=mysqli_query($conn,$zapytanie2)or die("error404");
	 
	 
	 if($odp)
	 {
		 echo"<p>dodano informacje";
		 header('location:profil.php');
	 }
	 else
	 {
		 echo"nie dodano informacji!";
		 
	 
	 /* */
	 	
		
}}
?>