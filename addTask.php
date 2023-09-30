<?php
$servername = "localhost"; 
$username = "Alex"; 
$password = "12345"; 
$dbname = "triz_data"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $title = $_POST['title'];
    $prev = $_POST['prev'];
    $decision = $_POST['decision'];
    $img = $_POST['img']; 
    $tableName = $_POST['table_name'];  // Имя таблицы

    // Подготовленный запрос для вставки данных в выбранную таблицу
    $sql = $conn->prepare("INSERT INTO $tableName (title, prev, decision, img) VALUES (?, ?, ?, ?)");
    $sql->bind_param("ssss", $title, $prev, $decision, $img);

    if ($sql->execute()) {
        $conn->close();
        header("Location: index.php");
        exit();
    } else {
        echo "Ошибка при добавлении задачи: " . $conn->error;
    }
}

$conn->close();
?>
