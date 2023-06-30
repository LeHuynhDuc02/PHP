<?php
    include("../connect.php");
    $malh = $_GET['malh'];
    $mamh = $_GET['mamh'];
    $mahk = $_GET['mahk'];
    $sql = "UPDATE assignment SET TrangThai=0 where MaLopHoc='$malh'and MaMonHoc='$mamh' and MaHocKy='$mahk'";
    mysqli_query($conn, $sql);
    header("location: ../index.php?mod=diem&malh=$malh&mamh=$mamh&mahk=$mahk");
?>