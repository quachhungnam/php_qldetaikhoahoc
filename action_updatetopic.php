<?php
header("Content-type: text/html; charset=utf-8"); //tieng viet
session_start();
if (empty($_SESSION['user'])) {
    header('location:index.php');
}
if (!empty($_SESSION['user']) && $_SESSION['user']['role_id']!=1&& $_SESSION['user']['role_id']!=0) {
    header('location:index.php');
}

$user_id=isset($_REQUEST['userid'])?$_REQUEST['userid']:$_SESSION['user']['user_id'];

if(isset($_REQUEST['addtopic'])){
    
    $topic_name=$_REQUEST['topic_name'];
    $topic_type=$_REQUEST['topic_type'];
    $topic_description=$_REQUEST['topic_description'];
    $topic_teacher=$user_id;
    $today = date("Y/m/d") ;
   
    $topic_deleted=0;
    $topic_abstract=$_REQUEST['topic_abstract'];
    $topic_intro=$_REQUEST['topic_intro'];
    $topic_content=$_REQUEST['topic_content'];
    $topic_conclude=$_REQUEST['topic_conclude'];
   
    //them de tai

    if($_REQUEST['topicid']==null){   
    $topic_status=isset($_REQUEST['topic_status'])?$_REQUEST['topic_status']:1;
   
    $sql = "INSERT INTO topic(topic_name, topic_type, topic_description, topic_teacher, 
    topic_datecreate, topic_status, deleted, topic_abstract, 
    topic_intro, topic_content, topic_conclude) 
    VALUES ('$topic_name',' $topic_type','$topic_description','$topic_teacher',
    '$today','$topic_status','$topic_deleted','$topic_abstract',
    '$topic_intro','$topic_content','$topic_conclude');";

    }
    //update de tai
    else{
        // die($_REQUEST['topicid']);
        $topic_status=isset($_REQUEST['topic_status'])?$_REQUEST['topic_status']:1;
        $topic_id=$_REQUEST['topicid'];
        $sql= "UPDATE topic 
        SET topic_name='$topic_name',topic_type= '$topic_type',
        topic_description='$topic_description',
        topic_teacher='$user_id',
        topic_status='$topic_status',topic_abstract='$topic_abstract',
        topic_intro='$topic_intro',topic_content='$topic_content',
        topic_conclude='$topic_conclude'
        WHERE topic_id='$topic_id'";
    }

}

$connect = new mysqli("localhost", "root", "", "ttcnweb");
mysqli_set_charset($connect, 'UTF8');

if ($connect->query($sql) === TRUE) {
    
   
    if($_REQUEST['topicid']==null){
        header("location:managetopics.php?userid=$user_id");
    }
    if($_REQUEST['topicid']!=null){
        header("location:topicdetail.php?topicid=$topic_id");
    }
} else {
    echo "Lỗi: " . $connect->error;
}
$connect->close();
?>