<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แสดงรูปภาพจากฐานข้อมูล</title>
    <style>
        .image-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }
        .image-container img {
            
            margin: 10px;
            object-fit: cover;
        }
    </style>
</head>
<body>
    <?php
    // การเชื่อมต่อฐานข้อมูล
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "t-shirt_screen";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // เช็คการเชื่อมต่อ
    if ($conn->connect_error) {
        die("การเชื่อมต่อล้มเหลว: " . $conn->connect_error);
    }

    // คำสั่ง SQL เพื่อดึงข้อมูลรูปภาพ
    $sql = "SELECT demoPicture FROM testpicture";

    $result = $conn->query($sql);

    // แสดงรูปภาพ
    if ($result->num_rows > 0) {
        // เริ่มต้นการแสดงผล
        echo "<div class='image-container'>";
        while($row = $result->fetch_assoc()) {
            echo "<img src='" . $row["demoPicture"] . "' alt='รูปภาพ'>";
        }
        // จบการแสดงผล
        echo "</div>";
    } else {
        echo "ไม่พบรูปภาพ";
    }
    $conn->close();
    ?>

</body>
</html>
