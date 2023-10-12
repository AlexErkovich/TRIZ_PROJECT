<!DOCTYPE html>
<html>

<head>
    <!-- Устанавливаем кодировку символов -->
    <meta charset="UTF-8">
    <!-- Оптимизируем отображение на мобильных устройствах -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Подключаем файл стилей -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Предзагружаем шрифты для ускорения загрузки страницы -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prosto+One&display=swap" rel="stylesheet">
    <script src="js/script.js"></script>
    <!-- Устанавливаем заголовок страницы -->
    <title>TRIZ DATA TASKS</title>

</head>

<body>
    <!-- Создаем основной контейнер страницы -->
    <div class="main">
        <!-- Заголовок страницы -->
        <div class="main__title">
            <h1>ТРИЗ ЗАДАЧИ</h1>
            <div class="tags_title-filtr">
                <!-- Заголовок фильтра -->
                <h3 onclick="toggleTagsVisibility()">Filtr</h3>
                <img src="img/filter.svg" style="width: 32px; height: 32px;" onclick="toggleTagsVisibility()">
            </div>
            <!-- Кнопка для добавления новой задачи 
            <button onclick="addTasksPage()">
                <img src="img/add.svg" style="width: 24px; height: 24px;"> Добавить свою задачу
            </button>-->

        </div>
        <!-- Фильтр задач -->
        <div class="filtr">

            <!-- Блок с тегами -->
            <div class="tags" id="tagsBlock">
                <?php
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

                // Получаем список таблиц в базе данных
                $sql = "SHOW TABLES";
                $result = $conn->query($sql);

                // Проверяем наличие результатов
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_row()) {
                        // Проверка на название "reception" и "public relations"
                        if ($row[0] !== 'reception' && $row[0] !== 'public relations') {
                            // Выводим теги на страницу
                            echo '<span onclick="showTableContent(\'' . $row[0] . '\')"> ' . $row[0] . '</span>';
                        }
                    }
                } else {
                    echo "0 результатов";
                }

                // Закрываем соединение с базой данных
                $conn->close();
                ?>

            </div>
        </div>

        <!-- Блок с контентом задач -->
        <div class="main__content" id="mainContent">
            <!-- Содержимое таблицы будет загружено сюда -->
        </div>
    </div>
    <?php include('footer.php'); ?>
</body>

</html>