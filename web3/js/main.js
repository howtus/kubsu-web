$(document).ready(function () {
    // Заполняем список для года рождения значениями
    let currentYear = new Date().getFullYear();
    for (var i = currentYear - 6; i >= currentYear - 65; i--) {
        let child = document.createElement("option");
        child.innerHTML = i.toString();
        child.value = i;
        $("#age-select").append(child);
    }
    // Обрабатываем нажатие кнопки отправки
    $("#btn").click(function(e) {
        // e.preventDefault();
        // $("#btn").toggleClass("is-loading");
        // console.log("CLICKED", e);
    });
});