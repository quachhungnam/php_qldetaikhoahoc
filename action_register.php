<?php
header("Content-type: text/html; charset=utf-8"); //tieng viet
session_start();

if (empty($_SESSION['user'])) {
    header('location:index.php');  
}else if($_SESSION['user']['role_id']!=2){
    header('location:index.php');
}

$user_id = $_REQUEST['userid'];
$topic_id = $_REQUEST['topicid'];
$today = date("Y/m/d");
//huy dang ky de tai
if ($_REQUEST['action']=='unreg_topic') {
    $sql = "DELETE from user_register_topic where user_id='$user_id ' and topic_id = '$topic_id'";
}
//dang ky de tai
if ($_REQUEST['action']=='reg_topic') {
    $sql = "INSERT INTO user_register_topic (user_id,topic_id,date_register)
    VALUES('$user_id','$topic_id','$today');";
}

$connect = mysqli_connect("localhost", "root", "", "ttcnweb");
mysqli_set_charset($connect, 'UTF8');

if ($connect->query($sql) === TRUE) {
    // echo $topic_id;
    // header("location:topicdetail.php?topicid=$topic_id");
} else {
    echo "Lỗi: " . $connect->error;
}
?>