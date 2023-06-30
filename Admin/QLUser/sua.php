<?php 
       include("../connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa User</title>
    <link rel="stylesheet" type="text/css" href="../Style_Form.css">
</head>
<body>
    <!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
    <div class="banner">
        <center><img class="img1" src="../../assets/img/logo.png"></center>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

    <h1 align="center">SỬA USER</h1>
    <?php
        $sql1 = "SELECT * FROM user where userid = '$_GET[Ma]'";
        $result = mysqli_query($conn, $sql1);
        while($row = mysqli_fetch_assoc($result)){
            $un = $row['username'];
            $lv = $row['level'];
        }
        
    ?>
<center class="formsuaUser">
    <form action="" method="post">
        <table cellpadding="10px" cellspacing="0" border="1">
            <tr>
                <th>UserID:</th>
                <td><input type="text" name="userid" value="<?=$_GET['Ma']?>" disabled></td>
            </tr>
            <tr>
                <th>Username:</th>
                <td><input type="text" name="username" value="<?=$un?>" disabled></td>
            </tr>
            <tr>
                <th>Level:</th>
                <td><input type="text" name="level" value="<?=$lv?>"></td>
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
    if($_POST['level'] == null){
        echo "</br> Bạn Chưa Nhập Level";
    }else{
        $level=$_POST['level'];
    }
   

    if($level){
        //include_once $_SERVER['DOCUMENT_ROOT'] . '/PROJECT_BTL/Admin/connect.php';
       // include "../connect.php";
        $_POST['sua']=null;      
        $sql = "UPDATE user set level='$level' where userid='$_GET[Ma]'";
        mysqli_query($conn, $sql);
?>
        <script type="text/javascript">
            alert("Bạn Đã Sửa Thành Công. Nhấn OK Để Tiếp Tục !");
        </script>

<?php
        // header("location: ../index.php?mod=capnhat");
    }
}
?>
<br>
<center><a href="../index.php?mod=capnhat"><input type="button" value="Trở về"></a></center>
</body>
</html>