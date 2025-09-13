<?php
include 'db_connection.php';

$supercomputer = $_POST['remove_supercomputer_select'];

$sql = "DELETE FROM Supercomputer WHERE computer_id = ?";
$stmt = mysqli_prepare($link, $sql);

if ($stmt) {
    mysqli_stmt_bind_param($stmt, 'i', $supercomputer);
    if (mysqli_stmt_execute($stmt)) {
        printf(
            "<div style='color: green; font-weight: bold;'>
                🗑️ Суперкомпьютер с ID #%s успешно удален.
            </div>", $supercomputer);
    } else {
        printf(
            "<div style='color: red; font-weight: bold;'>
                ❌ Ошибка при удалении суперкомпьютера. Код ошибки: %s
            </div>", mysqli_stmt_error($stmt));
    }
    mysqli_stmt_close($stmt);
} else {
    printf(
        "<div style='color: red; font-weight: bold;'>
            ❌ Не удалось подготовить запрос. Код ошибки: %s
        </div>", mysqli_error($link));
}

mysqli_close($link);
?>