<?php
include 'db_connection.php';

$supercomputer = $_POST['modify_supercomputer_select'];
$new_name = $_POST['new_name'];
$new_location = $_POST['new_location'];
$new_performance = $_POST['new_performance'];
$new_developer = $_POST['new_developer'];

$sql = "UPDATE Supercomputer SET 
        Supercomputer.name = '$new_name', 
        Supercomputer.location = '$new_location', 
        Supercomputer.performance = '$new_performance', 
        Supercomputer.developer = '$new_developer'
        WHERE Supercomputer.computer_id = $supercomputer";

if (mysqli_query($link, $sql)) {
    printf("Успешно обновлен суперкомпьютер %s с новым именем %s, производительностью %s ПФлоп/с, который транспортировали в %s и передали разработку %s\n", 
    $supercomputer, $new_name, $new_performance, $new_location, $new_developer); 
}
else {
    printf("Ошибка выполнения запроса. Код ошибки: %s\n", mysqli_error());
}

mysqli_close($link);
?>