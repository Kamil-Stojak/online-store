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
        <a href="https://pja.edu.pl" target="_blank"><img src="logo.png"></a>
    </div>

    <div class="odnosniki">
        <p><a href="https://www.facebook.com/polskojaponska/">facebook</a></p>
        <p><a href="https://www.instagram.com/polskojaponska/">instagram</a></p>
        <p><a href="https://twitter.com/polskojaponska">Twitter</a></p>
		<p><p>
		</div>
		</nav>
		<section class="main">
	<div class="main_1">
		<div class="main_1_2">
<h1><center>Cześć
<?php
require_once('connection.php');
session_start();

	if(!isset($_SESSION['user'])){
    header('location:logowanie.php');
		}else{
echo $_SESSION['user'];

if(isset($_GET['error']))
{

?>
  w czym możemy ci pomóc?
  
  <?php
  	if($_GET['error']=="puste_pola"){
		echo"<p>wypełnij wszystkie pola";
	}
		if($_GET['error']=="tytul"){
		echo"<p>Tytuł musi posiadać 10 liter";
	}
}}
  
  ?>
  
  </h1></center>
<form class="form_support" method="POST" action="support3.php">
Tytuł:<input name="tytul" type="text"> <br>
Pytanie:<textarea name="Pytanie" type="text"></textarea><br>
<input class="easybutton" type="submit" value="wyślij"><br>
  </div> </div>
	</body>