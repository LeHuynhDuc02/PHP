<?php
    include("../connect.php");
    $ma = $_GET['Ma'];
    $sql = "DELETE FROM giaovien where MaGV = '$ma'";
    mysqli_query($conn, $sql);
    header("location: ../index.php?mod=gv");
?>