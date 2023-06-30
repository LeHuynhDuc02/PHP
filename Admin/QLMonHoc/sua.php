<?php 
       include("../connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sua Mon Hoc</title>
    <link rel="stylesheet" type="text/css" href="../Style_Form.css">
</head>
<body>
    <!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
    <div class="banner">
        <center><img class="img1" src="../../assets/img/logo.png"></center>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

    <h1 align="center">SỬA MÔN HỌC</h1>
    <?php
        $sql1 = "SELECT * FROM monhoc where MaMonHoc = '$_GET[Ma]'";
        $result = mysqli_query($conn, $sql1);
        while($row = mysqli_fetch_assoc($result)){
            $tmh = $row['TenMonHoc'];
            $st = $row['SoTiet'];
            $hsmh = $row['HeSoMonHoc'];
        }
        
    ?>
<center class="formsuaLopHoc">
    <form action="" method="post">
        <table cellpadding="10px" cellspacing="0" border="1">
            <tr>
                <th>Mã môn học:</th>
                <td><input type="text" name="mamonhoc" value="<?=$_GET['Ma']?>" disabled></td>
            </tr>
            <tr>
                <th>Tên môn học:</th>
                <td><input type="text" name="tenmonhoc" value="<?=$tmh?>"></td>
            </tr>
            <tr>
                <th>Số tiết:</th>
                <td><input type="text" name="sotiet" value="<?=$st?>"></td>
            </tr>
            <tr>
                <th>Hệ số:</th>
                <td><input type="text" name="hesomonhoc" value="<?=$hsmh?>"></td>
            </tr>   
            <tr>
                <td colspan="2" style="text-align: center;">
                    <input type="submit" name="sua" value="Sửa">
                    <span>&nbsp; &nbsp;</span>
                    <input type="reset" name="reset" value="Reset">
                </td>
                
            </tr>
        </table>
    </form>
</center>

<?php
if(isset($_POST['sua']))
{
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

    if($tenmonhoc && $sotiet && $hesomonhoc){
        //include_once $_SERVER['DOCUMENT_ROOT'] . '/PROJECT_BTL/Admin/connect.php';
       // include "../connect.php";
        $_POST['sua']=null;      
        $sql = "UPDATE monhoc set TenMonHoc = '$tenmonhoc', SoTiet = '$sotiet', HeSoMonHoc='$hesomonhoc' where MaMonHoc='$_GET[Ma]'";
        mysqli_query($conn, $sql);
?>
        <script type="text/javascript">
            alert("Bạn Đã Sửa Thành Công. Nhấn OK Để Tiếp Tục !");
        </script>

<?php
        // header("location: ../index.php?mod=mh");
    }
}
?>
<br>
<center><a href="../index.php?mod=mh"><input type="button" value="Trở về"></a></center>
</body>
</html>