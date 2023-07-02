
<!doctype html>
<html lang="pl">
    <link rel="stylesheet" href="kamil.css">
<title>profil</title>
<head>
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
    </div>

</nav>


<section class="main">
	<div class="main_1">
		<div class="main_1_1">
			<img src="photo.png" alt="">
		</div>
		<div class="main_1_2">

<?php
require_once('connection.php');
session_start();
if(!isset($_SESSION['user'])){
    header('location:logowanie.php');
		}else{

?>
CZY NAPEWNO CHCESZ USUNĄĆ KONTO?
<a href="profil.php" ><input class="easybutton" type="submit" value="NIE" ></a>
<form method="POST" action="usunosobe.php">
<a href="usunosobe.php" ><input class="easybutton" type="submit" value="TAK" name="usun"></a>

<?php
@include 'connect.php';
if(isset($_POST['usun']))
{
    $user_id = $_POST['usun'];
    $query = "DELETE FROM logowanie WHERE Email='".$_SESSION['user']."' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run){
		session_destroy();
        header('Location: index.php');
        exit(0);
    }
}





}
?>