// Функция для получения cookie
function getCookie(name) {
    let matches = document.cookie.match(new RegExp(
        "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
    ));
    return matches ? decodeURIComponent(matches[1]) : undefined;
}

// Функция для установки cookie
function setCookie(name, value, days) {
    let date = new Date();
    date.setTime(date.getTime() + (days*24*60*60*1000));
    let expires = "; expires=" + date.toUTCString();
    document.cookie = name + "=" + (value || "")  + expires + "; path=/";
}

// Функция для обновления истории просмотра
function updateHistory() {
    let pageName = window.location.pathname.split("/").pop();
    let sessionHistory = JSON.parse(localStorage.getItem("sessionHistory") || "{}");
    let allTimeHistory = JSON.parse(getCookie("allTimeHistory") || "{}");

    sessionHistory[pageName] = (sessionHistory[pageName] || 0) + 1;
    allTimeHistory[pageName] = (allTimeHistory[pageName] || 0) + 1;

    localStorage.setItem("sessionHistory", JSON.stringify(sessionHistory));
    setCookie("allTimeHistory", JSON.stringify(allTimeHistory), 365);

    if (pageName === "history.html") {
        displayHistory("sessionHistory", sessionHistory);
        displayHistory("allTimeHistory", allTimeHistory);
    }
}

// Функция для отображения истории просмотра
function displayHistory(tableId, history) {
    let table = $("#" + tableId);
    table.html("<tr><th>Страница</th><th>Количество посещений</th></tr>");
    $.each(history, function(page, count) {
        let row = $("<tr></tr>").appendTo(table);
        $("<td></td>").text(page).appendTo(row);
        $("<td></td>").text(count).appendTo(row);
    });
}

// Вызов функции обновления истории просмотра при загрузке страницы
$(document).ready(updateHistory);
