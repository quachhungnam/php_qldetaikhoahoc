<?php
header("Content-type: text/html; charset=utf-8"); //tieng viet
session_start();
if (!empty($_SESSION['user'])) {
    //bien usserid gui len
    $user_id = $_SESSION['user']['user_id'];
}

$sql = "SELECT *
FROM topic 
inner join topic_type on topic.topic_type=topic_type.id
inner join user_infor on topic.topic_teacher=user_infor.user_id
inner join topic_status on topic.topic_status = topic_status.id ";

//neu bang null thi set no bang all
$filter_who = isset($_REQUEST['userid']) ? $_REQUEST['userid'] : "all";
$filter_type = isset($_REQUEST['filter2']) ? $_REQUEST['filter2'] : 'all';
$filter_time = isset($_REQUEST['filter3']) ? $_REQUEST['filter3'] : 'all';
$filter_status = isset($_REQUEST['filter4']) ? $_REQUEST['filter4'] : 'all';

// $filtime = " and year(topic.topic_datecreate) = '$filter_time'";
$filtype = ($filter_type != "all") ? " and topic.topic_type = '$filter_type'" : "";
$filtime = ($filter_time != "all") ? " and year(topic.topic_datecreate) = '$filter_time'" : "";
$filstatus = ($filter_status != "all") ? " and topic.topic_status = '$filter_status'" : "";
$orderdesc = " order by topic.topic_datecreate desc";


if (empty($_SESSION['user'])) {
    $sql = $sql . $filtype . $filtime . $filstatus . $orderdesc;
}
if (!empty($_SESSION['user']) &&( $_SESSION['user']['role_id'] == 1 || $_SESSION['user']['role_id'] == 0)) {
    $where_teacher = " and topic.topic_teacher='$user_id' ";
    if ($filter_who != 'all' && $_SESSION['user']['role_id'] == 1) {
        $sql = $sql . $where_teacher;
    }
    $sql = $sql . $filtype . $filtime . $filstatus . $orderdesc;
} else if (!empty($_SESSION['user']) && $_SESSION['user']['role_id'] == 2) {
    $join_register = "inner join user_register_topic on user_register_topic.topic_id=topic.topic_id ";

    $where_student = "and user_register_topic.user_id='$user_id'";
    if ($filter_who != 'all') {
        $sql = $sql . $join_register;
        $sql = $sql . $where_student;
    }
    $sql = $sql . $filtype . $filtime . $filstatus . $orderdesc;
}

// die($sql);
$connect = new mysqli("localhost", "root", "", "ttcnweb");
if ($connect->error) {
    die("Lỗi kết nối cơ sở dữ liệu!");
}

$sql2 = "SELECT * FROM topic_type";
$result2 = mysqli_query($connect, $sql2);

$sql3 = "SELECT DISTINCT (topic.topic_datecreate)  FROM topic";
$result3 = mysqli_query($connect, $sql3);

