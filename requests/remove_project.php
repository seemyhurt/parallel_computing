<?php
include 'db_connection.php';

$project = $_POST['remove_project_select'];
$sql = "DELETE FROM Project WHERE Project.project_id = '$project'";

if (mysqli_query($link, $sql) ) {
    printf("Проект %s успешно удален", $project); 
}
else {
    printf("Ошибка выполнения запроса. Код ошибки: %s\n", mysqli_error()); 
}

mysqli_close($link);
?>