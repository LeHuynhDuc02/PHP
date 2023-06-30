<?php 
       include("../connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Them GiaoVien</title>
    <link rel="stylesheet" type="text/css" href="../Style_Form.css">
</head>
<body>
    <div class="banner">
        <center><img class="img1" src="../../assets/img/logo.png"></center>
    </div>
    <h1 align="center">THÊM GIÁO VIÊN</h1>

    <center class="formthemAssignment">
        <form action="" method="post">
            <table cellpadding="10px" cellspacing="0" border="1">
                <tr>
                    <th>Mã giáo viên:</th>
                    <td><input type="text" name="magiaovien"></td>
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
                    <th>Tên giáo viên:</th>
                    <td><input type="text" name="tengiaovien"></td>
                </tr>
                <tr>
                    <th>Địa chỉ:</th>
                    <td><input type="text" name="diachi"></td>
                </tr>
                <tr>
                    <th>Số điện thoại:</th>
                    <td><input type="text" name="sodienthoai"></td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align:center;">
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
        if($_POST['magiaovien'] == null){
            echo "</br>Bạn Chưa Nhập Mã Giáo Viên";
        }
        else{
            $magiaovien=$_POST['magiaovien'];
        }
        if($_POST['mamonhoc'] == null){
            echo "</br> Bạn Chưa Nhập Mã Môn Học";
        }else{
            $mamonhoc=$_POST['mamonhoc'];
        }
        if($_POST['tengiaovien'] == null){
            echo "</br> Bạn Chưa Nhập Tên Giáo Viên";
        }else{
            $tengiaovien=$_POST['tengiaovien'];
        }
        if($_POST['diachi'] == null){
            echo "</br> Bạn Chưa Nhập Địa Chỉ";
        }else{
            $diachi=$_POST['diachi'];
        }
        if($_POST['sodienthoai']== null) {
            echo "</br> Bạn Chưa Nhập Số Điện Thoại";
        }
        else{
            $sodienthoai=$_POST['sodienthoai'];
        }
        if($magiaovien && $mamonhoc && $tengiaovien && $diachi && $sodienthoai){
            //include_once $_SERVER['DOCUMENT_ROOT'] . '/PROJECT_BTL/Admin/connect.php';
            //include "../connect.php";
            $sql = "INSERT INTO `giaovien` (`MaGV`, `MaMonHoc`, `TenGV`, `DiaChi`, `SDT`) values('$magiaovien','$mamonhoc', '$tengiaovien', '$diachi', '$sodienthoai')";
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
<center><a href="../index.php?mod=gv"><input type="button" value="Trở về"></a></center>
</body>
</html>

