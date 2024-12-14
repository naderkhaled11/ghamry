<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: admin_login.html");
    exit;
}
require 'db_connection.php';
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إدارة الحجوزات - Ghamry Barber Shop</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="center">
        <h1>إدارة الحجوزات</h1>
        <a href="logout.php" class="btn">تسجيل الخروج</a>
        <table>
            <tr>
                <th>الاسم</th>
                <th>رقم الهاتف</th>
                <th>التاريخ</th>
                <th>الساعة</th>
                <th>الخدمة</th>
            </tr>
            <?php
            $sql = "SELECT * FROM bookings";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['name']}</td>
                            <td>{$row['phone']}</td>
                            <td>{$row['date']}</td>
                            <td>{$row['time']}</td>
                            <td>{$row['service']}</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='5'>لا توجد حجوزات</td></tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>
