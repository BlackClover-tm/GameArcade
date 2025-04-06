<?php
// اتصال به دیتابیس SQLite
$db = new PDO('sqlite:words.db');

// ایجاد جدول اگر وجود ندارد
$db->exec("CREATE TABLE IF NOT EXISTS words (id INTEGER PRIMARY KEY, word TEXT)");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['word'])) {
    // ذخیره کلمه در دیتابیس
    $word = $_POST['word'];
    $stmt = $db->prepare("INSERT INTO words (word) VALUES (:word)");
    $stmt->bindParam(':word', $word);
    $stmt->execute();
    echo "Word saved successfully! <a href='index.html'>Go back</a>";
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['show'])) {
    // نمایش داده‌های ذخیره‌شده در دیتابیس
    $result = $db->query("SELECT word FROM words");
    echo "<h1>Words in Database:</h1>";
    foreach ($result as $row) {
        echo "<p>" . htmlspecialchars($row['word']) . "</p>";
    }
    echo "<a href='index.html'>Go back</a>";
} else {
    // در صورت درخواست نامعتبر
    echo "Invalid Request. <a href='index.html'>Go back</a>";
}
?>
