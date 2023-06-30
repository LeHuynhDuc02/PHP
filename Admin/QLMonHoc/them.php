<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Them Mon Hoc</title>
    <link rel="stylesheet" type="text/css" href="../Style_Form.css">
</head>
<body>
    <!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
    <div class="banner">
        <center><img class="img1" src="../../assets/img/logo.png"></center>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

    <h1 align="center">THÊM MÔN HỌC</h1>

<center class="formthemMonHoc">
    <form action="" method="post">
        <table cellpadding="10px" cellspacing="0" border="1">
            <tr>
                <th>Mã môn học:</th>
                <td><input type="text" name="mamonhoc"></td>
            </tr>
            <tr>
                <th>Tên môn học:</th>
                <td><input type="text" name="tenmonhoc"></td>
            </tr>
            <tr>
                <th>Số tiết:</th>
                <td><input type="text" name="sotiet"></td>
            </tr>
            <tr>
                <th>Hệ số:</th>
                <td><input type="text" name="hesomonhoc"></td>
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
    if($_POST['mamonhoc'] == null){
        echo "</br>Bạn Chưa Nhập Mã Môn Học";
    }
    else{
        $mamonhoc=$_POST['mamonhoc'];
    }
    if($_POST['tenmonhoc'] == null){
        echo "</br> Bạn Chưa Nhập Tên Môn Học";
    }else{
        $tenmonhoc=$_POST['tenmonhoc'];
    }
    if($_POST['sotiet'] == null){
        echo "</br> Bạn Chưa Nhập Số Tiết Học";
    }else{
        $sotiet=$_POST['sotiet'];
    }
    if($_POST['hesomonhoc'] == null){
        echo "</br> Bạn Chưa Nhập Hệ Số Môn Học";
    }else{
        $hesomonhoc=$_POST['hesomonhoc'];
    }

    if($mamonhoc && $tenmonhoc && $sotiet && $hesomonhoc){
        //include_once $_SERVER['DOCUMENT_ROOT'] . '/PROJECT_BTL/Admin/connect.php';
        include "../connect.php";
        $_POST['them']=null;
        $sql = "INSERT INTO monhoc values('$mamonhoc','$tenmonhoc', '$sotiet', '$hesomonhoc')";
        mysqli_query($conn, $sql);
?>
        <script type="text/javascript">
            alert("Bạn Đã Thêm LỚP HỌC THÀNH CÔNG. Nhấn OK Để Tiếp Tục !");
        </script>

<?php
        // header("location: ../index.php?mod=lop");
    }
}
?>
<br>
<center><a href="../index.php?mod=mh"><input type="button" value="Trở về"></a></center>
</body>
</html>