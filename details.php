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
<a href="index.php"><button class="add">Назад к задачам</button></a>
    <?php
    $servername = "localhost";
    $username = "Alex";
    $password = "12345";
    $dbname = "triz_data";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $cardId = $_GET['id'];

        $sql = "SELECT * FROM content WHERE id = $cardId";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo '<div class="card-details">';
            echo '<h2>' . $row["title"] . '</h2>';
            echo '<h3> Решение </h3> <p>' . $row["decision"] . '</p>';
            echo '<p>' . $row["prev"] . '</p>';
            echo '<p>' . $row["decision"] . '</p>';
            echo '</div>';
        } else {
            echo "No detailed information found for the selected card.";
        }
    } else {
        echo "Invalid card ID.";
    }

    $conn->close();
    ?>

</body>

</html>
