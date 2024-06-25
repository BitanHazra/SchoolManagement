<?php
    include 'C:\xampp\htdocs\school_Management\db_connection\db_connect.php';
if($_POST['work']==='login'){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT admin FROM login where username='$username' and password='$password'";
    $result = pg_query($db,$query);
    $admin = pg_fetch_result($result,0,0);
    session_start();
    $_SESSION['username']=$_POST['username'];
    $_SESSION['admin'] = $admin;

    header('Content-Type: application/json');
    echo json_encode($admin);
}
if($_POST['work']==='logout'){
    session_start();
    $_SESSION = array();
    session_destroy();
    
    header('Content-Type: application/json');
    echo json_encode(1);
}
?>