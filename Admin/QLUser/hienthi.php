
<h1 align="center">QUẢN LÝ USER</h1>
<center><a href="./QLUser/them.php" ><input type="button" value="Thêm mới"> </a></center>
    <br>
    <table border="1" cellspacing="0" cellpadding="10px" align="center">
        <tr>
            <th>UserID</th>
            <th>Tên đăng nhập</th>
            <th>Cấp độ</th>
            <th>Thao tác</th>
        </tr>
    
        <?php
            //include_once $_SERVER['DOCUMENT_ROOT'] . '/PROJECT_BTL/Admin/connect.php';
            include("./connect.php");
            $sql = "SELECT * FROM user";
            $result = mysqli_query($conn,$sql);
        ?>
            <script>
                function confirmDelete(ma) {
                if (confirm("Bạn có chắc chắn muốn xóa?")) {
                    window.location.href = `./QLUser/xoa.php?Ma=${ma}`;
                }
                }
            </script>
        <?php
            while($row = mysqli_fetch_assoc($result)){
        ?>
            <tr>
                <td><?=$row['userid']?></td>
                <td><?=$row['username']?></td>
                <td><?=$row['level']?></td>
                <td align="center">
                    <a href="./QLUser/sua.php?Ma=<?=$row['userid']?>"><input type="button" value="Sửa"> </a>
                    <input type="button" value="Xóa" onclick="confirmDelete('<?= $row['userid'] ?>')">
                </td>
            </tr>
        <?php
            }
        ?>
    </table>