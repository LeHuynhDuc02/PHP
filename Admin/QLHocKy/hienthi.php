
<h1 align="center">QUẢN LÝ HỌC KỲ</h1>
<center><a href="./QLHocKy/them.php" ><input type="button" value="Thêm mới"> </a></center>
    <br>
    <table border="1" cellspacing="0" cellpadding="10px" align="center">
        <tr>
            <th>Mã học kỳ</th>
            <th>Tên học kỳ</th>
            <th>Hệ số học kỳ</th>
            <th>Năm học</th>
            <th>Thao tác</th>
        </tr>
    
        <?php
            //include_once $_SERVER['DOCUMENT_ROOT'] . '/PROJECT_BTL/Admin/connect.php';
            include("./connect.php");
            $sql = "SELECT * FROM hocky";
            $result = mysqli_query($conn,$sql);
        ?>
            <script>
                function confirmDelete(ma) {
                if (confirm("Bạn có chắc chắn muốn xóa?")) {
                    window.location.href = `./QLHocKy/xoa.php?Ma=${ma}`;
                }
                }
            </script>
        <?php
            while($row = mysqli_fetch_assoc($result)){
        ?>
            <tr>
                <td><?=$row['MaHocKy']?></td>
                <td><?=$row['TenHocKy']?></td>
                <td><?=$row['HeSoHK']?></td>
                <td><?=$row['NamHoc']?></td>
                <td align="center">
                    <a href="./QLHocKy/sua.php?Ma=<?=$row['MaHocKy']?>"><input type="button" value="Sửa"> </a>
                    <input type="button" value="Xóa" onclick="confirmDelete('<?= $row['MaHocKy'] ?>')">
                </td>
            </tr>
        <?php
            }
        ?>
    </table>