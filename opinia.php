<?php
require_once('connection.php');
session_start();
if( isset($_POST["email5"]) ){
	$email5 = $_POST["email5"];
	$opinia = $_POST["opinia"];
	
	
	function imionka($email5,$opinia){
    if(empty($email5) || empty($opinia)){
        $result=true;
    }
    else{
        $result=false;
    }
    return $result;
}}
	
	
	
	
	
	
	
	
	
	
	
	?>