<section id="layer2" class="content__main__project">
        <?php
       
        if (isset($_GET['table'])) {
            $tableName = $_GET['table'];
        } else {
            echo '<h1></h1>';
        }

        if (isset($_GET['id']) && is_numeric($_GET['id']) && isset($_GET['table'])) {
            $cardId = $_GET['id'];
            $tableName = $_GET['table'];

            $sql = "SELECT * FROM $tableName WHERE id = $cardId";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo '<div class="card__details">';
                echo ' <img src="data:image/jpeg;base64,' . base64_encode($row["img"]) . '" style="width: 100%; height: fit-content; border-radius:16px;" alt="Изображение">';
                echo '<h2>' . $row["title"] . '</h2>';
                echo '<p>' . $row["content"] . '</p>';
                echo ' <img src="data:image/jpeg;base64,' . base64_encode($row["img_img"]) . '" style="width: 100%; height: fit-content; border-radius:16px;" alt="Изображение">';
                echo '</div>';
            } else {
                echo "Информация о выбранной карте не найдена.";
            }
        } else {
            echo "Неверный идентификатор карты или название таблицы.";
        }

        $conn->close();
        ?>
        
    </section>

    <script>
        let menuBtn = document.querySelector('.menu-btn');
        let menu = document.querySelector('.mobile-menu');
        menuBtn.addEventListener('click', function() {
            menu.classList.toggle('active');
        })
    </script>
</body>

</html>