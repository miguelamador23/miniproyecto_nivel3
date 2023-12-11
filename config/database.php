<?php
try {
    $db_host = "127.0.0.1";
    $db_username = "root";
    $db_password = "";
    $db_name = "login_db";
    $db_port = 3306;

    $mysqli = new mysqli($db_host, $db_username, $db_password, $db_name, $db_port);

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
