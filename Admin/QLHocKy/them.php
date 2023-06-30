<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HienThiHocKy</title>
    <link rel="stylesheet" type="text/css" href="../Style_Form.css">
</head>
<body>
    <!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
    <div class="banner">
        <center><img class="img1" src="../../assets/img/logo.png"></center>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

    <h1 align="center">THÊM HỌC KỲ MỚI</h1>

<center class="formthemhocky">
    <form action="" method="post">
        <table cellpadding="10px" cellspacing="0" border="1">
            <tr>
                <th>Mã học kỳ:</th>
                <td><input type="text" name="mahocky"></td>
            </tr>
            <tr>
                <th>Tên học kỳ:</th>
                <td>
                    <select name="tenhocky" id="">
                        <option value="Học kỳ 1">Học kỳ 1</option>
                        <option value="Học kỳ 2">Học kỳ 2</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th>Hệ số học kỳ:</th>
                <td><input type="text" name="hesohocky"></td>
            </tr>
            <tr>
                <th>Năm học:</th>
                <td><input type="text" name="namhoc"></td>
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
    if($_POST['mahocky'] == null){
        echo "</br>Bạn Chưa Nhập Mã HỌc Kỳ";
    }
    else{
        $mahocky=$_POST['mahocky'];
    }
    if($_POST['tenhocky'] == null){
        echo "</br> Bạn Chưa Nhập Tên Học Kỳ";
    }else{
        $tenhocky=$_POST['tenhocky'];
    }
    if($_POST['hesohocky'] == null){
        echo "</br> Bạn Chưa Nhập Hệ Số Học Kỳ";
    }else{
        $hesohocky=$_POST['hesohocky'];
    }
    if($_POST['namhoc'] == null){
        echo "</br> Bạn Chưa Nhập Năm Học";
    }else{
        $namhoc=$_POST['namhoc'];
    }
    
    if($mahocky && $tenhocky && $hesohocky && $namhoc){
        //include_once $_SERVER['DOCUMENT_ROOT'] . '/PROJECT_BTL/Admin/connect.php';
        include "../connect.php";
        $_POST['them']=null;
        $sql = "INSERT INTO `hocky` (`MaHocKy`, `TenHocKy`, `HeSoHK`, `NamHoc`) values('$mahocky','$tenhocky', '$hesohocky', '$namhoc')";
        mysqli_query($conn, $sql);
?>
        <script type="text/javascript">
            alert("Bạn Đã Thêm THÀNH CÔNG. Nhấn OK Để Tiếp Tục !");
        </script>

<?php
        // header("location: ../index.php?mod=hk");
    }
}
?>
<br>
<center><a href="../index.php?mod=hk"><input type="button" value="Trở về"></a></center>
</body>
</html>