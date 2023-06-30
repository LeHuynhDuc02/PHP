
<h1 align="center">QUẢN LÝ MÔN HỌC</h1>
<center><a href="./QLMonHoc/them.php" ><input type="button" value="Thêm mới"> </a></center>
    <br>

    <table border="1" cellspacing="0" cellpadding="10px" align="center">
        <tr>
            <th>Mã môn học</th>
            <th>Tên môn học</th>
            <th>Số tiết</th>
            <th>Hệ số</th>
            <th>Thao tác</th>
        </tr>
    
        <?php
            //include_once $_SERVER['DOCUMENT_ROOT'] . '/PROJECT_BTL/Admin/connect.php';
            include("./connect.php");
            $sql = "SELECT * FROM monhoc";
            $result = mysqli_query($conn,$sql);
        ?>
            <script>
                function confirmDelete(ma) {
                if (confirm("Bạn có chắc chắn muốn xóa?")) {
                    window.location.href = `./QLMonHoc/xoa.php?Ma=${ma}`;
                }
                }
            </script>
        <?php
            while($row = mysqli_fetch_assoc($result)){
        ?>
            <tr>
                <td><?=$row['MaMonHoc']?></td>
                <td><?=$row['TenMonHoc']?></td>
                <td><?=$row['SoTiet']?></td>
                <td><?=$row['HeSoMonHoc']?></td>
                <td align="center">
                    <a href="./QLMonHoc/sua.php?Ma=<?=$row['MaMonHoc']?>"><input type="button" value="Sửa"> </a>
                    <input type="button" value="Xóa" onclick="confirmDelete('<?= $row['MaMonHoc'] ?>')">
                </td>
            </tr>
        <?php
            }
        ?>
    </table>