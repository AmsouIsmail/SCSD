<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}

$conn = new mysqli('localhost', 'root', '', 'coffre_fort');

// Vérifier si l'ID du fichier est passé en paramètre
if (isset($_GET['id'])) {
    $file_id = $_GET['id'];
    $user_id = $_SESSION['user_id'];

    // Supprimer le fichier de la base de données
    $stmt = $conn->prepare("SELECT * FROM files WHERE id = ? AND user_id = ?");
    $stmt->bind_param("ii", $file_id, $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $file = $result->fetch_assoc();
        $file_path = $file['file_path']; // Assurez-vous que vous avez un champ 'file_path' pour localiser le fichier

        // Supprimer le fichier physique du serveur
        if (file_exists($file_path)) {
            unlink($file_path);
        }

        // Supprimer le fichier de la base de données
        $stmt = $conn->prepare("DELETE FROM files WHERE id = ?");
        $stmt->bind_param("i", $file_id);
        $stmt->execute();

        // Rediriger après la suppression
        header('Location: dashboard.php');
        exit;
    } else {
        echo "Fichier non trouvé ou non autorisé.";
    }
} else {
    echo "ID de fichier manquant.";
}
?>
