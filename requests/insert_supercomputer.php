<?php
include 'db_connection.php';

$name = $_POST['name'];
$location = $_POST['location'];
$performance = $_POST['performance'];
$developer = $_POST['developer'];

$sql = "INSERT INTO Supercomputer (name, location, performance, developer) 
    VALUES ('$name', '$location', '$performance', '$developer')";

if (mysqli_query($link, $sql)) {
    printf(
        "<div style='color: green; font-weight: bold; font-size: 1.2em;'>
            🎉 Суперкомпьютер <em>%s</em> успешно добавлен!
        </div>
        <ul>
            <li>Производительность: <em>%s ПФлоп/с</em></li>
            <li>Расположение: <em>%s</em></li>
            <li>Разработчик: <em>%s</em></li>
        </ul>",
        $name, 
        $performance, 
        $location, 
        $developer
    );
} else {
    printf(
        "<div style='color: red; font-weight: bold;'>
            ❌ Ошибка добавления суперкомпьютера. Код ошибки: %s
        </div>",
        mysqli_error($link)
    );
}

mysqli_close($link);
?>