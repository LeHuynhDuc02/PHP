<?php
    include("../connect.php");
    $ma = $_GET['Ma'];
    $sql = "DELETE FROM assignment where MaPhanCong = '$ma'";
    mysqli_query($conn, $sql);
    header("location: ../index.php?mod=day");
?>