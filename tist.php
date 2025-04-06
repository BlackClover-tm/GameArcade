<?php
// اتصال به دیتابیس SQLite
$db = new SQLite3('words.db');

// ساخت جدول در دیتابیس در صورت عدم وجود
$db->exec("CREATE TABLE IF NOT EXISTS words (id INTEGER PRIMARY KEY, word TEXT)");

// ذخیره کلمه در دیتابیس
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['word'])) {
    $word = htmlspecialchars($_POST['word']);
    $db->exec("INSERT INTO words (word) VALUES ('$word')");
}

// نمایش کلمات ذخیره شده
$result = $db->query("SELECT word FROM words");
echo "<ul>";
while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
    echo "<li>" . htmlspecialchars($row['word']) . "</li>";
}
echo "</ul>";
?>
