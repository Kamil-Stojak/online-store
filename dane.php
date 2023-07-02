<?php
require_once('connection.php');
session_start();
$dane2="SELECT klient.imie,klient.nazwisko,klient.telefon,klient.adres,klient.kodpocztowy,klient.email FROM logowanie,klient WHERE logowanie.Email=klient.Email AND logowanie.Email='".$_SESSION['user']."'";
$resoult2=mysqli_query($conn,$dane2)or die("error");
if(mysqli_fetch_assoc($resoult2))
	{
		$_SESSION['user']=$_POST['email'];
		;
	}else
?>