<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $message = htmlspecialchars($_POST['message']);

    echo "<h1>پیام دریافت شد</h1>";
    echo "<p><strong>نام:</strong> $name</p>";
    echo "<p><strong>پیام:</strong> $message</p>";
} else {
    echo "هیچ داده‌ای ارسال نشده است.";
}
?>
