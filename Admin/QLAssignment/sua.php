<?php 
       include("../connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Assignment</title>
    <link rel="stylesheet" type="text/css" href="../Style_Form.css">
</head>
<body>
    <div class="banner">
        <center><img class="img1" src="../../assets/img/logo.png"></center>
    </div>
    <h1 align="center">SỬA LỊCH DẠY</h1>

    <?php
        $sql1 = "SELECT * FROM assignment where MaPhanCong = '$_GET[Ma]'";
        $result = mysqli_query($conn, $sql1);
        while($row = mysqli_fetch_assoc($result)){
            $mmh = $row['MaMonHoc'];
            $mgv = $row['MaGV'];
            $mlh = $row['MaLopHoc'];
            $mhk = $row['MaHocKy'];
            $mt = $row['MoTaPhanCong'];
            $tt = $row['TrangThai'];
        }
        
    ?>
    <center class="formthemAssignment">
        <form action="" method="post">
            <table cellpadding="10px" cellspacing="0" border="1">
                <tr>
                    <th>Mã phân công:</th>
                    <td><input type="text" name="maphancong" value="<?=$_GET['Ma']?>" disabled></td>
                </tr>
                <tr>
                    <th>Mã môn học:</th>
                    <td>
                        <select name="mamonhoc" id="">
                        <?php
                        $sql = "SELECT MaMonHoc, TenMonHoc FROM monhoc";
                        $rs = mysqli_query($conn, $sql);
                        while($r = mysqli_fetch_assoc($rs)){
                            if($r['MaMonHoc']==$mmh)
                            {
                        ?>
                                <option value="<?=$r['MaMonHoc']?>" selected><?=$r['MaMonHoc']?></option>
                        <?php
                            } else {
                        ?>
                                <option value="<?=$r['MaMonHoc']?>"><?=$r['MaMonHoc']?></option>
                        <?php
                            }
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
                                if($r['MaGV']==$mgv)
                            {
                        ?>
                                <option value="<?=$r['MaGV']?>" selected><?=$r['MaGV']?></option>
                        <?php
                            } else {
                        ?>
                                <option value="<?=$r['MaGV']?>"><?=$r['MaGV']?></option>
                        <?php
                            }
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
                                if($r['MaLopHoc']==$mlh)
                                {
                        ?>
                                    <option value="<?=$r['MaLopHoc']?>" selected><?=$r['MaLopHoc']?></option>
                        <?php
                            } else {
                        ?>
                                <option value="<?=$r['MaLopHoc']?>"><?=$r['MaLopHoc']?></option>
                        <?php
                            }
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
                                if($r['MaHocKy']==$mhk)
                                {
                        ?>
                                    <option value="<?=$r['MaHocKy']?>" selected><?=$r['MaHocKy']?></option>
                        <?php
                            } else {
                        ?>
                                <option value="<?=$r['MaHocKy']?>"><?=$r['MaHocKy']?></option>
                        <?php
                            }
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <th>Mô tả:</th>
                    <td><input type="text" name="mota" value="<?=$mt?>"></td>
                </tr>
                <tr>
                    <th>Trạng thái:</th>
                    <td>
                        <select name="trangthai" id="">
                        <?php
                            $sql = "SELECT DISTINCT TrangThai FROM assignment";
                            $rs = mysqli_query($conn, $sql);
                            while($r = mysqli_fetch_assoc($rs)){
                                if($r['TrangThai']==$tt)
                                {
                        ?>
                                    <option value="<?=$r['TrangThai']?>" selected><?=$r['TrangThai']?></option>
                        <?php
                            } else {
                        ?>
                                <option value="<?=$r['TrangThai']?>"><?=$r['TrangThai']?></option>
                        <?php
                            }
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center;">
                        <input type="submit" name="sua" value="Sửa">
                    </td>
                    
                </tr>
            </table>
        </form>
    </center>
    
    <?php
    if(isset($_POST['sua']))
    {
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
            echo "</br> Bạn Chưa Nhập Mô Tả";
        }
        else
        {
            $mota=$_POST['mota'];
        }
        if($_POST['trangthai']==null)
        {
            echo "</br> Bạn Chưa Nhập Trạng Thái";
        }
        else
        {
            $trangthai=$_POST['trangthai'];
        }
        if($mamonhoc && $magiaovien && $malophoc && $mahocky && $mota &&$trangthai){
            //include_once $_SERVER['DOCUMENT_ROOT'] . '/PROJECT_BTL/Admin/connect.php';
            //include "../connect.php";
            $_POST['sua'] = null;
            $sql = "UPDATE assignment set MaMonHoc='$mamonhoc', MaGV='$magiaovien', MaLopHoc='$malophoc',
            MaHocKy='$mahocky', MoTaPhanCong='$mota', TrangThai='$trangthai' where MaPhanCong='$_GET[Ma]'";
            mysqli_query($conn, $sql);
            ?>
            <script type="text/javascript">
                alert("Bạn Đã Sửa Thành Công. Nhấn OK Để Tiếp Tục !");
            </script>
           
            <?php
        }
    }
?>
<br>
<center><a href="../index.php?mod=day"><input type="button" value="Trở về"></a></center>
</body>
</html>
