<?php
include 'db_connection.php';

$supercomputer = $_POST['remove_supercomputer_select'];
$sql = "DELETE FROM Supercomputer WHERE Supercomputer.computer_id = '$supercomputer'";

if (mysqli_query($link, $sql) ) {
    printf("Компьютер %s успешно удален", $supercomputer); 
}
else {
    printf("Ошибка выполнения запроса. Код ошибки: %s\n", mysqli_error()); 
}

mysqli_close($link);
?>