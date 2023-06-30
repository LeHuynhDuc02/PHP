<?php
    include("../connect.php");
    $ma = $_GET['Ma'];
    $sql = "DELETE FROM hocky where MaHocKy = '$ma'";
    mysqli_query($conn, $sql);
    header("location: ../index.php?mod=hk");
?>