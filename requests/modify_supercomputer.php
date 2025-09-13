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
    printf(
        "<div style='color: green; font-weight: bold; font-size: 1.2em;'>
            🎉 Суперкомпьютер <em>ID #%s</em> успешно обновлен!
        </div>
        <ul>
            <li>Новое название: <em>%s</em></li>
            <li>Новая производительность: <em>%s ПФлоп/с</em></li>
            <li>Новое расположение: <em>%s</em></li>
            <li>Новый разработчик: <em>%s</em></li>
        </ul>",
        $supercomputer, $new_name, $new_performance,
        $new_location, $new_developer
    );
} else {
    printf(
        "<div style='color: red; font-weight: bold;'>
            ❌ Ошибка обновления суперкомпьютера. Код ошибки: %s
        </div>",
        mysqli_error($link)
    );
}

mysqli_close($link);
?>