<body>
<?php
session_start();
if( isset($_POST["tytul"]) ){
	$tytul = $_POST["tytul"];
	$Pytanie = $_POST["Pytanie"];

	
	
	 require_once'connection.php';
	 require_once'support2.php';
	 
	 	 /*sprawdzanie*/
	 
 if(imionka4($tytul,$Pytanie) !==false){
	 header("location:support.php?error=puste_pola");
     exit();
 }
	 }
	 
$zapytanie2="INSERT INTO pytania(Email,tytul,Pytanie) VALUES ('".$_SESSION['user']."','$tytul','$Pytanie')";
	 $odp=mysqli_query($conn,$zapytanie2)or die("error404");
	 
if($odp)
	 {
		 header('location:profil.php');
	 }
	 else
	 { 
	 }
	 ?>
	 
	 </body>