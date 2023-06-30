<?php 
       include("../connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Them Assignment</title>
    <link rel="stylesheet" type="text/css" href="../Style_Form.css">
</head>
<body>
    <div class="banner">
        <center><img class="img1" src="../../assets/img/logo.png"></center>
    </div>
    <h1 align="center">THÊM MỚI LỊCH DẠY</h1>

    <center class="formthemAssignment">
        <form action="" method="post">
            <table cellpadding="10px" cellspacing="0" border="1">
                <tr>
                    <th>Mã phân công:</th>
                    <td><input type="text" name="maphancong"></td>
                </tr>
                <tr>
                    <th>Mã môn học:</th>
                    <td>
                        <select name="mamonhoc" id="">
                        <?php
                        $sql = "SELECT MaMonHoc FROM monhoc";
                        $rs = mysqli_query($conn, $sql);
                        while($r = mysqli_fetch_assoc($rs)){
                            ?>
                        <option value="<?=$r['MaMonHoc']?>"><?=$r['MaMonHoc']?></option>
                        <?php
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <th>Mã giáo viên:</th>
                    <td>
                        <select name="magiaovien" id="">
                            <?php
                            $sql = "SELECT MaGV FROM giaovien";
                            $rs = mysqli_query($conn, $sql);
                            while($r = mysqli_fetch_assoc($rs)){
                                ?>
                            <option value="<?=$r['MaGV']?>"><?=$r['MaGV']?></option>
                            <?php
                            }
                            ?>
                    </td>
                </tr>
                <tr>
                    <th>Mã lớp học:</th>
                    <td>
                        <select name="malophoc" id="">
                            <?php
                            $sql = "SELECT MaLopHoc FROM lophoc";
                            $rs = mysqli_query($conn, $sql);
                            while($r = mysqli_fetch_assoc($rs)){
                                ?>
                            <option value="<?=$r['MaLopHoc']?>"><?=$r['MaLopHoc']?></option>
                            <?php
                            }
                            ?>
                    </td>
                </tr>
                <tr>
                    <th>Mã học kỳ:</th>
                    <td>
                        <select name="mahocky" id="">
                            <?php
                            $sql = "SELECT MaHocKy FROM hocky";
                            $rs = mysqli_query($conn, $sql);
                            while($r = mysqli_fetch_assoc($rs)){
                                ?>
                            <option value="<?=$r['MaHocKy']?>?>"><?=$r['MaHocKy']?></option>
                            <?php
                            }
                            ?>
                    </td>
                </tr>
                <tr>
                    <th>Mô tả:</th>
                    <td><input type="text" name="mota"></td>
                </tr>
                <tr>
                    <th>Trạng thái:</th>
                    <td>
                        <select name="trangthai" id="">
                            <option value="0">0</option>
                            <option value="1">1</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center;">
                        <input type="submit" name="them" value="Thêm">
                        <span>&nbsp; &nbsp;</span>
                        <input type="reset" name="reset" value="Reset">
                    </td>
                    
                </tr>
            </table>
        </form>
    </center>

    <?php
    if(isset($_POST['them']))
    {
        if($_POST['maphancong'] == null){
            echo "</br>Bạn Chưa Nhập Mã Phân Công";
        }
        else{
            $maphancong=$_POST['maphancong'];
        }
        if($_POST['mamonhoc'] == null){
            echo "</br> Bạn Chưa Nhập Mã Môn Học";
        }else{
            $mamonhoc=$_POST['mamonhoc'];
        }
        if($_POST['magiaovien'] == null){
            echo "</br> Bạn Chưa Nhập Mã Giáo Viên";
        }else{
            $magiaovien=$_POST['magiaovien'];
        }
        if($_POST['malophoc'] == null){
            echo "</br> Bạn Chưa Nhập Mã Lớp Học";
        }else{
            $malophoc=$_POST['malophoc'];
        }
        if($_POST['mahocky']== null) {
            echo "</br> Bạn Chưa Nhập Mã Học Kỳ";
        }
        else{
            $mahocky=$_POST['mahocky'];
        }
        if($_POST['mota']==null)
        {
            echo "</br> Bạn chưa nhập Mô tả";
        }
        else
        {
            $mota=$_POST['mota'];
        }
        if($_POST['trangthai']==null)
        {
            echo "</br> Bạn chưa nhập Mô tả";
        }
        else
        {
            $trangthai=$_POST['trangthai'];
        }
        if($maphancong && $mamonhoc && $magiaovien && $malophoc && $mahocky && $mota && $trangthai){
            //include_once $_SERVER['DOCUMENT_ROOT'] . '/PROJECT_BTL/Admin/connect.php';
            //include "../connect.php";
            $_POST['them']=null;
            $sql = "INSERT INTO `assignment` (`MaPhanCong`, `MaMonHoc`, `MaGV`, `MaLopHoc`, `MaHocKy`, `MoTaPhanCong`, `TrangThai`) 
                   VALUES('$maphancong','$mamonhoc', '$magiaovien', '$malophoc', '$mahocky', '$mota', '$trangthai')";
            mysqli_query($conn, $sql);
            ?>
            <script type="text/javascript">
                alert("Bạn Đã Thêm Mới Thành Công. Nhấn OK Để Tiếp Tục !");
            </script>
           
            <?php
        }
    }
?>
<br>
<center><a href="../index.php?mod=day"><input type="button" value="Trở về"></a></center>
</body>
</html>

