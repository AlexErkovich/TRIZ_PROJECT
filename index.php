<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
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
            <!--<span onclick="addTagPage()" id="history"> history</span> Этот код оставил для-->
           
            <?php
            $servername = "localhost";
            $username = "Alex";
            $password = "12345";
            $dbname = "triz_data";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }


            $sql = "SELECT * FROM history";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '
                    <span  onclick="addTagPage()"> ' . $row["id"] . '</span>
                ';
                }
            } else {
                echo "0 результатов";
            }

            // Close the connection
            $conn->close();
            ?>
        </div>

        <div class="main__content">
            <?php
            $servername = "localhost";
            $username = "Alex";
            $password = "12345";
            $dbname = "triz_data";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }


            // Execute the SQL query
            //Этот код представляет собой фрагмент PHP-кода, который выполняет следующие действия:
            //1. Проверяет, есть ли какие-то строки (записи) в результате выполнения запроса к базе данных (предположительно, запрос на выборку данных).
            //Если результат запроса содержит одну или более строк, то происходит вход в блок кода, представленный фигурными скобками {}.
            //Внутри этого блока кода происходит цикл while, который будет выполняться для каждой строки в результирующем наборе данных.
            //Внутри цикла каждая строка (ряд) данных из результирующего набора извлекается и сохраняется в переменную $row.
            //Для каждой строки данных в результирующем наборе происходит вывод содержимого переменной $row с помощью echo.
            //Таким образом, этот код предполагает вывод данных из результирующего набора в виде текста или HTML
            //(в зависимости от того, что находится в переменной $row).
            //Исправления:
            //Поправлено имя переменной $database на $dbname в строке подключения к базе данных.
            //Добавлен атрибут alt для изображения, чтобы предоставить текстовое описание изображения для доступности.
            //Заменен пустой атрибут img на атрибут src с пустым значением для изображения в теге img.
            //Удалены лишние комментарии и приведена более читабельная структура кода.

            $sql = "SELECT * FROM content";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '
                <div class="card" onclick="openDetailsPage(' . $row["id"] . ')">
                    <div class="card__content">
                        <div class="card__content__text">
                            <h2>' . $row["title"] . '</h2>
                            <p>' . $row["prev"] . '</p>
                        </div>
                        <img src="your_image_path_here" style="width: 72px; height: 72px;" alt="Image">
                    </div>
                    <div class="card__bottom__content">
                        <div class="card__bottom__content__more" onclick="openDetailsPage(' . $row["id"] . ')">
                            <img src="img/Icone-tag__icone.svg" style="width: 32px; height: 32px;" alt="Tag Icon">
                            <h5>Подробнее</h5>
                        </div>
                        <article>' . $row["tag"] . '</article>
                    </div>
                </div>';
                }
            } else {
                echo "0 результатов";
            }

            // Close the connection
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

        function addTagPage() {
            window.location.href = 'category.php?id=' + tagID;
        }
    </script>

</body>

</html>