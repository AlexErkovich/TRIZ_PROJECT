<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prosto+One&display=swap" rel="stylesheet">
    <title>TRIZ DATA TASKS</title>
</head>

<body>

    <div class="main">
        <div class="main__title">
            <h1>TASKS</h1>
            <button onclick="addTasksPage()"> <img src="img/arrow-square-left.svg" style="width: 24px; height: 24px;"> Добавить свою задачу</button>
        </div>
        <div class="tags">
            <?php
            $servername = "localhost";
            $username = "Alex";
            $password = "12345";
            $dbname = "triz_data";

            // Создаем соединение
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Проверяем соединение
            if ($conn->connect_error) {
                die("Ошибка соединения: " . $conn->connect_error);
            }

            $sql = "SHOW TABLES";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_row()) {
                    echo '<span onclick="addTagPage(\'' . $row[0] . '\')"> ' . $row[0] . '</span>';
                }
            } else {
                echo "0 результатов";
            }

            // Закрываем соединение
            $conn->close();
            ?>
        </div>

        <div class="main__content">
            <?php
            $servername = "localhost";
            $username = "Alex";
            $password = "12345";
            $dbname = "triz_data";

            // Создаем соединение
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Проверяем соединение
            if ($conn->connect_error) {
                die("Ошибка соединения: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM content";
            $sql = "SELECT *, 'content' AS table_name FROM content";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $imageData = "";  // Инициализируем переменную для хранения данных изображения

                    if ($row["img"]) {
                        $imageData = base64_encode($row["img"]);  // Кодируем изображение в формат base64
                    }

                    echo '
                    <div class="card" onclick="openDetailsPage(' . $row["id"] . ')">
                        <div class="card__content">
                            <div class="card__content__text">
                                <h2>' . $row["title"] . '</h2>
                                <p>' . $row["prev"] . '</p>
                            </div>
                            <img src="data:image/png;base64,' . $imageData . '" alt="Изображение" style="width: 80px; height: 80px;">
                        </div>
                        <div class="card__bottom__content">
                            <div class="card__bottom__content__more" onclick="openDetailsPage(' . $row["id"] . ')">
                                <h5>Подробнее</h5>
                            </div>
                            <article>'. $row['table_name'] . '</article>
                        </div>
                    </div>';
                }
            } else {
                echo "0 результатов";
            }

            // Закрываем соединение
            $conn->close();
            ?>
        </div>
    </div>

    <script>
        function openDetailsPage(cardId) {
            window.location.href = 'details.php?id=' + cardId;
        }

        function addTasksPage() {
            window.location.href = 'form.php';
        }

        function addTagPage(tagName) {
            window.location.href = 'category.php?name=' + tagName;
        }
    </script>

</body>

</html>
