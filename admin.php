<body>
<link rel="stylesheet" href="admin.css">
<div class"koniec">
<div class="jeden">
<h1>ZAREJESTROWANI UŻYTKOWNICY</h1>
<?php
require_once('connection.php');
session_start();
if($_SESSION['user']=="ADMIN"){

?>
<table>
<tbody>
<?php

$sql="SELECT * FROM logowanie WHERE ID > 1";
$wynik=$conn->query($sql);
if($wynik->num_rows > 0){
	
	while($row=$wynik->fetch_assoc()){
echo  " <tr>
                            <td>'". $row['ID'] ."'</td>
                            <td>'". $row['Email'] ."'</td>

           
                                <form action='ADMIN2.php' method='POST'>
                                       <td>
                                         <button type='submit' name='usun' value='". $row['ID'] ."' >USUŃ</button>
                                       </td>
                                 </form>
                                 
                            </tr>";
	}
}
?>
</tbody>
</table>
</div>
<div class="jedenjeden">
<h1> SUPPORT </h1>
<?php

$sql="SELECT * FROM pytania";
$wynik=$conn->query($sql);
if($wynik->num_rows > 0){
	
	while($row=$wynik->fetch_assoc()){
echo  " <tr>
                            <td>'". $row['ID'] ."'</td>
                            <td>'". $row['Email'] ."'</td>
							<td>'". $row['tytul'] ."'</td>
							<td>'". $row['Pytanie'] ."'</td>

           
                                <form action='ADMIN2.php' method='POST'>
                                       <td>
                                         <button type='submit' name='usun2' value='". $row['ID'] ."' >USUŃ</button>
										 <input name='Pytanie' type='text'><button type='submit' name='SEND' value='". $row['ID'] ."' >Odpowiedz</button>
                                       </td>
                                 </form>
                                 
                            </tr>";
	}
}
?>
</div>

<div class="jedenjedenjeden">
<h1>Opinie o produktach</h1>
<?php

$sql6="SELECT * FROM opinie";
$wynik6=$conn->query($sql6);
if($wynik6->num_rows > 0){
	
	while($row6=$wynik6->fetch_assoc()){
echo  " <tr>
                            <td>'". $row6['ID'] ."'</td>
                            <td>'". $row6['klient_Email'] ."'</td>
							<td>'". $row6['produkt_id'] ."'</td>
							<td>'". $row6['Opinia'] ."'</td>

           
                                <form action='ADMIN2.php' method='POST'>
                                       <td>
                                         <button type='submit' name='usun3' value='". $row6['ID'] ."' >USUŃ</button>
                                       </td>
									   
                                 </form>
                                 
                            </tr><br>";
							
	}
}
?>


</div>

<div class="jedenjedenjedenjeden">
<?php
require_once('connection.php');

if( isset($_POST["nazwa"]) ){
	$Nazwa = $_POST["nazwa"];
	$Cena = $_POST["cena"];
	$Rodzaj = $_POST["rodzaj"];
	$zdj = $_POST["zdj"];
	$Opis = $_POST["Opis"];
	
	
	$piwo="SELECT nazwa FROM produkt WHERE nazwa='".$_POST['nazwa']."'";
	$czypiwo=mysqli_query($conn,$piwo)or die("error");
	if($czypiwo->num_rows > 0){
		$tak = $czypiwo->fetch_assoc();

			echo"taka nazwa piwa istnieje już w bazie danych";
			}else{




	if(empty($_POST['nazwa']) || empty($_POST['cena'])|| empty($_POST['rodzaj'])|| empty($_POST['zdj'])|| empty($_POST['Opis']))
{
	echo "wypełnij wszystkie pola ! ! !<p>";
}
else
{
$dodawanie="INSERT INTO produkt(nazwa,cena,rodzaj,zdj,Opis) VALUES ('$Nazwa','$Cena','$Rodzaj','$zdj','$Opis')";
$resoult5=mysqli_query($conn,$dodawanie)or die("error");
if($resoult5){
	echo " dodano pordukt";
	
}






}
}
}
?>

<form method="POST" action="ADMIN.php">
<h2>DODAWANIE PRODUKTÓW</h2>
Nazwa:<input name="nazwa" type="text"> <br>
Cena:<input name="cena" type="text"><br>
Rodzaj:<input name="rodzaj" type="text"><br>
Zdjęcie z internetu:<input name="zdj" type="text"><br>
Opis produktu:<input name="Opis" type="text"><br>
<input type="submit" name='dodawanie' value="Dodaj Produkt"><br><br><br><br><br><br>
<?php

		}else{
	header('location:profil.php');
		}
?>
</div>
</div>
</body>