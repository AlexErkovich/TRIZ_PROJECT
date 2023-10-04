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
    <!-- Устанавливаем заголовок страницы -->
    <title>TRIZ DATA TASKS</title>
</head>

<body>
    <!-- Создаем основной контейнер страницы -->
    <div class="main">
        <!-- Заголовок страницы -->
        <div class="main__title">
            <h1>TASKS</h1>
            <!-- Кнопка для добавления новой задачи -->
            <button onclick="addTasksPage()">
                <img src="img/arrow-square-left.svg" style="width: 24px; height: 24px;"> Добавить свою задачу
            </button>
            <!-- Иконка для добавления новой задачи -->
            <img onclick="addTasksPage()" src="img/add.svg">
        </div>
        <!-- Фильтр задач -->
        <div class="filtr">
            <div class="tags_title-filtr">
                <!-- Заголовок фильтра -->
                <h3>Filtr</h5>
                    <!-- Иконка для отображения/скрытия тегов -->
                    <img src="img/filtr.svg" style="width: 32px; height: 32px;" onclick="toggleTagsVisibility()">
            </div>
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
                        // Выводим теги на страницу
                        echo '<span onclick="showTableContent(\'' . $row[0] . '\')"> ' . $row[0] . '</span>';
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

    <!-- Скрипты JavaScript -->
    <script>
        function showTableContent(tableName) {
            // Выполняем AJAX-запрос для загрузки задач по выбранной таблице
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    // Обновляем блок с контентом задач
                    document.getElementById("mainContent").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "get_tasks_by_table.php?table=" + tableName, true);
            xhttp.send();
        }

        // Функция для переключения видимости тегов
        function toggleTagsVisibility() {
            var tagsBlock = document.getElementById('tagsBlock');
            if (tagsBlock.style.display === 'none' || tagsBlock.style.display === '') {
                tagsBlock.style.display = 'block';
            } else {
                tagsBlock.style.display = 'none';
            }
        }

        // Функция для открытия страницы с подробной информацией о задаче
        function openDetailsPage(cardId, tableName) {
            window.location.href = 'details.php?id=' + cardId + '&table=' + tableName;
        }

        // Функция для перехода на страницу добавления новой задачи
        function addTasksPage() {
            window.location.href = 'form.php';
        }

        // Функция для перехода на страницу с задачами по определенному тегу
        function addTagPage(tagName) {
            window.location.href = 'category.php?name=' + tagName;
        }
    </script>
</body>
<?php include('footer.php'); ?>

</html>
