<body>
<?php
$conn = new mysqli("localhost","root","","piwa")or die("błąd");


if(isset($_POST['submit'])){
	$email =($_POST['email']);
    $pass = ($_POST['password']);
	echo $email;
if( empty($email) || empty($pass))

{
	echo "wypełnij wszystkie pola ! ! !";
}
else
{
    $result = $conn->query("SELECT * FROM logowanie WHERE Email='$email' AND password='$pass'")or die("penis");
	echo $result;
}
};
?>
</body>