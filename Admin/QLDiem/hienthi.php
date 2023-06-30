<?php 
    include("./connect.php");
        
    $malophoc = "";
    $mamonhoc = "";
    $mahocky = "";
    $trangthai = "";
?>
<script>
    function confirmDong(malh, mamh, mahk) {
        if (confirm("Bạn có chắc chắn muốn đóng sửa điểm?")) {
            window.location.href = `./QLDiem/dongsuadiem.php?malh=${malh}& mamh=${mamh} & mahk=${mahk}`;
        }
    }
    function confirmMo(malh, mamh, mahk) {
        if (confirm("Bạn có chắc chắn muốn mở sửa điểm?")) {
            window.location.href = `./QLDiem/mosuadiem.php?malh=${malh}& mamh=${mamh} & mahk=${mahk}`;
        }
    }
</script>
<h1 align="center">QUẢN LÝ ĐIỂM</h1>
<center>
    <form action="" class="timkiemdiem" method="POST">
            <h4 style="display: inline;">Mã lớp học:</h4">
            <select name="malophoc" id="">
                            <?php
                            $sql = "SELECT MaLopHoc FROM lophoc";
                            $rs = mysqli_query($conn, $sql);
                            while($r = mysqli_fetch_assoc($rs)){
                                ?>
                            <option value="<?=$r['MaLopHoc']?>"><?=$r['MaLopHoc']?></option>
                            <?php
                            }
                            ?>  
            </select>  
            <h4 style="display: inline-block;">Mã môn học:</h4">
            <select name="mamonhoc" id="">
                            <?php
                            $sql = "SELECT MaMonHoc FROM monhoc";
                            $rs = mysqli_query($conn, $sql);
                            while($r = mysqli_fetch_assoc($rs)){
                                ?>
                            <option value="<?=$r['MaMonHoc']?>"><?=$r['MaMonHoc']?></option>
                            <?php
                            }
                            ?>  
            </select>  
            <h4 style="display: inline-block;">Mã học kỳ:</h4>
            <select name="mahocky" id="">
                            <?php
                            $sql = "SELECT MaHocKy FROM hocky";
                            $rs = mysqli_query($conn, $sql);
                            while($r = mysqli_fetch_assoc($rs)){
                                ?>
                            <option value="<?=$r['MaHocKy']?>"><?=$r['MaHocKy']?></option>
                            <?php
                            }
                            ?>  
            </select>       
            <input type="submit" name="tim" value="Tìm kiếm">
    </form>
</center>
<?php
     if(isset($_POST['tim']) || isset($_GET['malh'])) {
        //include_once $_SERVER['DOCUMENT_ROOT'] . '/PROJECT_BTL/Admin/connect.php';
        //include("./connect.php");
        if (isset($_POST['tim']))
        {
            $malophoc = $_POST['malophoc'];
            $mamonhoc = $_POST['mamonhoc'];
            $mahocky = $_POST['mahocky'];
        }
        else
        {
            $malophoc = $_GET['malh'];
            $mamonhoc = $_GET['mamh'];
            $mahocky = $_GET['mahk'];
        }
        $trangthai = "";
        $sql = "SELECT * FROM diem 
                where MaLopHoc='$malophoc' and  MaMonHoc='$mamonhoc' and MaHocKy='$mahocky'";
        $result = mysqli_query($conn,$sql);

        $sql1 = "SELECT * FROM assignment 
                where MaLopHoc='$malophoc' and  MaMonHoc='$mamonhoc' and MaHocKy='$mahocky'";
        $result1 = mysqli_query($conn,$sql1);
        while($row1 = mysqli_fetch_assoc($result1)){
            $trangthai = $row1['TrangThai'];
    }   
?>
<div id="content_print">
<div class="thongtintimkiem" align="center">
                <div>
                    <span>Mã lớp học:</span>
                    <span style="font-weight:bold;"><?=$malophoc?></span>
                </div>
                <div>
                    <span>Mã môn học:</span>
                    <span style="font-weight:bold;"><?=$mamonhoc?></span>
                </div>
                <div>
                    <span>Mã học kỳ:</span>
                    <span style="font-weight:bold;"><?=$mahocky?></span>
                </div>
                <div>
                    <span>Trạng thái:</span>
                    <span style="font-weight:bold;"><?php
                        if ($trangthai==0)
                            echo " <b style='color:red;'>Đã Đóng</b>";
                        else if ($trangthai==1)
                            echo "<b style='color:green;'>Đang Mở</b>";
                        else echo "";
                    ?></span>
                </div>
                <div align="center" style="font-weight:bold; margin-top: 5px;">
                    <span>
                        <input type="button" value="Đóng" onclick="confirmDong('<?= $malophoc ?>', '<?= $mamonhoc ?>', '<?= $mahocky ?>')">
                        <input type="button" value="Mở" onclick="confirmMo('<?= $malophoc ?>', '<?= $mamonhoc ?>', '<?= $mahocky ?>')">
                    </span>
                </div>
           <br>
</div>
    <table border="1" cellspacing="0" cellpadding="10px" align="center">
        <tr>
            <th>Mã điểm</th>
            <th>Mã học kỳ</th>
            <th>Mã môn học</th>
            <th>Mã học sinh</th>
            <th>Mã lớp học</th>
            <th>Điểm miệng</th>
            <th>Điểm 15 phút lần 1</th>
            <th>Điểm 15 phút lần 2</th>
            <th>Điểm 1 tiết</th>
            <th>Điểm giữa kỳ</th>
            <th>Điểm thi</th>
            <th>Điểm trung bình</th>
        </tr>

        <?php
            while($row = mysqli_fetch_assoc($result)){
        ?>
            <tr>
                <td><?=$row['MaDiem']?></td>
                <td><?=$row['MaHocKy']?></td>
                <td><?=$row['MaMonHoc']?></td>
                <td><?=$row['MaHS']?></td>
                <td><?=$row['MaLopHoc']?></td>
                <td><?=$row['DiemMieng']?></td>
                <td><?=$row['Diem15Phut1']?></td>
                <td><?=$row['Diem15Phut2']?></td>
                <td><?=$row['Diem1Tiet']?></td>
                <td><?=$row['DiemGiuaKi']?></td>
                <td><?=$row['DiemThi']?></td>
                <td><?=$row['DiemTB']?></td>
            </tr>
        <?php
            }}
        ?>
    </table>
</div>

<center><button onclick="printContent()">Print</button></center>
    <script>
        function printContent() {
            let content = document.getElementById('content_print');
            let printWindow = window.open('', '', 'height=400,width=800');
            //printWindow.document.write('<html><head><title>Print Content</title>');
            printWindow.document.write('</head><body>' + content.innerHTML + '</body></html>');
            printWindow.document.close();
            printWindow.focus();
            printWindow.print();
            printWindow.close();
        }
</script>