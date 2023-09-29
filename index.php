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

            $conn = new mysqli($servername, $username, $password, $dbname);

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

            $conn->close();
            ?>
        </div>

        <div class="main__content">
            <?php
            $servername = "localhost";
            $username = "Alex";
            $password = "12345";
            $dbname = "triz_data";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Ошибка соединения: " . $conn->connect_error);
            }

            $sql = "SHOW TABLES";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_row()) {
                    $table_name = $row[0];

                    $sql_select = "SELECT * FROM $table_name";
                    $result_select = $conn->query($sql_select);

                    if ($result_select->num_rows > 0) {
                        while ($tableRow = $result_select->fetch_assoc()) {
                            $imageData = "";
                            if ($tableRow["img"]) {
                                $imageData = base64_encode($tableRow["img"]);
                            }

                            echo '
                    <div class="card" onclick="openDetailsPage(' . $tableRow["id"] . ',\'' . $table_name . '\')">
                        <div class="card__content">
                            <div class="card__content__text">
                                <h2>' . $tableRow["title"] . '</h2>
                                <p>' . $tableRow["prev"] . '</p>
                            </div>
                            <img src="data:image/png;base64,' . $imageData . '" alt="Изображение" style="width: 80px; height: 80px;">
                        </div>
                        <div class="card__bottom__content">
                            <div class="card__bottom__content__more">
                                <h5>Подробнее</h5>
                            </div>
                            <article>' . $table_name . '</article>
                        </div>
                    </div>';
                        }
                    } else {
                        echo "0 результатов";
                    }
                }
            } else {
                echo "0 результатов";
            }

            $conn->close();
            ?>

        </div>
    </div>
    <script>
        function openDetailsPage(cardId, tableName) {
            window.location.href = 'details.php?id=' + cardId + '&table=' + tableName;
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
