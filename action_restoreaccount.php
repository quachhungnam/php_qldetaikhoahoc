<?php
// die('hahaha');
    header("Content-type: text/html; charset=utf-8"); //tieng viet
    session_start();
    if (empty($_SESSION['user'])) {
        header('location:index.php');
    }
    if (!empty($_SESSION['user']) && $_SESSION['user']['role_id']!=0 ) {
        header('location:index.php');
    }

    $user_id = $_REQUEST['userid'];

    $connect = new mysqli("localhost", "root", "", "ttcnweb");
    mysqli_set_charset($connect, 'UTF8');

    $sql="UPDATE user set deleted=0 where id='$user_id'";
  
    if ($connect->query($sql) === TRUE) {
        header("location:myinfor.php?userid=$user_id");
    } else {
        echo "Lỗi: " . $connect->error;
    }
    $connect->close();
?>
