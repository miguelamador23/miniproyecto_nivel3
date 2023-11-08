<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tmp_name = $_FILES['imagen']['tmp_name'];

    $contenido = addslashes(file_get_contents($tmp_name));

    require_once '../config/database.php';
    $mysqli->query("INSERT INTO usuarios (img_blob) VALUES ('$contenido')");

    echo 'imagen subida con exito';

}
