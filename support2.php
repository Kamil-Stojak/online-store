<body>
<?php
require_once('connection.php');
if( isset($_POST["tytul"]) ){
	$tytul = $_POST["tytul"];
	$Pytanie = $_POST["Pytanie"];

function imionka4($tytul,$Pytanie){
    if(empty($tytul) || empty($Pytanie)){
        $result=true;
    }
    else{
        $result=false;
    }
    return $result;
	}

}
?>

</body>