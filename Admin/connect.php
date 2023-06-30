<?php
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'quanlydiem2';

    $conn = mysqli_connect($host, $user, $pass, $db);

    if (!$conn) {
        die('Could not connect to database!');
    }
    else
    {
?>
        <!-- <script type="text/javascript">
                alert("Thành công!");
        </script> -->
<?php
    }
?>