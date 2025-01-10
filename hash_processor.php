<?php
// Activer l'affichage des erreurs pour le débogage
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ourproj";

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("Erreur de connexion : " . $conn->connect_error);
}

// Définir un répertoire temporaire pour les fichiers générés
$tempDir = __DIR__ . '/temp';
if (!is_dir($tempDir)) {
    if (!mkdir($tempDir, 0777, true)) {
        die("Erreur : Impossible de créer le répertoire temporaire.");
    }
}

// Vérifier si la méthode de requête est POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullName = htmlspecialchars(trim($_POST['fullName']));
    $email = htmlspecialchars(trim($_POST['email']));
    $hashAlgorithm = $_POST['hashAlgorithm'];
    $salt = !empty($_POST['salt']) ? trim($_POST['salt']) : '';
    $messageToHash = isset($_POST['messageToHash']) ? trim($_POST['messageToHash']) : '';
    $hashResult = null;

    try {
        // Vérifier si un seul champ (message ou fichier) est rempli
        $fileProvided = isset($_FILES['fileToHash']) && $_FILES['fileToHash']['error'] === UPLOAD_ERR_OK;
        $messageProvided = !empty($messageToHash);

        if ($messageProvided && $fileProvided) {
            throw new Exception("Veuillez fournir uniquement un message ou un fichier, pas les deux.");
        }

        if (!$messageProvided && !$fileProvided) {
            throw new Exception("Veuillez fournir soit un message, soit un fichier.");
        }

        // Gestion du contenu à hacher
        if ($messageProvided) {
            // Hachage d'un message
            $contentToHash = $salt . $messageToHash;
            $fileName = "message_hashed.txt";
            $fileContentBase64 = null;
        } else {
            // Hachage d'un fichier
            $fileTmpPath = $_FILES['fileToHash']['tmp_name'];
            $originalFileName = htmlspecialchars($_FILES['fileToHash']['name']);
            $fileName = pathinfo($originalFileName, PATHINFO_FILENAME) . "_hashed.txt";

            // Lire le contenu du fichier
            $fileContent = file_get_contents($fileTmpPath);
            if ($fileContent === false) {
                throw new Exception("Impossible de lire le fichier téléchargé.");
            }
            $contentToHash = $salt . $fileContent;
            $fileContentBase64 = base64_encode($fileContent);
            $messageToHash = null; // Pas de message dans ce cas
        }

        // Vérifier si l'algorithme de hachage est valide
        if (!in_array($hashAlgorithm, hash_algos())) {
            throw new Exception("Algorithme de hachage invalide.");
        }

        // Calculer le hash
        $hashResult = hash($hashAlgorithm, $contentToHash);

        // Insérer les données dans la base de données
        $stmt = $conn->prepare("
            INSERT INTO hash_requests (full_name, email, file_name, file_content, hash_algorithm, salt, hash_result) 
            VALUES (?, ?, ?, ?, ?, ?, ?)
        ");
        $stmt->bind_param(
            "sssssss",
            $fullName,
            $email,
            $fileName,
            $fileContentBase64,
            $hashAlgorithm,
            $salt,
            $hashResult
        );

        if (!$stmt->execute()) {
            throw new Exception("Erreur lors de l'insertion dans la base de données : " . $stmt->error);
        }

        // Créer le fichier temporaire pour téléchargement
        $hashedFilePath = $tempDir . '/' . $fileName;
        $fileHashContent = ($messageProvided ? "Message : $messageToHash\n" : "Nom du fichier : $originalFileName\n")
            . "Algorithme : $hashAlgorithm\n"
            . "Salt : $salt\n"
            . "Hash : $hashResult\n";

        file_put_contents($hashedFilePath, $fileHashContent);

        // Proposer le téléchargement du fichier
        header('Content-Description: File Transfer');
        header('Content-Type: text/plain');
        header('Content-Disposition: attachment; filename="' . $fileName . '"');
        header('Content-Length: ' . filesize($hashedFilePath));
        readfile($hashedFilePath);

        // Supprimer le fichier temporaire après téléchargement
        unlink($hashedFilePath);
        exit;
    } catch (Exception $e) {
        echo "Erreur : " . $e->getMessage();
    }
} else {
    echo "Méthode de requête invalide. Veuillez utiliser le formulaire.";
}

// Fermer la connexion à la base de données
$conn->close();
?>
