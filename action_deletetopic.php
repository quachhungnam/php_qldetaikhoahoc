<?php
    if (empty($_SESSION['user'])) {
        header('location:index.php');
    }
    if ($_SESSION['user']['role_id']!=1&&$_SESSION['user']['role_id']!=0) {
        header('location:index.php');
    }
    
if($_REQUEST['action'] == 'deletetopic') {
    header("Content-type: text/html; charset=utf-8"); //tieng viet
    session_start();

   

    $topic_id = $_REQUEST['topicid'];
    $user_id = $_REQUEST['userid'];

    $connect = new mysqli("localhost", "root", "", "ttcnweb");
    mysqli_set_charset($connect, 'UTF8');
    $sql="DELETE from user_register_topic where topic_id='$topic_id'";
    $sql2="DELETE from topic where topic_id='$topic_id'";
    
    if ($connect->query($sql) === TRUE) {
        if ($connect->query($sql2) === TRUE) {
            header("location:managetopics.php?userid=$user_id");
        }
        else{
            echo "Lỗi: " . $connect->error;
        }
    } else {
        echo "Lỗi: " . $connect->error;
    }
    $connect->close();
}
?>