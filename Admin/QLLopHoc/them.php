<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Them Lop Hoc</title>
    <link rel="stylesheet" type="text/css" href="../Style_Form.css">
</head>
<body>
    <!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
    <div class="banner">
        <center><img class="img1" src="../../assets/img/logo.png"> </center>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

    <h1 align="center">THÊM LỚP HỌC MỚI</h1>

<center class="formthemLopHoc">
    <form action="" method="post">
        <table cellpadding="10px" cellspacing="0" border="1">
            <tr>
                <th>Mã lớp học:</th>
                <td><input type="text" name="malophoc"></td>
            </tr>
            <tr>
                <th>Tên lớp học:</th>
                <td><input type="text" name="tenlophoc"></td>
            </tr>
            <tr>
                <th>Khối học:</th>
                <td>
                    <select name="khoihoc" id="">
                        <option value="10">Khối 10</option>
                        <option value="11">Khối 11</option>
                        <option value="12">Khối 12</option>
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
    if($_POST['malophoc'] == null){
        echo "</br>Bạn Chưa Nhập Mã Lớp Học";
    }
    else{
        $malophoc=$_POST['malophoc'];
    }
    if($_POST['tenlophoc'] == null){
        echo "</br> Bạn Chưa Nhập Tên Lớp Học";
    }else{
        $tenlophoc=$_POST['tenlophoc'];
    }
    if($_POST['khoihoc'] == null){
        echo "</br> Bạn Chưa Nhập Khối Học";
    }else{
        $khoihoc=$_POST['khoihoc'];
    }
    
    if($malophoc && $tenlophoc && $khoihoc){
        //include_once $_SERVER['DOCUMENT_ROOT'] . '/PROJECT_BTL/Admin/connect.php';
        include "../connect.php";
        $_POST['them']=null;
        $sql = "INSERT INTO lophoc values('$malophoc','$tenlophoc', '$khoihoc')";
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
<center><a href="../index.php?mod=lop"><input type="button" value="Trở về"></a></center>
</body>
</html>