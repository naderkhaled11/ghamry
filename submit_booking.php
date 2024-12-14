<?php
require 'db_connection.php';

$name = $_POST['name'];
$phone = $_POST['phone'];
$date = $_POST['date'];
$time = $_POST['time'];
$service = $_POST['service'];

// التحقق من الحجز
$sql_check = "SELECT * FROM bookings WHERE phone='$phone' AND date='$date'";
$result = $conn->query($sql_check);

if ($result->num_rows > 0) {
    echo "<script>alert('لقد حجزت مسبقًا في هذا اليوم!'); window.location.href='booking.html';</script>";
} else {
    $sql_insert = "INSERT INTO bookings (name, phone, date, time, service) VALUES ('$name', '$phone', '$date', '$time', '$service')";
    if ($conn->query($sql_insert) === TRUE) {
        echo "<script>alert('تم الحجز بنجاح!'); window.location.href='booking.html';</script>";
    } else {
        echo "خطأ: " . $conn->error;
    }
}
$conn->close();
?>
