<?php 
       include("../connect.php");
?>
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

    <h1 align="center">SỬA HỌC KỲ</h1>
    <?php
        $sql1 = "SELECT * FROM hocky where MaHocKy = '$_GET[Ma]'";
        $result = mysqli_query($conn, $sql1);
        while($row = mysqli_fetch_assoc($result)){
            $thk = $row['TenHocKy'];
            $hshk = $row['HeSoHK'];
            $nh = $row['NamHoc'];
        }
        
    ?>
<center class="formsuaLopHoc">
    <form action="" method="post">
        <table cellpadding="10px" cellspacing="0" border="1">
            <tr>
                <th>Mã học kỳ:</th>
                <td><input type="text" name="mahocky" value="<?=$_GET['Ma']?>" disabled></td>
            </tr>
            <tr>
                <th>Tên học kỳ:</th>
                <td>
                        <select name="tenhocky" id="">
                        <?php
                            $sql = "SELECT DISTINCT TenHocKy FROM hocky";
                            $rs = mysqli_query($conn, $sql);
                            while($r = mysqli_fetch_assoc($rs)){
                                if($r['TenHocKy']==$thk)
                                {
                        ?>
                                    <option value="<?=$r['TenHocKy']?>" selected><?=$r['TenHocKy']?></option>
                        <?php
                            } else {
                        ?>
                                <option value="<?=$r['TenHocKy']?>"><?=$r['TenHocKy']?></option>
                        <?php
                            }
                        }
                        ?>
                </td>
            </tr>
            <tr>
                <th>Hệ số học kỳ:</th>
                <td><input type="text" name="hesohocky" value="<?=$hshk?>"></td>
            </tr>   
            <tr>
                <th>Năn học:</th>
                <td><input type="text" name="namhoc" value="<?=$nh?>"></td>
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
    
    if($tenhocky && $hesohocky && $namhoc){
        //include_once $_SERVER['DOCUMENT_ROOT'] . '/PROJECT_BTL/Admin/connect.php';
        //include "../connect.php";
        $_POST['sua']=null;      
        $sql = "UPDATE hocky set TenHocKy = '$tenhocky', HeSoHK = '$hesohocky', NamHoc='$namhoc' where MaHocKy='$_GET[Ma]'";
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
<center><a href="../index.php?mod=hk"><input type="button" value="Trở về"></a></center>
</body>
</html>