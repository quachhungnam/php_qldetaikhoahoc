<?php
header("Content-type: text/html; charset=utf-8"); //tieng viet
session_start();

$user_id = $_SESSION['user']['user_id'];
$topic_id = $_REQUEST['topicid'];

$sql = "SELECT * FROM topic where topic_id = '$topic_id'";
$sql2 = "SELECT * FROM user_register_topic
where topic_id = '$topic_id' and user_id ='$user_id'";

$connect = new mysqli("localhost", "root", "", "ttcnweb");
mysqli_set_charset($connect, 'UTF8');

$result = mysqli_query($connect, $sql);
$result2 = mysqli_query($connect, $sql2);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $arr['topic'] = array(
        'topic_id' => $row['topic_id'],
        'topic_name' => $row['topic_name'],
        'topic_abstract' => $row['topic_abstract'],
        'topic_intro' => $row['topic_intro'],
        'topic_content' => $row['topic_content'],
        'topic_conclude' => $row['topic_conclude'],
        'topic_status' => $row['topic_status'],
        'topic_teacher' => $row['topic_teacher'],
    );
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

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
                                    <li class="nav-item ">
                                        <a class="nav-link" href="./">Trang chủ</a>
                                    </li>
                                    <li class="nav-item dropdown active">
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
                                    <li class="nav-item dropdown" style="<?php echo $style ?>">
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
        <div class="container-topics">
            <div>
                <a href="managetopics.php">Danh sách đề tài</a><b> | </b>
                <?php if (!empty($_SESSION['user']) && ($_SESSION['user']['role_id'] == 1||$_SESSION['user']['role_id'] == 0)) { ?>
                    <a href="formaddtopic.php?topicid=">Thêm đề tài</a><b></b>
                <?php } ?>
            </div>
            <hr>
            <h4> <?php if (mysqli_num_rows($result) > 0) echo $arr['topic']['topic_name'] ?></h4>
            <hr>
            <div>
                <span><?php if (mysqli_num_rows($result) > 0) echo $arr['topic']['topic_abstract'] ?></span>
            </div>
            <hr>
            <div>
                <span><?php if (mysqli_num_rows($result) > 0) echo $arr['topic']['topic_intro'] ?></span>
            </div>
            <hr>
            <div>
                <span><?php if (mysqli_num_rows($result) > 0) echo $arr['topic']['topic_content'] ?></span>
            </div>
            <hr>
            <div>
                <span><?php if (mysqli_num_rows($result) > 0) echo $arr['topic']['topic_conclude'] ?></span>
            </div>
            <hr>
            <div>
                <?php
                if (!empty($_SESSION['user']) && $_SESSION['user']['role_id'] == 0) {
                    // echo '<button onclick="">Sửa</button>';
                    echo '<button onclick=' . 'location.href="formaddtopic.php?topicid=' . $topic_id . '">Sửa</button>';
                    echo '<button class="cancelbtn" onclick="delete_topic()">Xóa</button>';
                }
                if (!empty($_SESSION['user']) && $_SESSION['user']['role_id'] == 1 && $arr['topic']['topic_teacher'] == $user_id) {
                    // echo '<button onclick="">Sửa</button>';
                    echo '<button onclick=' . 'location.href="formaddtopic.php?topicid=' . $topic_id . '">Sửa</button>';
                    echo '<button class="cancelbtn" onclick="delete_topic()">Xóa</button>';
                }
                if (!empty($_SESSION['user']) && $_SESSION['user']['role_id'] == 2) {
                    if (mysqli_num_rows($result2) > 0) {
                        //neu co de tai thi huy
                        
                        echo '<button onclick="unreg_topic()" style="width:auto" name="unreg_topic">Hủy đăng ký</button>';
                    } else {
                        if ($arr['topic']['topic_status'] == 2) {
                            echo '<button onclick="reg_topic()" name="reg_topic">Đăng ký</button>';
                        }
                    }
                }
                ?>
                <button class="cancelbtn" onclick="window.history.go(-1);">Quay lại</button>

            </div>
        </div>

        <!--  -->

    </div>

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
        // function edit_topic() {
        //     location.href = "formaddtopic.php?topicid=<?php echo $topic_id ?>";
        // }
        // GV xoa de tai
        function delete_topic() {
            var is_delete = confirm("Bạn có muốn xóa đề tài này?");
            if (is_delete) {
                $.ajax({
                    type: "POST",
                    url: 'action_deletetopic.php',
                    data: {
                        action: 'deletetopic',
                        topicid: <?php echo $topic_id ?>,
                        userid: <?php echo $user_id ?>,
                    },
                    success: function() {
                        location.href = "managetopics.php?userid=<?php echo $user_id ?>"
                    }
                });
            }

        }
        //sinh vien dang ky de tai
        function reg_topic() {
            var is_reg = confirm("Bạn có muốn đăng ký đề tài này?");
            if (is_reg) {
                $.ajax({
                    type: "POST",
                    url: 'action_register.php',
                    data: {
                        action: 'reg_topic',
                        topicid: <?php echo $topic_id ?>,
                        userid: <?php echo $user_id ?>,
                    },
                    success: function() {
                        location.href = "topicdetail.php?topicid=<?php echo $topic_id ?>"
                    }
                });
            }

        }
        //sinh vien huy dang ky de tai
        function unreg_topic() {
            var is_unreg = confirm("Bạn có muốn hủy đăng ký đề tài này?");
            if (is_unreg) {
                $.ajax({
                    type: "POST",
                    url: 'action_register.php',
                    data: {
                        action: 'unreg_topic',
                        topicid: <?php echo $topic_id ?>,
                        userid: <?php echo $user_id ?>,
                    },
                    success: function() {
                        location.href = "topicdetail.php?topicid=<?php echo $topic_id ?>"
                    }
                });
            }

        }

        function enable_disable() {
            document.getElementById("btnchange").innerHTML = 'Lưu';
            var ele = document.getElementsByClassName('infordetail')
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

            $.ajax({
                type: "POST",
                url: 'action_updateinfor.php',
                data: {
                    action: 'changeinfor',
                    userid: <?php echo $user_id ?>,
                    fullname: fullname.value,
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