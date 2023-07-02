<body>
<?php

        @include 'connect.php';
session_start();
        if(!isset($_SESSION['user'])){
            header('location:login.php');
        }

        $user = $_SESSION['user'];

        $sql = "SELECT * FROM koszyk WHERE klient_id = ('$user') AND potwierdzenie = 1";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $sql2 = "SELECT ID, nazwa ,cena,rodzaj,zdj FROM produkt WHERE id=$row[produkt_id]";
                $result2 = $conn->query($sql2);
                $output = '';
                if ($result2->num_rows > 0) {
                    $_SESSION['zamowienie_id'] = $row['ID'];
                    $_SESSION['zamowienie_status'] = $row['status'];

                    while($row = $result2->fetch_object()) {

                        $output .= '
                    <div class="box" >
                    <div class="box_gora">
					
					
                      <p>'. $row->nazwa .'<img style="width:20%;"src= '. $row->zdj .'> '. $row->cena .' PLN</p>
                      <p>ID produktu: '. $_SESSION['zamowienie_id'] .'</p>
                      <p>'. $_SESSION['zamowienie_status'] .'</p>
                    </div>
                       
                       <div class="box_dol">
                       
                       <div style="width: 50%;"> 
                       <a href="pdf.php?em_id='. $_SESSION['zamowienie_id'] .'" style="text-decoration: none; color:black;"><button onclick="" style="width: 100%; height: 100px; border-bottom-right-radius: 0px;">PODGLĄD</button></a>
                        </div>
                        
                         <div style="width: 50%;height: 100px; ">
                          <a style="text-decoration: none; color:black;" href="pdf.php?em_id='. $_SESSION['zamowienie_id'] .'" download="pdf.php?em_id='. $_SESSION['zamowienie_id'] .'"><button style="border-bottom-left-radius: 0px;" onclick="">POBIERZ</button></a>
                        </div>
                         
                       </div>
                    </div>
                    <br>
                       ';
                    }
                }
                else{
                    $output = '<h3>Brak danych</h3>';
                }
                echo $output;
            }
        }

        ?>
</body>

