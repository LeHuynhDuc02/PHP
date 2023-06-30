<?php
    include("../connect.php");
    $ma = $_GET['Ma'];
    $sql = "DELETE FROM hocsinh where MaHS = '$ma'";
    mysqli_query($conn, $sql);
    header("location: ../index.php?mod=hs");
?>