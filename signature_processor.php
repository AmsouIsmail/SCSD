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
if ($conn->connect_error) {
    die("Erreur de connexion : " . $conn->connect_error);
}

// Définir un répertoire temporaire
$tempDir = __DIR__ . '/temp';
if (!is_dir($tempDir) && !mkdir($tempDir, 0777, true)) {
    die("Erreur : Impossible de créer le répertoire temporaire.");
}

// Vérifier si la requête est POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $action = $_POST['action'];
        $fullName = htmlspecialchars(trim($_POST['fullName']));
        $email = htmlspecialchars(trim($_POST['email']));

        if ($action === 'sign') {
            // Gestion pour Signer
            $hashAlgorithm = $_POST['hashAlgorithm'];
            $fileToSign = $_FILES['fileToSign'];

            if (!$fileToSign || $fileToSign['error'] !== UPLOAD_ERR_OK) {
                throw new Exception("Erreur lors du téléchargement du fichier à signer.");
            }

            $filePath = $tempDir . '/' . basename($fileToSign['name']);
            move_uploaded_file($fileToSign['tmp_name'], $filePath);
            $fileContent = file_get_contents($filePath);

            $hashResult = hash($hashAlgorithm, $fileContent);

            // Stocker dans la base de données
            $stmt = $conn->prepare("
                INSERT INTO signatures (full_name, email, hash_algorithm, file_name, hash_result) 
                VALUES (?, ?, ?, ?, ?)
            ");
            $stmt->bind_param("sssss", $fullName, $email, $hashAlgorithm, basename($filePath), $hashResult);

            if (!$stmt->execute()) {
                throw new Exception("Erreur d'insertion dans la table signatures : " . $stmt->error);
            }

            echo "Signature créée avec succès.";

        } elseif ($action === 'verify') {
            // Gestion pour Vérifier
            $fileToVerify = $_FILES['fileToVerify'];
            $signature = $_FILES['signature'];
            $publicKey = $_FILES['publicKey'];
            $hashAlgorithmVerify = $_POST['hashAlgorithmVerify'];

            if (!$fileToVerify || !$signature || !$publicKey) {
                throw new Exception("Tous les fichiers pour la vérification doivent être fournis.");
            }

            $fileContent = file_get_contents($fileToVerify['tmp_name']);
            $signatureContent = base64_decode(file_get_contents($signature['tmp_name']));
            $publicKeyContent = file_get_contents($publicKey['tmp_name']);

            $result = openssl_verify($fileContent, $signatureContent, $publicKeyContent, OPENSSL_ALGO_SHA256);

            $verificationResult = ($result === 1) ? 'Valide' : 'Invalide';

            // Stocker dans la base de données
            $stmt = $conn->prepare("
                INSERT INTO verifications (full_name, email, file_name, hash_algorithm, signature, public_key, verification_result) 
                VALUES (?, ?, ?, ?, ?, ?, ?)
            ");
            $stmt->bind_param("sssssss", $fullName, $email, basename($fileToVerify['name']), $hashAlgorithmVerify, $signatureContent, $publicKeyContent, $verificationResult);

            if (!$stmt->execute()) {
                throw new Exception("Erreur d'insertion dans la table verifications : " . $stmt->error);
            }

            echo "Résultat de la vérification : $verificationResult";
        }
    } catch (Exception $e) {
        echo "Erreur : " . $e->getMessage();
    }
} else {
    echo "Méthode non autorisée.";
}

$conn->close();
?>
