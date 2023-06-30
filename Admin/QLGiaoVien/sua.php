<?php 
       include("../connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sua GiaoVien</title>
    <link rel="stylesheet" type="text/css" href="../Style_Form.css">
</head>
<body>
    <div class="banner">
        <center><img class="img1" src="../../assets/img/logo.png"></center>
    </div>
    <h1 align="center">SỬA GIÁO VIÊN</h1>

    <?php
        $sql1 = "SELECT * FROM giaovien where MaGV = '$_GET[Ma]'";
        $result = mysqli_query($conn, $sql1);
        while($row = mysqli_fetch_assoc($result)){
            $mmh = $row['MaMonHoc'];
            $tgv = $row['TenGV'];
            $dc = $row['DiaChi'];
            $sdt = $row['SDT'];
        }
        
    ?>
    <center class="formthemAssignment">
        <form action="" method="post">
            <table cellpadding="10px" cellspacing="0" border="1">
                <tr>
                    <th>Mã giáo viên:</th>
                    <td><input type="text" name="magiaovien" value="<?=$_GET['Ma']?>" disabled></td>
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
                    <th>Tên giáo viên:</th>
                    <td><input type="text" name="tengiaovien" value="<?=$tgv?>"></td>
                </tr>
                <tr>
                    <th>Địa chỉ:</th>
                    <td><input type="text" name="diachi" value="<?=$dc?>"></td>
                </tr>
                <tr>
                    <th>Số điện thoại:</th>
                    <td><input type="text" name="sodienthoai" value="<?=$sdt?>"></td>
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
        if($mamonhoc && $tengiaovien && $diachi && $sodienthoai){
            //include_once $_SERVER['DOCUMENT_ROOT'] . '/PROJECT_BTL/Admin/connect.php';
            //include "../connect.php";
            $_POST['sua'] = null;
            $sql = "UPDATE giaovien set MaMonHoc = '$mamonhoc', TenGV='$tengiaovien', DiaChi='$diachi', SDT='$sodienthoai'
                    where MaGV='$_GET[Ma]'";
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
<center><a href="../index.php?mod=gv"><input type="button" value="Trở về"></a></center>
</body>
</html>
