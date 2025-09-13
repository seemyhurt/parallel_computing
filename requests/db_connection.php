<?php

$link = mysqli_connect( 
    "localhost",
    "root",
    "",
    "parallel_computing"
);


if (!$link ) {
    printf("Невозможно подключиться к базе данных: %s\n", mysqli_connect_error()); 
}
?>
