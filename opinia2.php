<?php
if( isset($_POST["email5"]) ){
	$email5 = $_POST["email5"];
	$opinia = $_POST["opinia"];
	
	 require_once'connection.php';
	 require_once'opinia.php';
	 
	 	 /*sprawdzanie*/
	 
 if(imionka($email5,$opinia) !==false){
	 header("location:kamil.php?error=puste_pola");
 exit();
 }
 
 $conn = new mysqli("localhost","root","","piwa")or die("błąd");
	 $odp = $conn->query("INSERT INTO opinie(klient_Email,produkt_id,Opinia) VALUES ('$email5','".$_SESSION['IDD']."','$opinia')")or die("error404");
	
	if($odp)
	 {
		 echo"dodano opinię";
		 header('location:kamil.php');
	 }
	 else
	 {
		 echo"nie dodano opinji!";
		 
}}
	 ?>