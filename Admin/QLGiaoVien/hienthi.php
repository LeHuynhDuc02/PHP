
<h1 align="center">QUẢN LÝ GIÁO VIÊN</h1>
<center><a href="./QLGiaoVien/them.php" ><input type="button" value="Thêm mới"> </a></center>
    <br>
    <table border="1" cellspacing="0" cellpadding="10px" align="center">
        <tr>
            <th>Mã giáo viên</th>
            <th>Mã môn học</th>
            <th>Mã tên giáo viên</th>
            <th>Địa chỉ</th>
            <th>Số điện thoại</th>
            <th>Thao tác</th>
        </tr>
    
        <?php
           // include_once $_SERVER['DOCUMENT_ROOT'] . '/PROJECT_BTL/Admin/connect.php';
            include("./connect.php");
            $sql = "SELECT * FROM giaovien";
            $result = mysqli_query($conn,$sql);
        ?>
        <script>
            function confirmDelete(ma) {
            if (confirm("Bạn có chắc chắn muốn xóa?")) {
                window.location.href = `./QLGiaoVien/xoa.php?Ma=${ma}`;
            }
            }
        </script>
        <?php
            while($row = mysqli_fetch_assoc($result)){
                ?>
            <tr>
                <td><?=$row['MaGV']?></td>
                <td><?=$row['MaMonHoc']?></td>
                <td><?=$row['TenGV']?></td>
                <td><?=$row['DiaChi']?></td>
                <td><?=$row['SDT']?></td>
                <td align="center">
                    <a href="./QLGiaoVIen/sua.php?Ma=<?=$row['MaGV']?>"><input type="button" value="Sửa"> </a>
                    <input type="button" value="Xóa" onclick="confirmDelete('<?= $row['MaGV'] ?>')">
                </td>
            </tr>
        <?php
            }
        ?>
    </table>

