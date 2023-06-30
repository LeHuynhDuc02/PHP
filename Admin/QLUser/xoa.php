<?php
    include("../connect.php");
    $ma = $_GET['Ma'];
    $sql = "DELETE FROM user where userid = '$ma'";
    mysqli_query($conn, $sql);
    header("location: ../index.php?mod=capnhat");
?>