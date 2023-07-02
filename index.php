<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="kamil.css">
    <title>Browar pod Pjatkiem</title>
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
		<p><p>
		<?php
require_once('connection.php');
session_start();
		if(!isset($_SESSION['user'])){
echo "<p><a href='register.php' ><input class='easybutton1' type='submit' value=' register '></a></p>";
echo "<p><a href='logowanie.php' ><input class='easybutton1' type='submit' value=' login '></a></p>";
		}else{
echo "Hello: <br>"; echo "<a href='profil.php'> $_SESSION[user] </a>";
echo "<p><a href='wyloguj.php' ><input class='easybutton' type='submit' value='wyloguj'></a>";
		}
?>
		</div></div></nav>

</section>
<div class="main_end">
<div class="end">
<script>
            $(document).ready(function(){
                filter_data();
                function filter_data()
                {
                    $('.filter_data').html('<div id="loading" style="float: right;" ></div>');
                    var action = 'fetch_data';
                    var minimum_price = $('#hidden_minimum_price').val();
                    var maximum_price = $('#hidden_maximum_price').val();
                    $.ajax({
                        url:"fetch_data.php",
                        method:"POST",
                        data:{action:action, minimum_price:minimum_price, maximum_price:maximum_price},
                        success:function(data){
                            $('.filter_data').html(data);
                        }
                    });
                }
                $('#price_range').slider({
                    range:true,
                    min:1000,
                    max:3000,
                    values:[1000, 3000],
                    step:50,
                    stop:function(event, ui)
                    {
                        $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
                        $('#hidden_minimum_price').val(ui.values[0]);
                        $('#hidden_maximum_price').val(ui.values[1]);
                        filter_data();
                    }
                });
            });
        </script>
		<?php
include('connect.php');
if(isset($_POST["action"]))
{
    $query = $conn->query("SELECT * FROM produkt");
    if(isset($_POST["minimum_price"], $_POST["maximum_price"]) && !empty($_POST["minimum_price"]) && !empty($_POST["maximum_price"]))
    {
        $query = $conn->query("SELECT * FROM produkt WHERE cena BETWEEN '".$_POST["minimum_price"]."' AND '".$_POST["maximum_price"]."'");
    }
    $total_row = mysqli_num_rows($query);
    $output = '';
    if($total_row > 0){
        while ($row = $query ->fetch_object()) {
            $output .= '
            
            <style>
            .inpucik{
            transition: 0.5s;
            margin-left:-5px;
            }
                .inpucik:hover{
                    transform: scale(1.1);
                }
            </style>
                <div style=" border-radius:5px; padding:10px; width: 40%; border-radius:20px; height:22rem;">
                
                    <img class="inpucik" src="images/'. $row->zdj .'" style=" width: 95%;margin-bottom:20px;"alt="" class="img-responsive" >
                    <h2 align="center" style=""><strong>'. $row->nazwa .'</strong></h2>
                    <br>
                    <h4 style="text-align:center;" class="text-danger" >'. $row->cena .' kcal</h4>
                    <br>
                   <a style="text-decoration: none; color:white;" href="'. $row->index .'"> <button class="btn"  style="width: 80%; color:white;">WIĘCEJ INFORMACJI</button></a>
                   
                </div>
                
            
            
            ';
        }
    }else{
        $output = '<h3>Brak danych</h3>';
    }
    echo $output;
}

?>
<div class="produkt">
<?php

$sql="SELECT * FROM produkt";
$wynik=$conn->query($sql);
if($wynik->num_rows > 0){
	
	
	
	
	while($row=$wynik->fetch_assoc()){
echo  " <tr><br><br><p>
                            <td>'<a href='kamil.php?id=".$row['ID']."'>'". $row['nazwa'] ."'</a>'</td> 
<br><p>
      <img src='$row[zdj]'alt=error404 width='100%'>
	 " ;
	 
	 echo "



           
                                       <td>
									   
									   
                                       </td>
                                 
                            </tr>";
	}
}
?>
</div>
</div>
<div class="end1">
<div class="sekcja_1_1_1">
<?php
include 'kategorie.php';

?>
</div>
</div>
</div>
</body>
</html>