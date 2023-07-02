<?php

@include 'db_conn.php';

session_start();

if(isset($_POST['submit'])){


    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = ($_POST['password']);


    $select = " SELECT * FROM logowanie WHERE email = '$email' && password = '$pass' ";

    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result) > 0){

        $row = mysqli_fetch_array($result);

        if($row['usertype'] == 'admin'){

            $_SESSION['admin_id'] = $row['username'];
            header('location:admin.php');

        }elseif($row['usertype'] == 'user'){

            $_SESSION['user_id'] = $row['username'];
            header('location:glowna.php');
        }

    }else{
        $error[] = 'Nieprawidłowe dane logowania!';
    }
};
?>