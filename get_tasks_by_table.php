<?php
$tableName = $_GET['table'];

// Подключаемся к базе данных
$servername = "localhost";
$username = "Alex";
$password = "12345";
$dbname = "triz_data";
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверяем соединение с базой данных
if ($conn->connect_error) {
    die("Ошибка соединения: " . $conn->connect_error);
}

$sql_select = "SELECT * FROM $tableName";
$result_select = $conn->query($sql_select);

if ($result_select->num_rows > 0) {
    while ($tableRow = $result_select->fetch_assoc()) {
        $imageData = "";
        if ($tableRow["img"]) {
            $imageData = base64_encode($tableRow["img"]);
        }

        echo '
        <div class="card" onclick="openDetailsPage(' . $tableRow["id"] . ',\'' . $tableName . '\')">
            <div class="card__content">
                <div class="card__content__text">
                    <h2>' . $tableRow["title"] . '</h2>
                    <p>' . $tableRow["prev"] . '</p>
                </div>
                <img src="data:image/png;base64,' . $imageData . '" alt="Изображение" style="width: 80px; height: 80px; border-radius: 12px; border: 3px solid #262626">
            </div>
            <div class="card__bottom__content">
                <div class="card__bottom__content__more">
                    <i>Подробнее</i>
                </div>
                <article>' . $tableName . '</article>
            </div>
        </div>';
    }
} else {
    echo "0 результатов";
}

$conn->close();
?>
