<?php

header("Content-type: text/html; charset=utf-8"); //tieng viet
session_start();
if (empty($_SESSION['user'])) {
    header('location:index.php');
}
if (!empty($_SESSION['user']) && $_SESSION['user']['role_id'] != 1 && $_SESSION['user']['role_id'] != 0) {
    header('location:index.php');
}
$user_id = $_SESSION['user']['user_id'];

if ($_REQUEST['topicid'] == null) {
    $topic_id = '';
}
if ($_REQUEST['topicid'] != null) {
    $topic_id = $_REQUEST['topicid'];
}

$connect = new mysqli("localhost", "root", "", "ttcnweb");
mysqli_set_charset($connect, 'UTF8');
//cac loai de tai
$sql = "SELECT * FROM topic_type";
//topic
$sql2 = "SELECT *
FROM topic 
WHERE topic_id='$topic_id'";
//trang thai topic
$sql3 = "SELECT * from topic_status";
$sql4="SELECT * from user
inner join user_infor on user.id=user_infor.user_id
where user.role_id = 1;
";


$result = mysqli_query($connect, $sql);
$result2 = mysqli_query($connect, $sql2);
$result3 = mysqli_query($connect, $sql3);
$result4 = mysqli_query($connect, $sql4);

if (mysqli_num_rows($result2) > 0) {
    $row = mysqli_fetch_assoc($result2);
    $topic = [
        'topic_name' => $row['topic_name'],
        'topic_type' => $row['topic_type'],
        'topic_description' => $row['topic_description'],
        'topic_abstract' => $row['topic_abstract'],
        'topic_intro' => $row['topic_intro'],
        'topic_content' => $row['topic_content'],
        'topic_conclude' => $row['topic_conclude'],
        'is_public' => $row['is_public'],
        'topic_status' => $row['topic_status'],
        'topic_teacher'=>$row['topic_teacher'],
    ];
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
        <div class="container-addtopic">

            <form action="action_updatetopic.php?topicid=<?php echo $topic_id ?>" method="post">
                <div>
                    <a href="managetopics.php">Danh sách đề tài</a>
                </div>
                <h2>
                    <?php
                    if ($_REQUEST['topicid'] == null) {
                        echo "Thêm đề tài";
                    } else {
                        echo "Sửa đề tài";
                    }

                    ?>

                </h2>
                <hr>
                <table>
                    <tbody>
                        <tr>
                            <td class="title-table"><b>Tên đề tài</b></td>
                            <td><textarea name="topic_name" required><?php if ($_REQUEST['topicid'] != null) echo $topic['topic_name'] ?></textarea></td>
                        </tr>
                        <tr>
                            <td class="title-table"><b>Loại đề tài</b></td>
                            <td>
                                <select name="topic_type">
                                    <?php
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $topic_type_id = $row['id'];
                                            $topic_type_name = $row['topic_type_name'];
                                            ?>
                                            <option value="<?php echo $topic_type_id ?>" <?php if ($_REQUEST['topicid'] != null && $topic['topic_type'] == $topic_type_id) echo 'selected' ?>>
                                                <?php echo $topic_type_name ?>
                                            </option>
                                    <?php }
                                    } ?>
                                </select>
                            </td>
                        </tr>
                        <!-- chon giao vien cho de tai-->
                        <?php
                            if ($_SESSION['user']['role_id'] == 0) {
                                ?>
                                <tr>
                                    <td class="title-table"><b>Giảng viên</b></td>
                                    <td>
                                        <select name="userid">
                                            <?php
                                                    if (mysqli_num_rows($result4) > 0) {
                                                        while ($row = mysqli_fetch_assoc($result4)) {
                                                            $topic_teacher_id = $row['id'];
                                                            $topic_teacher_name = $row['full_name'];
                                                            // $status_name = $row['name_status'];
                                                            if ($_SESSION['user']['role_id'] == 0) {
                                                                ?>
                                                        <option value="<?php echo $topic_teacher_id; ?>"  
                                                                <?php
                                                               
                                                                if($_REQUEST['topicid'] != null){
                                                                    if($topic_teacher_id==$topic['topic_teacher']){
                                                                        echo 'selected';
                                                                    }
                                                                }
                                                                ?>
                                                        >
                                                            <?php echo $topic_teacher_name ?>
                                                        </option>
                                            <?php       }
                                                        }
                                                    }
                                                    ?>
                                        </select>
                                    </td>
                                </tr>
                        <?php
                            }
                        
                        ?>

                        <!-- aksjdlasjdlas -->
                        <?php
                        if ($_REQUEST['topicid'] != null) {
                            if ($topic['topic_status'] != 1 || $_SESSION['user']['role_id'] == 0) {
                                ?>
                                <tr>
                                    <td class="title-table"><b>Trạng thái</b></td>
                                    <td>
                                        <select name="topic_status">
                                            <?php
                                                    if (mysqli_num_rows($result3) > 0) {
                                                        while ($row = mysqli_fetch_assoc($result3)) {
                                                            $status_id = $row['id'];
                                                            $status_name = $row['name_status'];
                                                            if ($status_id != 1 || $_SESSION['user']['role_id'] == 0) {
                                                                ?>
                                                        <option value="<?php echo $status_id ?>" <?php if ($status_id == $topic['topic_status']) echo "selected" ?>>
                                                            <?php echo $status_name ?>
                                                        </option>
                                            <?php       }
                                                        }
                                                    }
                                                    ?>
                                        </select>
                                    </td>
                                </tr>
                        <?php
                            }
                        }
                        ?>

                        <?php
                        if ($_REQUEST['topicid'] == null) {
                            if ($_SESSION['user']['role_id'] == 0) {
                                ?>
                                <tr>
                                    <td class="title-table"><b>Trạng thái</b></td>
                                    <td>
                                        <select name="topic_status">
                                            <?php
                                                    if (mysqli_num_rows($result3) > 0) {
                                                        while ($row = mysqli_fetch_assoc($result3)) {
                                                            $status_id = $row['id'];
                                                            $status_name = $row['name_status'];

                                                            ?>
                                                    <option value="<?php echo $status_id ?>">
                                                        <?php echo $status_name ?>
                                                    </option>
                                            <?php
                                                        }
                                                    }
                                                    ?>
                                        </select>
                                    </td>
                                </tr>
                        <?php
                            }
                        }
                        ?>

                        <tr>
                            <td class="title-table"><b>Mô tả</b></td>
                            <td> <textarea name="topic_description" rows="2"><?php if ($_REQUEST['topicid'] != null) echo $topic['topic_description'] ?></textarea></td>
                        </tr>
                        <tr>
                            <td class="title-table"><b>Abstract</b></td>
                            <td> <textarea name="topic_abstract" rows="2"><?php if ($_REQUEST['topicid'] != null) echo $topic['topic_abstract'] ?></textarea></td>
                        </tr>
                        <tr>
                            <td class="title-table"><b>Giới thiệu</b></td>
                            <td> <textarea name="topic_intro" rows="3"><?php if ($_REQUEST['topicid'] != null) echo $topic['topic_intro'] ?></textarea></td>
                        </tr>
                        <tr>
                            <td class="title-table"><b>Nội dung</b></td>
                            <td> <textarea name="topic_content" rows="5"><?php if ($_REQUEST['topicid'] != null) echo $topic['topic_content'] ?></textarea></td>
                        </tr>
                        <tr>
                            <td class="title-table"><b>Kết luận</b></td>
                            <td> <textarea name="topic_conclude" rows="3"><?php if ($_REQUEST['topicid'] != null) echo $topic['topic_conclude'] ?></textarea></td>
                        </tr>
                    </tbody>
                </table>
                <div>
                    <button type="submit" name="addtopic">
                        <?php if ($_REQUEST['topicid'] == null) {
                            echo "Thêm";
                        } else {
                            echo "Lưu";
                        }
                        ?>
                    </button>
                    <button type="button" class="cancelbtn" onclick="window.history.go(-1);">Hủy bỏ</button>
                </div>
            </form>
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

    <script src="js/jquery-2.2.4.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/active.js"></script>
    <script src="js/slides.js"></script>
</body>

</html>