<?php
header("Content-type: text/html; charset=utf-8"); //tieng viet
session_start();
if (empty($_SESSION['user'])) {
    header('location:index.php');
}
if ($_SESSION['user']['role_id'] != 0) {
    header('location:index.php');
}

$sql = "SELECT * from user
inner join user_infor on user.id=user_infor.user_id
inner join faculity on user_infor.faculity = faculity.id
where user.role_id!=0
";

//neu bang null thi set no bang all
$filter_username = !empty($_REQUEST['username']) ? $_REQUEST['username'] : "";
$filter_fullname = !empty($_REQUEST['filter2']) ? $_REQUEST['filter2'] : '';
$filter_faculity = !empty($_REQUEST['filter3']) ? $_REQUEST['filter3'] : '';
$filter_address = !empty($_REQUEST['filter4']) ? $_REQUEST['filter4'] : '';
$filter_phone_number = !empty($_REQUEST['filter5']) ? $_REQUEST['filter5'] : '';

// $filusername = " and year(topic.topic_datecreate) = '$filter_time'";
$filusername = ($filter_username != "") ? " and user.username like '%$filter_username%'" : "";
$filfullname = ($filter_fullname != "") ? " and user_infor.full_name like '%$filter_fullname%'" : "";
$filfaculity = ($filter_faculity != "") ? " and user_infor.faculity ='$filter_faculity'" : "";
$filaddress = ($filter_address != "") ? " and user_infor.address like '%$filter_address%'" : "";
$filphonenumber = ($filter_phone_number != "") ? " and user_infor.phone_number like '%$filter_phone_number%'" : "";
$orderdesc = " order by username,full_name";

$sql = $sql . $filusername . $filfullname . $filfaculity . $filaddress . $filphonenumber . $orderdesc;
// die($sql);
$sql_faculity = "SELECT * from faculity";


$connect = new mysqli("localhost", "root", "", "ttcnweb");
if ($connect->error) {
    die("Lỗi kết nối cơ sở dữ liệu!");
}
mysqli_set_charset($connect, 'UTF8');
$result = mysqli_query($connect, $sql);
$result_faculity = mysqli_query($connect, $sql_faculity);

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
                    echo '<button style="width:150px" onclick=' . 'location.href="formaddaccount.php"' . '>Thêm tài khoản</button>';
                }

                ?>
                <!-- <input placeholder="Tìm kiếm đề tài" style="width:20%;float:right;margin-top:20px;" type="search"> -->
            </div>
            <table>
                <thead>
                    <!-- loc de tai -->
                    <tr>
                        <td>Tat ca</td>
                        <td>
                            <input name="username" id="filter_username" type="text" value="<?php echo $filter_username ?>">
                        </td>
                        <td>
                            <input name="fullname" id="filter_fullname" type="text" value="<?php echo $filter_fullname ?>">
                        </td>
                        <td>

                        </td>
                        <td>


                            <select style="width:80%" name="faculity" id="filter_faculity">
                                <option value="">Tất cả</option>
                                <?php
                                if (mysqli_num_rows($result_faculity) > 0) {
                                    while ($row = mysqli_fetch_assoc($result_faculity)) {
                                        ?>
                                        <option value="<?php echo $row['id'] ?>" <?php if ($filter_faculity == $row['id']) echo 'selected' ?>><?php echo $row['faculity_name'] ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </td>
                        <td>
                            <input name="address" id="filter_address" type="text" value="<?php echo $filter_address ?>">
                        </td>
                        <td>
                            <input name="phone_number" id="filter_phone_number" type="text" value="<?php echo $filter_phone_number ?>">
                        </td>
                        <td><button class="buttonA" onclick="filterUser()">Lọc</button></td>
                    </tr>


                    <tr>
                        <th>STT</th>
                        <th>Tên tài khoản</th>
                        <th class="type-topic">Họ tên</th>
                        <th style="width:8%">Sinh nhật</th>
                        <th style="width:12%">Khoa</th>
                        <th>Địa chỉ</th>
                        <th>SDT</th>
                        <th style="width:4%">Trạng thái</th>
                    </tr>
                </thead>

                <tbody id="txtHint">
                    <?php
                    if (mysqli_num_rows($result) > 0) {
                        $stt = 1;
                        while ($row = mysqli_fetch_assoc($result)) {
                            $user = [
                                'id' => $row['user_id'],
                                'username' => $row['username'],
                                'full_name' => $row['full_name'],
                                'birthday' => $row['birthday'],
                                'faculity' => $row['faculity_name'],
                                'address' => $row['address'],
                                'phone_number' => $row['phone_number'],
                                'deleted' => $row['deleted'],
                            ];
                            // die($user['deleted2'] );
                            // $date = date_create($row['topic_datecreate']);
                            // $topic_datecreate = date_format($date, "d/m/Y");
                            ?>
                            <tr>
                                <td class="stt"><?php echo $stt ?></td>
                                <td> <a href="myinfor.php?userid=<?php echo $user['id'] ?>"><?php echo $user['username'] ?></a>
                                </td>
                                <td><?php echo $user['full_name'] ?></td>
                                <td><?php echo $user['birthday'] ?></td>
                                <td><?php echo $user['faculity'] ?></td>
                                <td><?php echo $user['address'] ?></td>
                                <td><?php echo $user['phone_number'] ?></td>
                                <td><?php if ($user['deleted'] == 0) {
                                                echo 'Kích hoạt';
                                            } else {
                                                echo 'Đã khóa';
                                            }  ?></td>

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
        function filterUser() {
            // alert('bat dau loc du lieuu');
            var x1 = document.getElementById('filter_username').value
            var x2 = document.getElementById('filter_fullname').value
            var x3 = document.getElementById('filter_faculity').value
            var x4 = document.getElementById('filter_address').value
            var x5 = document.getElementById('filter_phone_number').value
            // alert(x1 + x2 + x3 + x4);
            location.href = "manageaccount.php?username=" + x1 + "&filter2=" + x2 + "&filter3=" + x3 + "&filter4=" + x4 + "&filter5=" + x5;
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