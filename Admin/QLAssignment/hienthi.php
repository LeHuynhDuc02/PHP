
<h1 align="center"> QUẢN LÝ LỊCH DẠY </h1>
<center><a href="./QLAssignment/them.php" ><input type="button" value="Thêm mới"> </a></center>
    <br>
    <table border="1" cellspacing="0" cellpadding="10px" align="center">
        <tr>
            <th>Mã phân công</th>
            <th>Mã môn học</th>
            <th>Mã giáo viên</th>
            <th>Mã lớp học</th>
            <th>Mã học kỳ</th>
            <th>Mô tả phân công</th>
            <th>Trạng thái</th>
            <th>Thao tác</th>
        </tr>
    
        <?php
           // include_once $_SERVER['DOCUMENT_ROOT'] . '/PROJECT_BTL/Admin/connect.php';
            include("./connect.php");
            $sql = "SELECT * FROM Assignment";
            $result = mysqli_query($conn,$sql);
        ?>
        <script>
            function confirmDelete(ma) {
            if (confirm("Bạn có chắc chắn muốn xóa?")) {
                window.location.href = `./QLAssignment/xoa.php?Ma=${ma}`;
            }
            }
        </script>
<?php
            while($row = mysqli_fetch_assoc($result)){
                ?>
            <tr>
                <td><?=$row['MaPhanCong']?></td>
                <td><?=$row['MaMonHoc']?></td>
                <td><?=$row['MaGV']?></td>
                <td><?=$row['MaLopHoc']?></td>
                <td><?=$row['MaHocKy']?></td>
                <td><?=$row['MoTaPhanCong']?></td>
                <td><?=$row['TrangThai']?></td>
                <td align="center">
                    <a href="./QLAssignment/sua.php?Ma=<?=$row['MaPhanCong']?>"><input type="button" value="Sửa"> </a>
                    <input type="button" value="Xóa" onclick="confirmDelete('<?= $row['MaPhanCong'] ?>')">
                </td>
            </tr>
        <?php
            }
        ?>
    </table>

