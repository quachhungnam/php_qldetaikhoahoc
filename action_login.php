<?php
header("Content-type: text/html; charset=utf-8"); //tieng viet
session_start();

$connect = new mysqli("localhost", "root", "", "ttcnweb");
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}
mysqli_set_charset($connect, 'UTF8');

if (isset($_REQUEST['login'])) {
    $user_name = $_REQUEST['uname'];
    $pass_word = $_REQUEST['psw'];
    if (empty($user_name) && empty($pass_word)) {     
        $error = 'Không tìm thấy!';   
        echo $error;   
    } else {   
        $sql = "SELECT user.id,user.username,user.password,user.role_id,user_infor.full_name 
        FROM user inner join user_infor on user.id=user_infor.user_id
        where username = '$user_name' and password='$pass_word' and user.deleted='0';";

        $result = mysqli_query($connect, $sql);
        $count = mysqli_num_rows($result);
        
         //tim thay tai khoan
        if ($count > 0) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['user'] = array(
                'user_id' => $row['id'],
                'user_name' => $row['username'],
                'pass_word' => $row['password'],
                'role_id' => $row['role_id'],
                'full_name' => $row['full_name']
            );
            if($_SESSION['user']['role_id']==0){
                header("location:admin.php");
            }else{
                header("location:index.php");

            }
        } else {  
            $error_notice="Sai tài khoản hoặc mật khẩu!";
            header("location:login.php?errornotice=$error_notice");
        }
    }  
}
$connect->close();
?>
