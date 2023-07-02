<?php
require_once('connection.php');
session_start();
if( isset($_POST["email"]) ){
	$email = $_POST["email"];
	$haslo = $_POST["haslo"];
	$haslo2 = $_POST["haslo2"];
	
function imionka($email,$haslo,$haslo2){
    if(empty($email) || empty($haslo)|| empty($haslo2)){
        $result=true;
    }
    else{
        $result=false;
    }
    return $result;
}
function invalidEmail($email){
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result=true;
    }
    else{
        $result=false;
    }
    return $result;
}}
function pwdMatch($haslo,$haslo2){
    if($haslo !== $haslo2){
        $result=true;
    }
    else{
        $result=false;
    }
    return $result;
}





/* 
if( empty($email) || empty($haslo))
{
	echo "wypełnij wszystkie pola ! ! !";
}
else
{ */

?>