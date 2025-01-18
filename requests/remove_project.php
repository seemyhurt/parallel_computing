<?php
include 'db_connection.php';

$project = $_POST['remove_project_select'];

$sql = "DELETE FROM Project WHERE project_id = ?";
$stmt = mysqli_prepare($link, $sql);

if ($stmt) {
    mysqli_stmt_bind_param($stmt, 'i', $project);
    if (mysqli_stmt_execute($stmt)) {
        printf(
            "<div style='color: green; font-weight: bold;'>
                🗑️ Проект с ID #%s успешно удален.
            </div>", $project);
    } else {
        printf(
            "<div style='color: red; font-weight: bold;'>
                ❌ Ошибка при удалении проекта. Код ошибки: %s
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