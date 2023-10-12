
// Функция 
function showTableContent(tableName) {
  // Выполняем AJAX-запрос для загрузки задач по выбранной таблице
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
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
  var tagsBlock = document.getElementById("tagsBlock");
  if (tagsBlock.style.display === "none" || tagsBlock.style.display === "") {
    tagsBlock.style.display = "block";
  } else {
    tagsBlock.style.display = "none";
  }
}

// Функция для открытия страницы с подробной информацией о задаче
function openDetailsPage(cardId, tableName) {
  window.location.href = "details.php?id=" + cardId + "&table=" + tableName;
}

// Функция для перехода на страницу добавления новой задачи
function addTasksPage() {
  window.location.href = "form.php";
}

// Функция для перехода на страницу с задачами по определенному тегу
function addTagPage(tagName) {
  window.location.href = "category.php?name=" + tagName;
}

// Функция для перехода по адресу сайта
function openSait() {
  window.open("https://a45.site/", "_blank");
}

// Функция для перехода на страницу
function redirectToIndex() {
  window.location.href = 'index.php';
}