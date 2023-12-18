<?php
require_once('../config/database.php');
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: /code/index.php");
    exit();
}

$userId = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newName = $_POST['new_name'];
    $newBio = $_POST['new_bio'];
    $newEmail = $_POST['new_email'];
    $newPassword = isset($_POST['edit_mode']) ? $_POST['new_password'] : $_POST['current_password'];
    $newPhone = $_POST['new_phone'];


    if ($newEmail === '') {
        $newEmail = null;
    }

    $sqlUpdate = "UPDATE usuarios SET Name=?, Bio=?, Email=?, Password=?, Phone=? WHERE id=?";
    $stmtUpdate = $mysqli->prepare($sqlUpdate);

    if (!$stmtUpdate) {
        echo "Error en la preparación de la consulta: " . $mysqli->error;
        exit();
    }

    $stmtUpdate->bind_param("sssssi", $newName, $newBio, $newEmail, $newPassword, $newPhone, $userId);

    $resultUpdate = $stmtUpdate->execute();

    if ($resultUpdate) {
        header("Location: personal_info.php");
        exit();
    } else {
        echo "Error al actualizar la información: " . $stmtUpdate->error;
    }

    $stmtUpdate->close();
}
?>
