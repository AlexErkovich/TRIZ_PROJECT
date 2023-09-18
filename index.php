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

    <?php
    $servername = "localhost"; // Имя сервера базы данных
    $username = "Alex"; // Имя пользователя базы данных
    $password = "12345"; // Пароль пользователя
    $dbname = "triz_data"; // Имя базы данных
    
    // Создаем соединение
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Проверяем соединение
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    ?>


    <div class="main">

        <?php

        // Выполнение запроса к базе данных
        $sql = "SELECT * FROM content";
        $result = $conn->query($sql);


        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '  

            <div class="card">
                <div class="card__content">
                    <div class="card__content__text">
                    <h2>' . $row["title"] . '</h2>
                        <p>' . $row["prev"] . '</p>
                       </div>
                       <img style=" width: 72px; height: 72px;" src="data:image/jpeg;base64,' . base64_encode($row["img"]) . '">
                </div>
                <div class="card__bottom__content">
                    <div class="card__bottom__content__more">
                        <img src="img/Icone-tag__icone.svg" style="width: 32px; height: 32px;">
                        <span>Подробнее</span>
                    </div>
                    <article>' . $row["tag"] . '</article>
                </div>
            </div>
        </div>';
            }
        } else {
            echo "0 результатов";
        }
        // Закрываем соединение с базой данных
        $conn->close();
        ?>        
    </div>

    <a href="form.php"><button>Добавить свою задачу</button></a>
</body>

</html>