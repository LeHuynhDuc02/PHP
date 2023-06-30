<?php 
       include("../connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Học Sinh</title>
    <link rel="stylesheet" type="text/css" href="../Style_Form.css">
</head>
<body>
    <div class="banner">
        <center><img class="img1" src="../../assets/img/logo.png"></center>
    </div>
    <h1 align="center">THÊM MỚI HỌC SINH</h1>

    <center class="formthemHocSinh">
        <form action="" method="post">
            <table cellpadding="10px" cellspacing="0" border="1">
                <tr>
                    <th>Mã học sinh:</th>
                    <td><input type="text" name="mahocsinh"></td>
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
                    <th>Họ đệm:</th>
                    <td><input type="text" name="hodem"></td>
                </tr>
                <tr>
                    <th>Tên học sinh:</th>
                    <td><input type="text" name="tenhocsinh"></td>
                </tr>
                <tr>
                    <th>Giới tính:</th>
                    <td><input type="text" name="gioitinh"></td>
                </tr>
                <tr>
                    <th>Ngày sinh:</th>
                    <td><input type="text" name="ngaysinh"></td>
                </tr>
                <tr>
                    <th>Nơi sinh:</th>
                    <td><input type="text" name="noisinh"></td>
                </tr>
                <tr>
                    <th>Dân tộc:</th>
                    <td><input type="text" name="dantoc"></td>
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
        if($_POST['mahocsinh'] == null){
            echo "</br>Bạn Chưa Nhập Mã Học Sinh";
        }
        else{
            $mahocsinh=$_POST['mahocsinh'];
        }
        if($_POST['malophoc'] == null){
            echo "</br> Bạn Chưa Nhập Mã Lớp Học";
        }else{
            $malophoc=$_POST['malophoc'];
        }
        if($_POST['hodem'] == null){
            echo "</br> Bạn Chưa Nhập Họ Đệm";
        }else{
            $hodem=$_POST['hodem'];
        }
        if($_POST['tenhocsinh'] == null){
            echo "</br> Bạn Chưa Nhập Tên Học Sinh";
        }else{
            $tenhocsinh=$_POST['tenhocsinh'];
        }
        if($_POST['gioitinh']== null) {
            echo "</br> Bạn Chưa Nhập Giới Tính";
        }
        else{
            $gioitinh=$_POST['gioitinh'];
        }
        if($_POST['ngaysinh']==null)
        {
            echo "</br> Bạn Chưa Nhập Ngày Sinh";
        }
        else{
            $ngaysinh=$_POST['ngaysinh'];
        }
        if($_POST['noisinh']==null)
        {
            echo "</br> Bạn Chưa Nhập Nơi Sinh";
        }
        else
        {
            $noisinh=$_POST['noisinh'];
        }
        if($_POST['dantoc']==null)
        {
            echo "</br> Bạn Chưa Nhập Dân Tộc";
        }
        else
        {
            $dantoc=$_POST['dantoc'];
        }
        if($mahocsinh && $malophoc && $hodem && $tenhocsinh && $gioitinh && $ngaysinh && $noisinh && $dantoc){
            //include_once $_SERVER['DOCUMENT_ROOT'] . '/PROJECT_BTL/Admin/connect.php';
            //include "../connect.php";
            $_POST['sua']=null;
            $sql = "INSERT INTO `hocsinh` (`MaHS`, `MaLopHoc`, `HoDem`, `TenHS`, `GioiTinh`, `NgaySinh`, `NoiSinh`, `DanToc`)  
                    VALUES('$mahocsinh','$malophoc', '$hodem', '$tenhocsinh', '$gioitinh', '$ngaysinh', '$noisinh', '$dantoc')";
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
<center><a href="../index.php?mod=hs"><input type="button" value="Trở về"></a></center>
</body>
</html>

