<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "parallel_computing";

$link = mysqli_connect( 
    $hostname,
    $username,
    $password,
    $dbname
);


if (!$link ) {
    printf("Невозможно подключиться к базе данных. Код ошибки: %s\n", mysqli_connect_error()); 
    exit;
}
?>
