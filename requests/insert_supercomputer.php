<?php
include 'db_connection.php';

$name = $_POST['name'];
$location = $_POST['location'];
$performance = $_POST['performance'];
$developer = $_POST['developer'];

$sql = "INSERT INTO Supercomputer (name, location, performance, developer) VALUES ('$name', '$location', '$performance', '$developer')";

if (mysqli_query($link, $sql)) {
    printf("Успешно добавлен суперкомпьютер %s производительностью %s ПФлоп/с, который расположен в %s и разработан %s\n", 
    $name, $performance, $location, $developer); 
}
else {
    printf("Ошибка выполнения запроса. Код ошибки: %s\n", mysqli_error());
}

mysqli_close($link);
?>