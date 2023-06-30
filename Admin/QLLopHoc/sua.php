<?php 
       include("../connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sua Lop Hoc</title>
    <link rel="stylesheet" type="text/css" href="../Style_Form.css">
</head>
<body>
    <!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
    <div class="banner">
        <center><img class="img1" src="../../assets/img/logo.png"></center>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

    <h1 align="center">SỬA LỚP HỌC</h1>
    <?php
        $sql1 = "SELECT * FROM lophoc where MaLopHoc = '$_GET[Ma]'";
        $result = mysqli_query($conn, $sql1);
        while($row = mysqli_fetch_assoc($result)){
            $tlh = $row['TenLop'];
            $kh = $row['KhoiHoc'];
        }
        
    ?>
<center class="formsuaLopHoc">
    <form action="" method="post">
        <table cellpadding="10px" cellspacing="0" border="1">
            <tr>
                <th>Mã lớp học:</th>
                <td><input type="text" name="malophoc" value="<?=$_GET['Ma']?>" disabled></td>
            </tr>
            <tr>
                <th>Tên lớp học:</th>
                <td><input type="text" name="tenlophoc" value="<?=$tlh?>"></td>
            </tr>
            <tr>
                <th>Khối học:</th>
                <td>
                        <select name="khoihoc" id="">
                        <?php
                            $sql = "SELECT DISTINCT KhoiHoc FROM lophoc";
                            $rs = mysqli_query($conn, $sql);
                            while($r = mysqli_fetch_assoc($rs)){
                                if($r['KhoiHoc']==$kh)
                                {
                        ?>
                                    <option value="<?=$r['KhoiHoc']?>" selected><?=$r['KhoiHoc']?></option>
                        <?php
                            } else {
                        ?>
                                <option value="<?=$r['KhoiHoc']?>"><?=$r['KhoiHoc']?></option>
                        <?php
                            }
                        }
                        ?>  
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align:center;">
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
    
    if($tenlophoc && $khoihoc){
        //include_once $_SERVER['DOCUMENT_ROOT'] . '/PROJECT_BTL/Admin/connect.php';
        //include "../connect.php";
        $_POST['sua']=null;      
        $sql = "UPDATE lophoc set TenLop = '$tenlophoc', KhoiHoc = '$khoihoc' where MaLopHoc='$_GET[Ma]'";
        mysqli_query($conn, $sql);
?>
        <script type="text/javascript">
            alert("Bạn Đã Sửa Thành Công. Nhấn OK Để Tiếp Tục !");
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