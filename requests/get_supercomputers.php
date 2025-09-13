<?php
include 'db_connection.php';

$sql = "SELECT * FROM Supercomputer";
$result = mysqli_query($link, $sql);

if (!$result ) {
    printf("Ошибка выполнения запроса. Код ошибки: %s\n", mysqli_error()); 
    exit;
}

$data = array();
while($row = mysqli_fetch_assoc($result)) { 
    $data[] = $row; 
} 

mysqli_close($link); 
echo json_encode($data);
?>