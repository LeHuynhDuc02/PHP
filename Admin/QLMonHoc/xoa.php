<?php
    include("../connect.php");
    $ma = $_GET['Ma'];
    $sql = "DELETE FROM monhoc where MaMonHoc = '$ma'";
    mysqli_query($conn, $sql);
    header("location: ../index.php?mod=mh");
?>