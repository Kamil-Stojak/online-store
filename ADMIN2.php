<?php
@include 'connect.php';
if(isset($_POST['usun']))
{
    $user_id = $_POST['usun'];
    $query = "DELETE FROM logowanie WHERE id='$user_id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run){
        header('Location: admin.php');
        exit(0);
    }
}
?>

<?php
@include 'connect.php';
if(isset($_POST['usun2']))
{
    $user_id = $_POST['usun2'];
    $query = "DELETE FROM pytania WHERE id='$user_id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run){
        header('Location: admin.php');
        exit(0);
    }
}
?>
<?php
@include 'connect.php';
if(isset($_POST['usun3']))
{
    $user_id = $_POST['usun3'];
    $query = "DELETE FROM opinie WHERE id='$user_id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run){
        header('Location: admin.php');
        exit(0);
    }
}
?>