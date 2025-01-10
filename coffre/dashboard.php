<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}

$conn = new mysqli('localhost', 'root', '', 'coffre_fort');

// Récupérer les fichiers de l'utilisateur connecté
$user_id = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT * FROM files WHERE user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$files = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mon Coffre-Fort</title>
    <link rel="stylesheet" href="stylesdash.css">
</head>
<body>

    <div class="container">
        <h1>Bienvenue dans votre Coffre-Fort</h1>

        <!-- Formulaire pour importer des fichiers -->
        <div class="card">
            <form id="uploadForm" method="POST" enctype="multipart/form-data" action="upload.php">
                <h3>Importe vos fichiers :</h3>
                <input type="file" name="files[]" multiple required>
                <button type="submit">Importer</button>
            </form>
        </div>

        <!-- Liste des fichiers de l'utilisateur -->
        <?php if ($files->num_rows > 0): ?>
            <div class="card">
                <h3>Vos fichiers :</h3>
                <ul>
                    <?php while ($file = $files->fetch_assoc()): ?>
                        <li>
                            <div class="file-name"><?php echo htmlspecialchars($file['original_name']); ?></div>
                            <div class="file-actions">
                                <a href="download.php?id=<?php echo $file['id']; ?>" class="download-btn">Télécharger</a>
                                <a href="delete.php?id=<?php echo $file['id']; ?>" class="delete-btn" style="color: red">Supprimer</a>
                            </div>
                        </li>
                    <?php endwhile; ?>
                </ul>
            </div>
        <?php endif; ?>

        <a href="logout.php">Se déconnecter</a>
    </div>
</body>
</html>