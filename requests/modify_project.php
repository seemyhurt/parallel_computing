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
        Project.computer_id = '$supercomputer', 
        Project.code_name = '$new_code_name', 
        Project.description = '$new_description', 
        Project.project_developer = '$new_project_developer',
        Project.scope = '$new_scope',
        Project.date_begin = '$new_date_begin'
        WHERE Project.project_id = $project";

if (mysqli_query($link, $sql)) {
    printf("Успешно обновлен проект %s с новым покодым названием %s по %s разработчика %s в области %s, который стартует %s\n", 
    $project, $new_code_name, $new_description, $new_project_developer, $new_scope, $new_date_begin); 
}
else {
    printf("Ошибка выполнения запроса. Код ошибки: %s\n", mysqli_error());
}


mysqli_close($link);
?>