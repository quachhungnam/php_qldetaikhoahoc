<?php
header("Content-type: text/html; charset=utf-8"); //tieng viet
session_start();
if (empty($_SESSION['user'])) {
    header('location:index.php');
}
if (!empty($_SESSION['user']) && $_SESSION['user']['role_id'] != 0) {
    header('location:index.php');
}

$connect = new mysqli("localhost", "root", "", "ttcnweb");
mysqli_set_charset($connect, 'UTF8');

$username = $_REQUEST['username'];
$sql_check_username = "SELECT * from user where username='$username'";
$result_check_username = mysqli_query($connect, $sql_check_username);

if (mysqli_num_rows($result_check_username) > 0) {
    //kiem tra username trung`
    die("username da ton tai");
} else {
    //lay gia tri id_user de chen
    $sql_max_id = "SELECT max(id) as max_id from user";
    $result_max_id = mysqli_query($connect, $sql_max_id);
    if (mysqli_num_rows($result_max_id) > 0) {
        $row = mysqli_fetch_assoc($result_max_id);
        $max_id = $row['max_id'] + 1;
        $fullname = $_REQUEST['fullname'];
        $birthday = $_REQUEST['birthday'];
        $gender = $_REQUEST['gender'];
        $faculity = $_REQUEST['faculity'];
        $address = $_REQUEST['address'];
        $phonenumber = $_REQUEST['phonenumber'];
        $email = $_REQUEST['email'];
        $role_account = $_REQUEST['role_account'];
        $password = $_REQUEST['password'];
        $create_at = date("Y/m/d");
        $create_by = $_SESSION['user']['user_id'];
        $deleted = 0;


        $sql_add_user = "INSERT into user(id, username, password,role_id,create_at,create_by,update_at,deleted) 
        values('$max_id ','$username','$password','$role_account',' $create_at',' $create_by','$create_at','$deleted');";
        
        if ($connect->query($sql_add_user) === TRUE) {
            $sql_add_user_infor = "INSERT into user_infor(full_name, gender, faculity,birthday,address,phone_number,email,user_id) 
            values('$fullname','$gender','$faculity','$birthday','$address','$phonenumber','$email',' $max_id');";

            if ($connect->query($sql_add_user_infor) === TRUE) {
                header("location:manageaccount.php");
            } else {
                echo "Lỗi: " . $connect->error;
            }
        }else{
            echo "Lỗi: " . $connect->error;
        }
    }
}