mysqli_set_charset($connect, 'UTF8');
$result = mysqli_query($connect, $sql);

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
    <style>

    </style>
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
                                    <li class="nav-item dropdown active">
                                        <a class="nav-link dropdown-toggle " href="#" id="moshDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">NCKH</a>
                                        <div class="dropdown-menu" aria-labelledby="moshDropdown">
                                            <a class="dropdown-item" href="managetopics.php">Danh sách các đề tài</a>
                                            <a class="dropdown-item" href="articles.php">Bài báo quốc tế</a>
                                            <a class="dropdown-item" href="statistics.php">Thống kê đề tài NCKH</a>
                                            <a class="dropdown-item" href="http://tapchikhcn.udn.vn">Tạp chí KHCN</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="documents.php">Văn bản pháp quy</a>

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
                                            <a class="dropdown-item" href="myinfor.php?userid=<?php if (!empty($_SESSION['user'])) echo $_SESSION['user']['user_id'] ?>">Thông
                                                tin cá nhân</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="changepassword.php?userid=<?php if (!empty($_SESSION['user'])) echo $_SESSION['user']['user_id'] ?>">Đổi
                                                mật khẩu</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="managetopics.php?userid=<?php if (!empty($_SESSION['user']))  echo $_SESSION['user']['user_id'] ?>">Quản
                                                lý đề tài</a>
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
                <?php if (!empty($_SESSION['user']) && ($_SESSION['user']['role_id'] == 1 || $_SESSION['user']['role_id'] == 0)) {
                    echo '<button style="width:150px" onclick=' . 'location.href="formaddtopic.php?topicid="' . '>Thêm đề tài</button>';
                }
                ?>
                <?php if (!empty($_SESSION['user']) && ($_SESSION['user']['role_id'] == 0)) {
                    echo '<button style="width:150px" onclick=' . 'location.href="formaddtopictype.php"' . '>Thêm loại</button>';
                }
                ?>
                <!-- <input placeholder="Tìm kiếm đề tài" style="width:20%;float:right;margin-top:20px;" type="search"> -->
            </div>
            <table>
                <thead>
                    <!-- loc de tai -->
                    <tr>
                        <td></td>
                        <td>
                            <select name="filter_who" id="filter_who" onchange="showTopic(this.value)">
                                <?php if (!empty($_SESSION['user'])) { ?>
                                    <option value="<?php if (!empty($_SESSION['user'])) echo $user_id ?>" <?php if ($filter_who == 1) echo "selected" ?>>Đề tài của bạn</option>
                                <?php } ?>
                                <option value="all" <?php if ($filter_who == "all") echo "selected" ?>>Tất cả đề tài</option>
                            </select>
                        </td>
                        <td>
                            <select name="filter_type" id="filter_type" onchange="showTopic(this.value)">
                                <option value="all">Tất cả loại đề tài</option>
                                <?php
                                if (mysqli_num_rows($result2) > 0) {
                                    while ($row = mysqli_fetch_assoc($result2)) {
                                        $topic_type_id = $row['id'];
                                        $topic_type_name = $row['topic_type_name'];
                                        ?>
                                        <option value="<?php echo $topic_type_id ?>" <?php if ($filter_type == $topic_type_id) echo 'selected' ?>>
                                            <?php echo $topic_type_name ?>
                                        </option>
                                <?php }
                                } ?>
                            </select>
                        </td>
                        <td>

                        </td>
                        <td></td>
                        <td>
                            <select name="filter_time" id="filter_time" onchange="showTopic(this.value)">
                                <option value="all">Tất cả</option>
                                <option value="2019" <?php if ($filter_time == 2019) echo 'selected' ?>>2019</option>
                                <option value="2018" <?php if ($filter_time == 2018) echo 'selected' ?>>2018</option>
                                <option value="2017" <?php if ($filter_time == 2017) echo 'selected' ?>>2017</option>
                                <option value="2016" <?php if ($filter_time == 2016) echo 'selected' ?>>2016</option>
                            </select>
                        </td>
                        <td>
                            <select name="filter_status" id="filter_status" onchange="showTopic(this.value)">
                                <option value="all" <?php if ($filter_status == 'all') echo 'selected' ?>>Tất cả</option>
                                <option value="1" <?php if ($filter_status == 1) echo 'selected' ?>>Đang chờ phê duyệt</option>
                                <option value="2" <?php if ($filter_status == 2) echo 'selected' ?>>Đang chờ đăng ký</option>
                                <option value="3" <?php if ($filter_status == 3) echo 'selected' ?>>Đang thực hiện</option>
                                <option value="4" <?php if ($filter_status == 4) echo 'selected' ?>>Đã hoàn thành</option>
                            </select>
                        </td>
                        <td><button class="buttonA" onclick="filterTopic()">Lọc</button></td>
                    </tr>

                    <tr>
                        <th>STT</th>
                        <th>Tên đề tài</th>
                        <th class="type-topic">Loại đề tài</th>
                        <th>Mô tả đề tài</th>
                        <th style="width:10%">Giảng viên</th>
                        <th>Ngày tạo</th>
                        <th style="width:4%">Trạng thái</th>
                        <th style="width:4%">Danh sách</th>
                    </tr>
                </thead>

                <tbody id="txtHint">
                    <?php
                    if (mysqli_num_rows($result) > 0) {
                        $stt = 1;
                        while ($row = mysqli_fetch_assoc($result)) {
                            $topic_id = $row['topic_id'];
                            $topic_name = $row['topic_name'];
                            $topic_type = $row['topic_type_name'];
                            $topic_description = $row['topic_description'];
                            $topic_teacher_name = $row['full_name'];
                            $topic_status = $row['name_status'];
                            $date = date_create($row['topic_datecreate']);
                            $topic_datecreate = date_format($date, "d/m/Y");
                            ?>
                            <tr>
                                <td class="stt"><?php echo $stt ?></td>
                                <td> <a href="topicdetail.php?topicid=<?php echo $topic_id ?>"><?php echo $topic_name ?></a>
                                </td>
                                <td><?php echo $topic_type ?></td>
                                <td><?php echo $topic_description ?></td>
                                <td> <a href="myinfor.php?userid=<?php echo $row['topic_teacher']; ?>"><?php echo $topic_teacher_name ?></a> </td>
                                <td><?php echo $topic_datecreate ?></td>
                                <td><?php echo $topic_status ?></td>
                                <td><a href="liststudent.php?topicid=<?php echo  $topic_id ?>"><?php echo "..." ?></a> </td>
                            </tr>
                    <?php
                            $stt++;
                        }
                    } else { }
                    $connect->close();
                    ?>
                </tbody>
            </table>
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
        function filterTopic() {
            // alert('bat dau loc du lieuu');
            var x1 = document.getElementById('filter_who').value
            var x2 = document.getElementById('filter_type').value
            var x3 = document.getElementById('filter_time').value
            var x4 = document.getElementById('filter_status').value
            // alert(x1 + x2 + x3 + x4);
            location.href = "managetopics.php?userid=" + x1 + "&filter2=" + x2 + "&filter3=" + x3 + "&filter4=" + x4;
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