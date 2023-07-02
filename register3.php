<?php
if( isset($_POST["email"]) ){
	$email = $_POST["email"];
	$haslo = $_POST["haslo"];
	$haslo2 = $_POST["haslo2"];
	 require_once'connection.php';
	 require_once'register2.php';
	 
	 	 /*sprawdzanie*/
	 
 if(imionka($email,$haslo,$haslo2) !==false){
	 header("location:register.php?error=puste_pola");
 exit();
 }
 
 
 if(invalidEmail($email) !==false){
	 header("location:register.php?error=zly_email");
 exit();
	 }
	 $emaile="SELECT Email FROM logowanie where Email='".$_POST['email']."' ";
	$czyemailistnieje=mysqli_query($conn,$emaile)or die("error");
	if($czyemailistnieje->num_rows > 0){
		$tak = $czyemailistnieje->fetch_assoc();
			header("location:register.php?error=email_istnieje");
			 exit();
}
	 
  if(pwdMatch($haslo,$haslo2) !==false){
	 header("location:register.php?error=Hasła_się_nie_zgadzają");
 exit();
	 }
	 
	 
	 
	 /*działanie rejestracji*/
	
 	$conn = new mysqli("localhost","root","","piwa")or die("błąd");
	 $odp = $conn->query("INSERT INTO logowanie(Email,password) VALUES ('$email','$haslo')")or die("error404");
	
	if($odp)
	 {
		 echo"dodano użytkownika";
		 header('location:logowanie.php');
	 }
	 else
	 {
		 echo"nie dodano użytkownika!";
		 
	 }
	$conn->close();
	
	 
 }else{
	 header("location:register.php");
	 exit();
}
?>