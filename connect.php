<?php
    $server = 'localhost';
    $user = 'root';
    $pass = '';
    $database = 'banhoa';

    $conn = new mysqli($server, $user, $pass, $database);
    // hàm kiểm tra
    // if ($conn->connect_error) {
    //     die("Connection failed: " . $conn->connect_error);
    // }
    // echo "Connected successfully";

?>