<?php include("./connect.php");?>
<h1 align="center">QUẢN LÝ HỌC SINH</h1>
<center><a href="./QLHocSinh/them.php" ><input type="button" value="Thêm mới"> </a></center>
    <br>
<?php
    $sql1 = "SELECT * FROM lophoc";
    $result1 = mysqli_query($conn,$sql1);
?>
<center>
<form action="" method="POST">
    <span style="font-weight: bold;">Mã lớp: </span>
    <select name="malop" id="">
    <?php
            while($row1 = mysqli_fetch_assoc($result1)){
                ?>
            <option value="<?=$row1['MaLopHoc']?>"><?=$row1['MaLopHoc']?></option>
    <?php 
            }
    ?>
    </select>
    <input type="submit" value="Lọc" name="loc">
</form>
<br>
</center>
    <table border="1" cellspacing="0" cellpadding="10px" align="center">
        <tr>
            <th>Mã học sinh</th>
            <th>Mã lớp học</th>
            <th>Họ đệm</th>
            <th>Tên học sinh</th>
            <th>Giới tính</th>
            <th>Ngày sinh</th>
            <th>Nơi sinh</th>
            <th>Dân tộc</th>
            <th>Thao tác</th>
        </tr>

        <?php
           // include_once $_SERVER['DOCUMENT_ROOT'] . '/PROJECT_BTL/Admin/connect.php';
            if (isset($_POST['loc']))
                $sql = "SELECT * FROM hocsinh where MaLopHoc='$_POST[malop]'";
            else
                $sql = "SELECT * FROM hocsinh";
            $result = mysqli_query($conn,$sql);
        ?>
        <script>
            function confirmDelete(ma) {
            if (confirm("Bạn có chắc chắn muốn xóa?")) {
                window.location.href = `./QLHocSinh/xoa.php?Ma=${ma}`;
            }
            }
        </script>
<?php
            while($row = mysqli_fetch_assoc($result)){
                ?>
            <tr>
                <td><?=$row['MaHS']?></td>
                <td><?=$row['MaLopHoc']?></td>
                <td><?=$row['HoDem']?></td>
                <td><?=$row['TenHS']?></td>
                <td><?=$row['GioiTinh']?></td>
                <td><?=$row['NgaySinh']?></td>
                <td><?=$row['NoiSinh']?></td>
                <td><?=$row['DanToc']?></td>
                <td align="center">
                    <a href="./QLHocSinh/sua.php?Ma=<?=$row['MaHS']?>"><input type="button" value="Sửa"> </a>
                    <input type="button" value="Xóa" onclick="confirmDelete('<?= $row['MaHS'] ?>')">
                </td>
            </tr>
        <?php
            }
        ?>
    </table>

