Чтобы вместо $row["id"] подтягивать названия таблиц из базы данных в тег <span>, мы должны 
изменить запрос к базе данных, чтобы выбирать не id, а названия таблиц. Вам нужно иметь в виду, 
что в этом примере я использую таблицу с названием "history", и вы должны адаптировать его под вашу 
конкретную базу данных и таблицы.


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

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
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

        function addTagPage(tagName) {
            window.location.href = 'category.php?name=' + tagName;
        }
    </script>

</body>

</html>
В этом примере я использовал SHOW TABLES для получения списка таблиц в базе данных и передал название таблицы в функцию addTagPage() при клике на <span>.




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


            $sql = "SELECT * FROM history, content";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<span onclick="addTagPage(' . $row["id"] . ')"> ' . $row["id"] . '</span>';
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

        function addTagPage(tagId) {
            window.location.href = 'category.php?id=' + tagId;
        }
    </script>

</body>

</html>
