<?php
if (!defined("ROOT"))
{
    echo "You don't have permission to access this page!"; exit;
}
$mod = isset($_GET["mod"])?$_GET["mod"]:"";
if($mod=="hs")
{
    include ROOT . "/QLHocSinh/hienthi.php";
}
if($mod=="gv")
{
    include ROOT . "/QLGiaoVien/hienthi.php";
}
if($mod=="mh")
{
    include ROOT."/QLMonHoc/hienthi.php";
}
if($mod=="diem")
{
    include ROOT . "/QLDiem/hienthi.php";
}
if($mod=="hk")
{
    include ROOT."/QLHocKy/hienthi.php";
}
if($mod=="lop")
{
    include ROOT . "/QLLopHoc/hienthi.php";
}
if($mod=="capnhat")
{
    include ROOT . "/QLUser/hienthi.php";
}
if($mod=="day")
{
    include ROOT. "/QLAssignment/hienthi.php";
}
////////////////////////////////////////chưa thêm/////
if($mod=="dangxuat")
{
    include ROOT . "/logout.php";
}
?>