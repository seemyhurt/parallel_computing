<?php
include 'db_connection.php';

$supercomputer = $_POST['supercomputer_select'];
$code_name = $_POST['code_name'];
$description = $_POST['description'];
$project_developer = $_POST['project_developer'];
$scope = $_POST['scope'];
$date_begin = $_POST['date_begin'];

$sql = "INSERT INTO Project (code_name, description, project_developer, scope, date_begin, computer_id) 
        VALUES ('$code_name', '$description', '$project_developer', '$scope', '$date_begin', '$supercomputer')";

if (mysqli_query($link, $sql)) {
    printf("Успешно добавлен проект %s по %s разработчика %s в области %s, который стартует %s\n", 
    $code_name, $description, $project_developer, $scope, $date_begin); 
}
else {
    printf("Ошибка выполнения запроса. Код ошибки: %s\n", mysqli_error());
}

mysqli_close($link);
?>