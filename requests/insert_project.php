<?php
include 'db_connection.php';

$supercomputer = $_POST['supercomputer_select'];
$code_name = $_POST['code_name'];
$description = $_POST['description'];
$project_developer = $_POST['project_developer'];
$scope = $_POST['scope'];
$date_begin = $_POST['date_begin'];

$sql = "INSERT INTO Project (
    code_name, description, project_developer, 
    scope, date_begin, computer_id
) 
VALUES (
    '$code_name', '$description', '$project_developer', 
    '$scope', '$date_begin', '$supercomputer'
)";

if (mysqli_query($link, $sql)) {
    printf(
        "<div style='color: green; font-weight: bold; font-size: 1.2em;'>
            🎉 Проект <em>%s</em> успешно добавлен!
        </div>
        <ul>
            <li>Описание: <em>%s ПФлоп/с</em></li>
            <li>Разработчик: <em>%s</em></li>
            <li>Область применения: <em>%s</em></li>
            <li>Дата начала: <em>%s</em></li>
        </ul>",
        $code_name, $description, $project_developer, 
        $scope, $date_begin
    );
} else {
    printf(
        "<div style='color: red; font-weight: bold;'>
            ❌ Ошибка добавления проекта. Код ошибки: %s
        </div>", mysqli_error($link)
    );
}

mysqli_close($link);
?>