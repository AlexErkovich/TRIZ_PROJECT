<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prosto+One&display=swap" rel="stylesheet">
    <title>TRIZ DATA ADD TASKS</title>
</head>

<body>
    <form id="addTask" action="addTask.php" method="post">
        <p><label for="task_title">Введите название задачи</label></p>
        <p><input id="task_title" style="width: 375px;" type="text" name="title"></p>

        <p><label for="task_description">Введите описание задачи</label></p>
        <p><textarea id="task_description" rows="10" cols="45" name="prev"></textarea></p>

        <p><label for="task_solution">Введите решение задачи</label></p>
        <p><textarea id="task_solution" rows="10" cols="45" name="decision"></textarea></p>

        <p><label for="task_tag">Добавьте категорию задачи</label></p>
        <p><input id="task_tag" style="width: 375px;" type="text" name="tag"></p>

        <p><label for="task_img">Загрузите изображение</label></p>
        <p> <input type="file" multiple formmethod="post" class="input"></p>

        <p><input type="submit" value="Отправить" /></p>
    </form>
</body>

</html>