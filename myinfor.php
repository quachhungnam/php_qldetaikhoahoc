<?php
header("Content-type: text/html; charset=utf-8"); //tieng viet
session_start();

if (empty($_SESSION['user'])) {
    $error_notice = "Vui lòng đăng nhập để thực hiện chức năng này!";
    header("location:login.php?errornotice=$error_notice");
}

//neu ton tai du lieu REQUESTuserid
if (isset($_REQUEST['userid'])) {
    $user_id = $_REQUEST['userid'];

    $connect = new mysqli("localhost", "root", "", "ttcnweb");
    if ($connect->connect_error) {
        die("Connection failed: " . $connect->connect_error);
    }
    mysqli_set_charset($connect, 'UTF8');

    $sql = "SELECT * from  user_infor 
    inner join user on user_infor.user_id = user.id 
    inner join faculity on user_infor.faculity=faculity.id
    WHERE user_id='$user_id'";

    $sql2 = "SELECT * from faculity";


    $result = mysqli_query($connect, $sql);
    $count = mysqli_num_rows($result);

    $result2 = mysqli_query($connect, $sql2);
    $count2 = mysqli_num_rows($result2);

    if ($count > 0) {
        $row = mysqli_fetch_assoc($result);
        $user_infor['user'] = array(
            'username' => $row['username'],
            'fullname' => $row['full_name'],
            'gender' => $row['gender'],
            'faculity' => $row['faculity'],
            'birthday' => $row['birthday'],
            'phone_number' => $row['phone_number'],
            'address' => $row['address'],
            'email' => $row['email'],
            'deleted' => $row['deleted'],
        );
    } else {
        echo '<script>alert("Không có dữ liệu");</script>';
        die("Không có dữ liệu");
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Quản lý đề tài Khoa học</title>
    <link rel="icon" href="img/core-img/favicon.ico">
    <link href="style.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
</head>

<body>
    <div id="preloader">
        <div class="mosh-preloader"></div>
    </div>

    <header class="header_area clearfix">
        <div class="container-fluid h-100">
            <div class="row h-100">
                <!-- Menu Area Start -->
                <div class="col-12 h-100">
                    <div class="menu_area h-100">
                        <nav class="navbar h-100 navbar-expand-lg align-items-center">
                            <!-- Logo -->
                            <a class="navbar-brand" href="./"><img src="img/core-img/favicon.ico" alt="logo"></a>
                            <h4 style="color: white; text-transform: uppercase;">Quản lý đề tài khoa học</h4>
                            <!-- Menu Area -->
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mosh-navbar" aria-controls="mosh-navbar" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse justify-content-end" id="mosh-navbar">
                                <ul class="navbar-nav animated" id="nav">
                                    <li class="nav-item">
                                        <a class="nav-link" href="./">Trang chủ</a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="moshDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">NCKH</a>
                                        <div class="dropdown-menu" aria-labelledby="moshDropdown">
                                            <a class="dropdown-item" href="managetopics.php">Danh sách các đề tài</a>
                                            <a class="dropdown-item" href="articles.php">Bài báo quốc tế</a>
                                            <a class="dropdown-item" href="statistics.php">Thống kê đề tài NCKH</a>
                                            <a class="dropdown-item" href="http://tapchikhcn.udn.vn">Tạp chí KHCN</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="documents.php">Văn bản pháp quy</a>
                                            <!-- <a class="dropdown-item" href="elements.html">Elements</a> -->
                                        </div>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="about.php">Giới thiệu</a></li>
                                    <li class="nav-item"><a class="nav-link" href="news.php">Tin tức</a></li>
                                    <!-- <li class="nav-item"><a class="nav-link" href="portfolio.html">Portfolio</a></li> -->
                                    <li class="nav-item"><a class="nav-link" href="contact.php">Liên hệ</a></li>
                                    <li class="nav-item"><a class="nav-link" href="http://dut.udn.vn/">Trợ giúp</a></li>
                                </ul>
                                <!-- Search Form Area Start -->
                                <div class="search-form-area animated">
                                    <form action="action_search.php" method="post">
                                        <input type="search" name="search" id="search" placeholder="Tìm kiếm thông tin" required>
                                        <button type="submit" class="d-none"><img src="img/core-img/search-icon.png" alt="Search"></button>
                                    </form>
                                </div>
                                <!-- Search btn -->
                                <div class="search-button">
                                    <a href="#" id="search-btn"><img src="img/core-img/search-icon.png" alt="Search"></a>
                                </div>
                                <!-- Login/Register btn -->
                                <div class="login-register-btn">
                                    <!-- <a href="#">Login</a> -->
                                    <?php
                                    $style = "";
                                    if (empty($_SESSION['user'])) {
                                        //khong ton tai user
                                        $style = "display:none";
                                        echo   '<a href="login.php">Đăng nhập</a>';
                                    }
                                    ?>
                                    <li class="nav-item dropdown active" style="<?php echo $style ?>">
                                        <a class="nav-link dropdown-toggle" href="#" id="moshDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <?php if (!empty($_SESSION['user']))  echo ($_SESSION['user']['full_name']) ?>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="moshDropdown" style="margin-left: -50%;">
                                            <a class="dropdown-item" href="action_profile.php">Trang cá nhân</a>
                                            <a class="dropdown-item" href="myinfor.php?userid=<?php if (!empty($_SESSION['user'])) echo $_SESSION['user']['user_id'] ?>">Thông tin cá nhân</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="changepassword.php?userid=<?php if (!empty($_SESSION['user'])) echo $_SESSION['user']['user_id'] ?>">Đổi mật khẩu</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="managetopics.php?userid=<?php if (!empty($_SESSION['user']))  echo $_SESSION['user']['user_id'] ?>">Quản lý đề tài</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="http://dut.udn.vn/">Trợ giúp</a>
                                            <a class="dropdown-item" href="setting.php">Cài đặt</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="logout.php">Thoát</a>
                                        </div>
                                    </li>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="body-content">
        <div class="container-infor">
            <form action="" method="post">
                <?php
                if (!empty($_SESSION['user']) && $_SESSION['user']['role_id'] == 0) {
                    ?>
                    <span>
                        <a href="manageaccount.php">Danh sách tài khoản</a> </span>
                <?php
                }
                ?>

                <h2>Thông tin cá nhân</h2>

                <hr>
                <div>
                    <label for="psw"><b>Tên đăng nhập</b></label>
                    <input id="" class="" type="text" value="<?php echo  $user_infor['user']['username']; ?>" disabled>
                </div>
                <hr>
                <div>
                    <label for="psw"><b>Họ tên</b></label>
                    <input id="fullname" class="infordetail" type="text" value="<?php echo  $user_infor['user']['fullname']; ?>" disabled>
                </div>
                <hr>
                <div>
                    <label for="psw"><b>Ngày sinh</b></label>
                    <input id="birthday" class="infordetail" type="date" value="<?php echo  $user_infor['user']['birthday']; ?>" disabled>
                </div>
                <hr>
                <div>
                    <label for="psw"><b>Giới tính</b></label>
                    <select id="gender" class="infordetail" disabled>
                        <option value="1" <?php if ($user_infor['user']['gender'] == 1) echo 'selected' ?>>Nam</option>
                        <option value="0" <?php if ($user_infor['user']['gender'] == 0) echo 'selected' ?>>Nữ</option>
                    </select>
                </div>
                <hr>
                <div>
                    <label for="psw"><b>Khoa</b></label>
                    <select name="faculity" class="infordetail2" id="faculity" disabled>
                        <?php
                        if (mysqli_num_rows($result2) > 0) {
                            while ($row = mysqli_fetch_assoc($result2)) {
                                ?>
                                <option <?php if ($user_infor['user']['faculity'] == $row['id']) echo 'selected' ?> value="<?php echo $row['id'] ?>"><?php echo $row['faculity_name'] ?></option>
                        <?php
                            }
                        }
                        ?>
                    </select>
                </div>
                <hr>
                <div>
                    <label for="psw"><b>Số điện thoại</b></label>
                    <input id="phonenumber" class="infordetail" type="text" value="<?php echo  $user_infor['user']['phone_number']; ?>" disabled>

                </div>
                <hr>
                <div>
                    <label for="psw"><b>Email</b></label>
                    <input id="email" class="infordetail" type="text" value="<?php echo  $user_infor['user']['email']; ?>" disabled>
                </div>
                <hr>
                <div>
                    <label for="psw"><b>Địa chỉ</b></label>
                    <input id="address" class="infordetail" type="text" value="<?php echo  $user_infor['user']['address']; ?>" disabled>
                </div>
                <hr>
                <div>
                    <?php
                    if ($user_id == $_SESSION['user']['user_id'] || $_SESSION['user']['role_id'] == 0) {
                        echo '<button type="button" id="btnchange" onclick="enable_disable()">Sửa</button>';
                    }

                    if (!empty($_SESSION['user']) && $_SESSION['user']['role_id'] == 0) {
                        if ($user_infor['user']['deleted'] == 0) {
                            echo '<button style="margin-left:5px;float:right" type="button" class="cancelbtn" onclick="delete_account()">Xóa</button>';
                        }
                        if ($user_infor['user']['deleted'] == 1) {
                            echo '<button style="margin-left:5px;float:right" type="button" class="cancelbtn" onclick="restore_account()">Khôi phục</button>';
                        }
                        echo '<button style="margin-left:5px;float:right" type="button"  onclick="change_password()">Đổi mật khẩu</button>';
                    }
                    ?>
                    <button type="button" class="cancelbtn" onclick="window.history.go(-1);">Hủy bỏ</button>
                </div>
            </form>
        </div>
    </div>

    <?php $connect->close(); ?>

    <footer class="footer-area clearfix">
        <!-- Top Fotter Area -->
        <div class="top-footer-area section_padding_100_0">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-6 col-lg-4">
                        <div class="single-footer-widget mb-100">
                            <h5>BÁCH KHOA ĐÀ NẴNG</h5>
                            <p>Trang quản lý đề tài khoa học - Trường Đại học Bách khoa Đà Nẵng</p>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-4">
                        <div class="single-footer-widget mb-100">
                            <h5>LIÊN KẾT</h5>
                            <ul>
                                <li><a href="index.php">Trang chủ</a></li>
                                <li><a href="http://sv.dut.udn.vn/">Trang sinh viên</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-lg-4">
                        <div class="single-footer-widget mb-100">
                            <h5>THÔNG TIN LIÊN HỆ</h5>
                            <div class="footer-single-contact-info d-flex">
                                <div class="contact-icon">
                                    <img src="img/core-img/map.png" alt="">
                                </div>
                                <p>54 Nguyễn Lương Bằng, Quận Liên Chiểu, TP Đà Nẵng</p>
                            </div>
                            <div class="footer-single-contact-info d-flex">
                                <div class="contact-icon">
                                    <img src="img/core-img/call.png" alt="">
                                </div>
                                <p>0236 3842 308</p>
                            </div>
                            <div class="footer-single-contact-info d-flex">
                                <div class="contact-icon">
                                    <img src="img/core-img/message.png" alt="">
                                </div>
                                <p>‎dhbk@ud.edu.vn</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fotter Bottom Area -->
        <div class="footer-bottom-area">
            <div class="container h-100">
                <div class="row h-100">
                    <div class="col-12 h-100">
                        <div class="footer-bottom-content h-100 d-md-flex justify-content-between align-items-center">
                            <div class="copyright-text">
                                <p>
                                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                    Copyright &copy;
                                    <script>
                                        document.write(new Date().getFullYear());
                                    </script> Thực tập công nhân 2019 <i class="fa fa-heart-o" aria-hidden="true"></i>
                                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                </p>
                            </div>
                            <div class="footer-social-info">
                                <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-behance" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script>
        function change_password() {
            location.href = "changepassword.php?userid=<?php echo $user_id ?>"
        }

        function delete_account() {
            location.href = "action_delaccount.php?userid=<?php echo $user_id ?>"
        }

        function restore_account() {
            location.href = "action_restoreaccount.php?userid=<?php echo $user_id ?>"
        }

        function enable_disable() {
            document.getElementById("btnchange").innerHTML = 'Lưu';
            var ele = document.getElementsByClassName('infordetail')
            let faculity_element = document.getElementById('faculity')
            var role_id = <?php echo $_SESSION['user']['role_id'] ?>

            if (role_id == 0) {
                faculity_element.disabled = false
            }
            for (i = 0; i < ele.length; i++) {
                if (ele[i].disabled == true) {
                    ele[i].disabled = false
                } else {
                    myAjax()
                    break
                }
            }
        }

        function myAjax() {

            var fullname = document.getElementById('fullname')
            var birthday = document.getElementById('birthday')
            var phonenumber = document.getElementById('phonenumber')
            var gender = document.getElementById('gender')
            var email = document.getElementById('email')
            var address = document.getElementById('address')
            let faculity_element = document.getElementById('faculity')
            // var faculity = document.getElementById('faculity')

            $.ajax({
                type: "POST",
                url: 'action_updateinfor.php',
                data: {
                    action: 'changeinfor',
                    userid: <?php echo $user_id ?>,
                    fullname: fullname.value,
                    faculity: faculity_element.value,
                    birthday: birthday.value,
                    phonenumber: phonenumber.value,
                    gender: gender.value,
                    email: email.value,
                    address: address.value,
                },
                success: function() {
                    // alert('doi thong tin thanh cong');
                }
            });
            document.getElementById("btnchange").innerHTML = 'Sửa';
            var ele = document.getElementsByClassName('infordetail')

            var role_id = <?php echo $_SESSION['user']['role_id'] ?>

            if (role_id == 0) {
                // faculity_element.setAttributed
                faculity_element.disabled = true
            }
            for (i = 0; i < ele.length; i++) {
                ele[i].disabled = true
            }
        }
    </script>
    <script src="js/jquery-2.2.4.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/active.js"></script>
    <script src="js/slides.js"></script>
</body>

</html>