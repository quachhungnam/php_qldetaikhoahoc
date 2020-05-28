<?php
header("Content-type: text/html; charset=utf-8"); //tieng viet
session_start();
if (empty($_SESSION['user'])) {
    header('location:index.php');
}
if (!empty($_SESSION['user']) && $_SESSION['user']['role_id']!=1&& $_SESSION['user']['role_id']!=0) {
    header('location:index.php');
}

$topic_type_name=isset($_REQUEST['topic_type_name'])?$_REQUEST['topic_type_name']:"";
$topic_type_description=isset($_REQUEST['topic_type_description'])?$_REQUEST['topic_type_description']:"";

$connect = new mysqli("localhost", "root", "", "ttcnweb");
mysqli_set_charset($connect, 'UTF8');
$sql="INSERT INTO topic_type(topic_type_name,topic_type_description) values('$topic_type_name','$topic_type_description');";

if($connect->query($sql)===true){
    header("location:managetopics.php");
}else{
    die("error");
}
$connect->close();
?>
