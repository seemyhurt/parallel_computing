<?php
include 'db_connection.php';

$project = $_POST['modify_project_select'];
$supercomputer = $_POST['modify_project_supercomputer_select'];
$new_code_name = $_POST['new_code_name'];
$new_description = $_POST['new_description'];
$new_project_developer = $_POST['new_project_developer'];
$new_scope = $_POST['new_scope'];
$new_date_begin = $_POST['new_date_begin'];

$sql = "UPDATE Project SET 
        computer_id = '$supercomputer', 
        code_name = '$new_code_name', 
        description = '$new_description', 
        project_developer = '$new_project_developer',
        scope = '$new_scope',
        date_begin = '$new_date_begin'
        WHERE project_id = $project";

if (mysqli_query($link, $sql)) {
    printf(
        "<div style='color: green; font-weight: bold; font-size: 1.2em;'>
            🎉 Проект <em>ID #%s</em> успешно обновлен!
        </div>
        
        <ul>
            <li>Новое кодовое название: <em>%s</em></li>
            <li>Описание: <em>%s</em></li>
            <li>Разработчик: <em>%s</em></li>
            <li>Область применения: <em>%s</em></li>
            <li>Дата начала: <em>%s</em></li>
            <li>Суперкомпьютер ID: <em>%s</em></li>
        </ul>",
        $project, $new_code_name, $new_description,
        $new_project_developer, $new_scope, $new_date_begin,
        $supercomputer
    );
} else {
    printf(
        "<div style='color: red; font-weight: bold;'>
            ❌ Ошибка обновления проекта. Код ошибки: %s
        </div>",
        mysqli_error($link)
    );
}

mysqli_close($link);
?>