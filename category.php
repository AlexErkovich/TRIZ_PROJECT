<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prosto+One&display=swap" rel="stylesheet">
    <title>Card Details</title>
</head>


<body>
    <div class="main">
        <div class="main__title">
            <h1>Здесь будет подтягиваться название таблицы</h1>
            <button onclick="redirectToIndex()"> <img src="img/arrow_left.svg" style="width: 24px; height: 24px;"> Назад к задачам </button>
        </div>

        <div class="main__content">
            <?php
            $servername = "localhost";
            $username = "Alex";
            $password = "12345";
            $dbname = "triz_data";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }


            //Данный код представляет собой фрагмент PHP-кода, который проверяет, есть ли параметр id в URL 
            //(через GET-запрос) и является ли он числовым значением. В дальнейшем это значение используется в коде.

            //isset($_GET['id']): Эта конструкция проверяет, существует ли параметр с именем 'id'
            //в URL через GET-запрос. $_GET - это ассоциативный массив, который содержит все параметры, переданные через GET-запрос. isset возвращает true, если параметр 'id' существует в запросе.

            //is_numeric($_GET['id']): Этот код проверяет, является ли значение параметра 'id' числовым. Функция
            //is_numeric возвращает true, если значение является числом, и false в противном случае.

            //Если оба условия выполняются (то есть параметр 'id' существует и является числом), 
            //то переменной $cardId присваивается значение параметра 'id' из GET-запроса. 
            //Это позволяет использовать $cardId в дальнейшем коде для обработки запроса с указанным идентификатором.

            $sql = "SELECT * FROM history";
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
        function redirectToIndex() {
            window.location.href = 'index.php';
        }
    </script>
</body>

</html>