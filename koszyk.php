<?php

            @include 'connect.php';

            session_start();

            if(!isset($_SESSION['user'])){
                header('location:login.php');
            }

            $user = $_SESSION['user'];
            $sql = "SELECT * FROM koszyk WHERE klient_id = ('$user') AND potwierdzenie = 0";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $sql2 = "SELECT nazwa,cena,rodzaj,zdj FROM produkt WHERE ID=$row[produkt_id]";
                    $_SESSION['koszyk_id'] = $row['ID'];
                    $result2 = $conn->query($sql2);
                    $output = '';
                    if ($result2->num_rows > 0) {
                        while($row = $result2->fetch_object()) {
                            $output .=
                                '<div style="background: #F3ECEA;">
								
                                      <p><h3>'. $row->nazwa .'</h3></p><p><img style="width:20%;"src='. $row->zdj .'></p><p><h3>'. $row->cena .' PLN</p><p><h3>' .$_SESSION['ilosc1'].'szt. </p></h3>
                                   </div>
                                         <hr> ';
                                }
                            }
                            else{
                                $output = '<h3>Brak danych</h3>';
                            }
                            echo $output;
                        }
                    }
                    ?>
					
					<form action="" method="post" style="text-align: center;">
                        <?php
                            if (isset($_POST['del'])){
                                $user = $_SESSION['user'];
                                $stmt=$conn->prepare("DELETE FROM koszyk WHERE klient_id = ('$user') AND potwierdzenie = 0");
                                $stmt->execute();
                                header('Refresh:0;');
                            }
                        ?>


                        <?php
						
                            if (isset($_POST['confirm'])){
                                $user = $_SESSION['user'];
							    $stmt=$conn->prepare("UPDATE koszyk SET potwierdzenie = '1' WHERE klient_id = ('$user')");
								
								
								$wyniczek=$_SESSION['ILOSC']-$_SESSION['ilosc1'];
								echo $wyniczek;
								echo $_SESSION['IDD'];
								
								
								
								$zapytanie22="UPDATE produkt SET ILOSC='$wyniczek' WHERE ID='".$_SESSION['IDD']."'";
								echo $zapytanie22;
	                            $odp=mysqli_query($conn,$zapytanie22)or die("error404");
                                
								
								$_SESSION['jeden'] = 1;
                                $stmt->execute();
                                header('Location:koszyk.php');
						}
					else{
						
					}
                        ?>
						
                    <div class="a1">
                        <a  style="text-decoration:none;"  >  <button class="btn"  style="width: 80%;" name="del" type="submit" role="button">Wyczyść koszyk</button></a>
                    </div>
                        <div class="a2">
                        <a  style="text-decoration:none;" >  <button class="btn" style="width: 80%;"  name="confirm" type="submit" role="button">Potwierdź <zamówienie></zamówienie></button></a>
                        </div>
						                        <div class="a2">
                       <a href="kupione.php" ><input class="easybutton1" value="ZAMÓWIONE"></a>
                        </div>
                    </form>