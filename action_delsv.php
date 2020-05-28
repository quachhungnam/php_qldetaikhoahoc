<?php

    header("Content-type: text/html; charset=utf-8"); //tieng viet
    session_start();
    if (empty($_SESSION['user'])) {
        header('location:index.php');
    }
    if (!empty($_SESSION['user']) && $_SESSION['user']['role_id']!=1 && $_SESSION['user']['role_id']!=0 ) {
        header('location:index.php');
    }

    $user_id = $_REQUEST['userid'];
    $topic_id = $_REQUEST['topicid'];

    $connect = new mysqli("localhost", "root", "", "ttcnweb");
    mysqli_set_charset($connect, 'UTF8');
    $sql="DELETE from user_register_topic where user_id='$user_id' and topic_id='$topic_id'";
  
    if ($connect->query($sql) === TRUE) {
        header("location:liststudent.php?topicid=$topic_id");
    } else {
        echo "Lỗi: " . $connect->error;
    }
    $connect->close();
?>
