<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prosto+One&display=swap" rel="stylesheet">
    <script src="js/script.js"></script>
    <title>Card Details</title>
</head>

<body>
    <div class="main">
        <div class="main__title">
            <?php
            if (isset($_GET['table'])) {
                $tableName = $_GET['table'];
                echo '<h1>Задача по ' . $tableName . '</h1>';
            } else {
                echo '<h1>Задача по истории</h1>';
            }
            ?>
            <button onclick="redirectToIndex()"> <img src="img/arrow_left.svg" style="width:
                                                       24px; height: 24px;"> Назад к задачам </button>
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

            if (isset($_GET['id']) && is_numeric($_GET['id']) && isset($_GET['table'])) {
                $cardId = $_GET['id'];
                $tableName = $_GET['table'];

                $sql = "SELECT * FROM $tableName WHERE id = $cardId";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    echo '<div class="card-details">';
                    echo '<img style="width: 360px;" src="data:image/jpeg;base64,' . base64_encode($row["img"]) . '" alt="Image">';
                    echo '<div class="card-details_content">';
                    echo '<h2>' . $row["title"] . '</h2>';
                    echo '<h4> Описание задачи </h4> <p>' . $row["description"] . '</p>';
                    #echo '<h4> Решение </h3> </4>' . $row["decision"] . '</p>';
                    echo '</div>';
                    echo '</div>';
                } else {
                    echo "No detailed information found for the selected card.";
                }
            } else {
                echo "Invalid card ID or table name.";
            }

            $conn->close();
            ?>
        </div>
        <?php include('footer.php'); ?>
</body>

</html>