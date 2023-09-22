<?php
$servername = "localhost"; 
$username = "Alex"; 
$password = "12345"; 
$dbname = "triz_data"; 

// Создаем соединение
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверяем соединение
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Получаем данные из формы
$title = $_POST['title'];
$prev = $_POST['prev'];
$decision = $_POST['decision'];
$tag = $_POST['tag']; 
$img = $_POST['img']; 


// SQL запрос для вставки данных в базу данных
$sql = "INSERT INTO content (title, prev, decision, tag, img) VALUES ('$title', '$prev', '$decision', '$tag' , '$img')";

if ($conn->query($sql) === TRUE) {
    // Закрываем соединение с базой данных
    $conn->close();
    header("Location: index.php"); // Перенаправление на страницу index.php
    exit();
} else {
    echo "Ошибка при добавлении задачи: " . $conn->error;
}

// Закрываем соединение с базой данных
$conn->close();
?>
