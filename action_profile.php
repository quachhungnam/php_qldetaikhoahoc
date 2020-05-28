<?php
if ($_SESSION['user']['role_id'] == 0) {
    header("location:admin.php");
}else{
    header("location:index.php");
}
