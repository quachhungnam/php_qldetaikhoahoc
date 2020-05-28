<?php
header("Content-type: text/html; charset=utf-8");
session_start();
if (empty($_SESSION['user'])) {
    header('location:index.php');
}

if($_REQUEST['action'] == 'changeinfor') {

    $user_id = $_REQUEST['userid'];
    if($user_id!=$_SESSION['user']['user_id'] && $_SESSION['user']['role_id']!=0){
        die("Không được phép");
    }
    $fullname = $_REQUEST['fullname'];
    $birthday = $_REQUEST['birthday'];
    $phone_number = $_REQUEST['phonenumber'];
    $gender = $_REQUEST['gender'];
    $email = $_REQUEST['email'];
    $address = $_REQUEST['address'];

    $connect = new mysqli("localhost", "root", "", "ttcnweb");
    if ($connect->connect_error) {
        die("Connection failed: " . $connect->connect_error);
    }
    mysqli_set_charset($connect, 'UTF8');



    $sql = "UPDATE user_infor 
    SET full_name='$fullname',email='$email',phone_number='$phone_number',
    address='$address',birthday='$birthday',gender='$gender'
    WHERE user_id='$user_id'";

    if($_SESSION['user']['role_id']==0){
        $fac=$_REQUEST['faculity'];
        $sql = "UPDATE user_infor 
        SET full_name='$fullname',email='$email',phone_number='$phone_number',
        address='$address',birthday='$birthday',gender='$gender',faculity='$fac'
        WHERE user_id='$user_id'";
    }

    if ($connect->query($sql) === TRUE && $user_id==$_SESSION['user']['user_id']) {
        $_SESSION['user']['full_name']=$fullname;
    } else {
        echo "Lỗi: " . $connect->error;
    }
 
    $connect->close();
}
?>