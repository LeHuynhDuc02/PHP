<?php
    include("../connect.php");
    $ma = $_GET['Ma'];
    $sql = "DELETE FROM lophoc where MaLopHoc = '$ma'";
    mysqli_query($conn, $sql);
    header("location: ../index.php?mod=lop");
?>