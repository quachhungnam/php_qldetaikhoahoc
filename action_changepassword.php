<?php
header("Content-type: text/html; charset=utf-8"); //tieng viet
session_start();
if (empty($_SESSION['user'])) {
    header('location:index.php');
}

$connect = new mysqli("localhost", "root", "", "ttcnweb");
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}
mysqli_set_charset($connect, 'UTF8');



$user_id = $_REQUEST['userid'];
// die($user_id);
$oldpsw = isset($_REQUEST['oldpsw'])?$_REQUEST['oldpsw']:"";
$newpsw = $_REQUEST['newpsw1'];
$newpsw2 = $_REQUEST['newpsw2'];



//2 o mat khau khac nhau
$sql1 = "SELECT * from user where id = '$user_id' and password = '$oldpsw'";
$sql2 = "UPDATE user set password='$newpsw' where id='$user_id'";

$result1 = mysqli_query($connect, $sql1);
$count1 = mysqli_num_rows($result1);
//admin doi mat khau tai khoan nguoi dung
if ($_SESSION['user']['user_id'] != $user_id && $_SESSION['user']['role_id'] == 0) {
    if ($newpsw == $newpsw2) {
        //tien hanh doi mat khau
        if ($connect->query($sql2) === TRUE) {
            $error_notice = "Đổi mật khẩu thành công!";
            header("location:changepassword.php?userid=$user_id&&errornotice=$error_notice");
        } else {
            echo "Lỗi: " . $connect->error;
        }
    }
    else {
        $error_notice = "Vui lòng kiểm tra lại các mật khẩu!";
        header("location:changepassword.php?userid=$user_id&&errornotice=$error_notice");
        // echo '<script>alert("Mật khẩu hiện tại không đúng")</script>';
        // echo ' <script>window.history.back();</script>';
    }
} 
//nguoi dung tu doi mat khau cho chinh minh
else {
    //tim thay tai khoan, 2 password moi giong nhau
    if ($count1 > 0 && $newpsw == $newpsw2) {
        //tim thay tai khoan mat khau khop
        $row1 = mysqli_fetch_assoc($result1);
        $auser['user'] = array(
            'user_id' => $row1['id'],
            'user_name' => $row1['username'],
            'pass_word' => $row1['password'],
        );
        //doi mat khau\
        if ($connect->query($sql2) === TRUE) {
            $_SESSION['user']['pass_word'] = $newpsw;
            $error_notice = "Đổi mật khẩu thành công!";
            header("location:changepassword.php?userid=$user_id&&errornotice=$error_notice");
        } else {
            echo "Lỗi: " . $connect->error;
        }
    } else {
        $error_notice = "Vui lòng kiểm tra lại các mật khẩu!";
        header("location:changepassword.php?userid=$user_id&&errornotice=$error_notice");
        // echo '<script>alert("Mật khẩu hiện tại không đúng")</script>';
        // echo ' <script>window.history.back();</script>';
    }
}
$connect->close();
