<?php
require_once('connection.php');
session_start();
if( isset($_POST["imie"]) ){
	$imie = $_POST["imie"];
	$nazwisko = $_POST["nazwisko"];
	$telefon = $_POST["telefon"];
		$adres = $_POST["adres"];
   $kodpocztowy = $_POST["kodpocztowy"];
   $kraj = $_POST["kraj"];
    $miejscowosc = $_POST["miejscowosc"];
function imionka2($imie,$nazwisko,$telefon,$kodpocztowy,$kraj,$miejscowosc,$adres){
    if(empty($imie) || empty($nazwisko)|| empty($telefon)|| empty($kodpocztowy)|| empty($kraj)|| empty($miejscowosc)|| empty($adres)){
        $result=true;
    }
    else{
        $result=false;
    }
    return $result;
	}
function invalidPhone($telefon){
    if(!preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{3}/",$telefon)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}
function namevalidation($imie){
    if(!preg_match('/^[a-zA-Z]{3,}$/', $imie)) {
       $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}
	
function surnamevalidation($nazwisko){
    if(!preg_match('/^[a-zA-Z]{1,}$/', $nazwisko)) {
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}
	function kodpocztowy($kodpocztowy){
    if(!preg_match("/^[0-9]{2}-[0-9]{3}/",$kodpocztowy)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}
	function miejscowosc($miejscowosc){
    if(!preg_match("/^[a-zA-Z]{1,}/",$miejscowosc)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}
function kraj($kraj){
    if(!preg_match("/^[a-zA-Z]{4,}/",$kraj)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}
	
	
	
	
	
	
	
	
	
	
	
}





/* 
if( empty($email) || empty($haslo))
{
	echo "wypełnij wszystkie pola ! ! !";
}
else
{ */

?>