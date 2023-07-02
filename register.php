<head>
<meta charset="utf-8">
    <link rel="stylesheet" href="css.css">
</head>
    <title>Rejestracja</title>
<body>

<div class="wysylanie" id="margin">
<div class="php">
<?php
if(isset($_GET['error']))
{
	if($_GET['error']=="puste_pola"){
		echo"by zostać zarejestrowanym pierw podaj email i hasło";
	}
		if($_GET['error']=="zly_email"){
		echo"podałeś błędny email";
	}
	  if($_GET['error']=="Hasła_się_nie_zgadzają"){
		echo"hasła się nie zgadzają";
	}
		  if($_GET['error']=="email_istnieje"){
		echo"email istnieje uzyj innego emailu lub się zaloguj->";
		echo "<p><a href='logowanie.php' ><input class='easybutton1' type='submit' value=' login '></a></p>";
	}
		  if($_GET['error']=="1111"){
		echo"";
	}
}
/*	
	  if($_GET['error']==""){
		echo"";
	}
	
	*/
?>

</div>
<form method="POST" action="register3.php">
<h2>REJESTRACJA</h2>
Email:<input name="email" type="email"> <br>
Haslo:<input name="haslo" type="password"><br>
Powtórz Hasło:<input name="haslo2" type="password"><br>
<input class="easybutton" type="submit" value="register"><br>

</div>
</form>
</body>