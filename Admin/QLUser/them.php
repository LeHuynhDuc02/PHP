<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Them User</title>
    <link rel="stylesheet" type="text/css" href="../Style_Form.css">
</head>
<body>
    <!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
    <div class="banner">
        <center><img class="img1" src="../../assets/img/logo.png"></center>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

    <h1 align="center">THÊM USER</h1>

<center class="formthemUser">
    <form action="" method="post">
        <table cellpadding="10px" cellspacing="0" border="1">
            <tr>
                <th>UserID:</th>
                <td><input type="text" name="userid"></td>
            </tr>
            <tr>
                <th>Username:</th>
                <td><input type="text" name="username"></td>
            </tr>
            <tr>
                <th>Password:</th>
                <td><input type="text" name="password"></td>
            </tr>
            <tr>
                <th>Level:</th>
                <td><input type="text" name="level"></td>
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
    if($_POST['userid'] == null){
        echo "</br>Bạn Chưa Nhập UserID";
    }
    else{
        $userid=$_POST['userid'];
    }
    if($_POST['username'] == null){
        echo "</br> Bạn Chưa Nhập Username";
    }else{
        $username=$_POST['username'];
    }
    if($_POST['password'] == null){
        echo "</br> Bạn Chưa Nhập password";
    }else{
        $password=$_POST['password'];
    }
    if($_POST['level'] == null){
        echo "</br> Bạn Chưa Nhập Level";
    }else{
        $level=$_POST['level'];
    }

    if($userid && $username && $password && $level){
        //include_once $_SERVER['DOCUMENT_ROOT'] . '/PROJECT_BTL/Admin/connect.php';
        include "../connect.php";
        $_POST['them']=null;
        $sql = "INSERT INTO user values('$userid','$username', '$password', '$level')";
        mysqli_query($conn, $sql);
?>
        <script type="text/javascript">
            alert("Bạn Đã Thêm THÀNH CÔNG. Nhấn OK Để Tiếp Tục !");
        </script>

<?php
        // header("location: ../index.php?mod=lop");
    }
}
?>
<br>
<center><a href="../index.php?mod=capnhat"><input type="button" value="Trở về"></a></center>
</body>
</html>