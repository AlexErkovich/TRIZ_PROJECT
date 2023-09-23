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
            <h1>Задача по истории</h1>
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

            if (isset($_GET['id']) && is_numeric($_GET['id'])) {
                $cardId = $_GET['id'];

                $sql = "SELECT * FROM content WHERE id = $cardId";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    echo '<div class="card-details">';
                    echo '<h2>' . $row["title"] . '</h2>';
                    echo '<h3> Описание задачи </h3> <p>' . $row["decision"] . '</p>';
                    echo '<p>' . $row["prev"] . '</p>';
                    echo '<h3> Решение </h3> <p>' . $row["decision"] . '</p>';
                    echo '</div>';
                } else {
                    echo "No detailed information found for the selected card.";
                }
            } else {
                echo "Invalid card ID.";
            }

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