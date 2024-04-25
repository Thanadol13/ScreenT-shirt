<?php
// กำหนดค่าการเชื่อมต่อฐานข้อมูล
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "t-shirt_screen";

// สร้างการเชื่อมต่อ
$conn = new mysqli($servername, $username, $password, $dbname);

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("การเชื่อมต่อล้มเหลว: " . $conn->connect_error);
}

// รับข้อมูลจาก POST request
$shirt_image = $_POST['shirt_image'];
$canvas_data = $_POST['canvas_data'];

// บันทึกข้อมูลลงในตาราง testpicture
$sql_testpicture = "INSERT INTO testpicture (demoPicture) VALUES ('$shirt_image')";

if ($conn->query($sql_testpicture) === TRUE) {
    echo "บันทึกข้อมูลเรียบร้อยแล้ว";
} else {
    echo "เกิดข้อผิดพลาดในการบันทึกข้อมูลลงในตาราง testpicture: " . $conn->error;
}

// ปิดการเชื่อมต่อ
$conn->close();
?>
