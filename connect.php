<?php

	$conn = new mysqli("localhost","root","","piwa")or die("błąd");

if (!$conn) {
    echo "Connection Failed!";
}

?>