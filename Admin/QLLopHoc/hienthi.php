
<h1 align="center">QUẢN LÝ LỚP HỌC</h1>
<center><a href="./QlLopHoc/them.php" ><input type="button" value="Thêm mới"> </a></center>
    <br>
    <table border="1" cellspacing="0" cellpadding="10px" align="center">
        <tr>
            <th>Mã lớp học</th>
            <th>Tên lớp học</th>
            <th>Khối học</th>
            <th>Thao tác</th>
        </tr>
    
        <?php
            //include_once $_SERVER['DOCUMENT_ROOT'] . '/PROJECT_BTL/Admin/connect.php';
            include("./connect.php");
            $sql = "SELECT * FROM lophoc";
            $result = mysqli_query($conn,$sql);
        ?>
            <script>
                function confirmDelete(ma) {
                if (confirm("Bạn có chắc chắn muốn xóa?")) {
                    window.location.href = `./QLLopHoc/xoa.php?Ma=${ma}`;
                }
                }
            </script>
        <?php
            while($row = mysqli_fetch_assoc($result)){
        ?>
            <tr>
                <td><?=$row['MaLopHoc']?></td>
                <td><?=$row['TenLop']?></td>
                <td><?=$row['KhoiHoc']?></td>
                <td align="center">
                    <a href="./QLLopHoc/sua.php?Ma=<?=$row['MaLopHoc']?>"><input type="button" value="Sửa"> </a>
                    <input type="button" value="Xóa" onclick="confirmDelete('<?= $row['MaLopHoc'] ?>')">
                </td>
            </tr>
        <?php
            }
        ?>
    </table>