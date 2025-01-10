<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['files'])) {
    $conn = new mysqli('localhost', 'root', '', 'coffre_fort');
    $user_id = $_SESSION['user_id'];
    $uploadDir = 'uploads/' . $user_id . '/';

    // Créer un dossier unique pour l'utilisateur, s'il n'existe pas
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    foreach ($_FILES['files']['tmp_name'] as $key => $tmp_name) {
        $original_name = $_FILES['files']['name'][$key];
        $stored_name = uniqid() . '_' . basename($original_name);
        $uploadFile = $uploadDir . $stored_name;

        if (move_uploaded_file($tmp_name, $uploadFile)) {
            $stmt = $conn->prepare("INSERT INTO files (user_id, original_name, stored_name) VALUES (?, ?, ?)");
            $stmt->bind_param("iss", $user_id, $original_name, $stored_name);
            $stmt->execute();
        }
    }

    header('Location: dashboard.php');
    exit;
}
?>
