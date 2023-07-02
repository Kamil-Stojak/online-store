<?php
session_start();
$conn = new mysqli("localhost","root","","piwa")or die("błąd");
    $slowo = $conn->query("SELECT * FROM logowanie WHERE Email='$email' AND password='$pass'")or die("error");
	$wiersz = $slowo->fetch_assoc();
	$login = $wiersz['Email'];
	$haselko = $wiersz['password'];
?>