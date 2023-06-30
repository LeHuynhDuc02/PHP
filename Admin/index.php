<?php 
    define('ROOT', dirname(__FILE__) );
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang quan ly</title>
    <link rel="stylesheet" type="text/css" href="Style.css">
</head>
<body>
    <!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
    <div class="banner">
        <center><img class="img1" src="../assets/img/logo.png"></center>
    </div>

    <div id="menu" align="center">
        <p class="p1" style="font-family:Tahoma;font-weight: bold;text-align: center;font-size: large">CHÀO MỪNG BẠN ĐẾN TRANG QUẢN TRỊ HỆ THỐNG</p>
        <p class="p1" style="font-family:Tahoma;font-weight: bold;text-align: center;font-size: large">TRƯỜNG THPT ỨNG HOÀ B</p>
            <ul>
            <li><a href="index.php?mod=hs">Quản Lý Học Sinh</a></li>
            <li><a href="index.php?mod=gv">Quản Lý Giáo Viên</a></li>
            <li><a href="index.php?mod=mh">Quản Lý Môn Học</a></li>
            <li><a href="index.php?mod=diem">Quản Lý Điểm</a></li>
        	<li><a href="index.php?mod=hk">Quản Lý Học Kỳ</a></li>
        	<li><a href="index.php?mod=lop">Quản Lý Lớp</a></li>
            <li><a href="index.php?mod=day">Quản Lý Lịch Dạy</a></li>
            <li><a href="index.php?mod=capnhat">Cập Nhật</a></li>
            <li><a href="index.php?mod=dangxuat">Đăng Xuất</a></li>
            </ul>
    </div>

    <div class="content">
       <?php
            include("mod.php");
        ?>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
    <br><br>
    <footer>Copyright &copy; HaUI 2023 Nhóm 10 PHP (Quang - Đức - Kiều)</footer>
    <br>         
</body>
</html>