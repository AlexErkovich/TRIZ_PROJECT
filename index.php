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

            // Get a list of all tables in the database
            $sql = "SHOW TABLES";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_row()) {
                    // For each table, fetch and display its content
                    $tableName = $row[0];
                    echo '<div class="table-data">';
                    echo '<h2>Table: ' . $tableName . '</h2>';

                    // Fetch data from the current table
                    $sql = "SELECT * FROM " . $tableName;
                    $tableResult = $conn->query($sql);

                    if ($tableResult->num_rows > 0) {
                        while ($tableRow = $tableResult->fetch_assoc()) {
                            echo '<div class="card">';
                            echo '<div class="card__content">';
                            echo '<div class="card__content__text">';
                            echo '<h3>' . $tableRow["title"] . '</h3>';
                            echo '<p>' . $tableRow["prev"] . '</p>';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                        }
                    } else {
                        echo "0 results in table: " . $tableName;
                    }

                    echo '</div>';
                }
            } else {
                echo "0 results";
            }

            // Close the connection
            $conn->close();
            ?>
        </div>
    </div>

    <script>
        function addTasksPage() {
            window.location.href = 'form.php';
        }
    </script>

</body>

</html>
