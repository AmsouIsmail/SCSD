<?php
// Encrypt and Decrypt functionalities

// Symmetric Encryption using AES
function aes_encrypt($data, $key) {
    if (strlen($key) !== 16) {
        throw new Exception("Key must be 128 bits (16 characters).\n");
    }
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-128-cbc'));
    $encrypted = openssl_encrypt($data, 'aes-128-cbc', $key, OPENSSL_RAW_DATA, $iv);
    return base64_encode($iv . $encrypted);
}

function aes_decrypt($encryptedData, $key) {
    if (strlen($key) !== 16) {
        throw new Exception("Key must be 128 bits (16 characters).\n");
    }
    $data = base64_decode($encryptedData);
    $ivLength = openssl_cipher_iv_length('aes-128-cbc');
    $iv = substr($data, 0, $ivLength);
    $encrypted = substr($data, $ivLength);
    return openssl_decrypt($encrypted, 'aes-128-cbc', $key, OPENSSL_RAW_DATA, $iv);
}

// Asymmetric Encryption using RSA
function rsa_encrypt($data, $publicKey) {
    $chunkSize = 245; // Maximum chunk size for RSA 2048-bit with PKCS1 padding
    $dataChunks = str_split($data, $chunkSize);
    $encryptedChunks = [];

    foreach ($dataChunks as $chunk) {
        $encrypted = '';
        openssl_public_encrypt($chunk, $encrypted, $publicKey, OPENSSL_PKCS1_PADDING);
        $encryptedChunks[] = $encrypted;
    }

    return base64_encode(implode('', $encryptedChunks));
}

function rsa_decrypt($encryptedData, $privateKey) {
    $data = base64_decode($encryptedData);
    $chunkSize = 256; // Maximum chunk size for RSA 2048-bit decrypted data
    $dataChunks = str_split($data, $chunkSize);
    $decryptedChunks = [];

    foreach ($dataChunks as $chunk) {
        $decrypted = '';
        openssl_private_decrypt($chunk, $decrypted, $privateKey, OPENSSL_PKCS1_PADDING);
        $decryptedChunks[] = $decrypted;
    }

    return implode('', $decryptedChunks);
}

function load_key_from_file($filePath) {
    if (!file_exists($filePath)) {
        throw new Exception("Key file does not exist.");
    }
    return file_get_contents($filePath);
}

// Handle file upload and encryption/decryption
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    $mechanism = $_POST['mechanism'] ?? '';
    $keyFile = $_FILES['key_file']['tmp_name'] ?? '';
    $file = $_FILES['file']['tmp_name'] ?? '';
    $data = $_POST['data'] ?? '';
    $result = '';
    $outputFile = null;
    $outputFileUrl = '';

    try {
        if (!empty($file)) {
            // Handle file upload
            $data = file_get_contents($file);
        }

        if ($mechanism === 'aes') {
            $key = $_POST['key'] ?? '';
            if ($action === 'encrypt') {
                $result = aes_encrypt($data, $key);
            } elseif ($action === 'decrypt') {
                $result = aes_decrypt($data, $key);
            }
        } elseif ($mechanism === 'rsa') {
            if (empty($keyFile)) {
                throw new Exception("Key file must be uploaded for RSA operations.");
            }
            $key = load_key_from_file($keyFile);
            if ($action === 'encrypt') {
                $result = rsa_encrypt($data, $key);
            } elseif ($action === 'decrypt') {
                $result = rsa_decrypt($data, $key);
            }
        }

        // Create the 'uploads' directory if it doesn't exist
        $outputDir = __DIR__ . '/uploads'; // Directory "uploads"
        if (!is_dir($outputDir)) {
            mkdir($outputDir, 0777, true); // Create directory if it doesn't exist
        }

        if (!empty($file)) {
            // Save the generated file in the 'uploads' directory
            $outputFile = $outputDir . '/' . uniqid('enc_', true) . ($action === 'encrypt' ? '.enc' : '.dec');
            file_put_contents($outputFile, $result);

            // Prepare a browser-accessible path
            $outputFileUrl = basename($outputFile);
        }

    } catch (Exception $e) {
        $result = "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>

    <?php if (!empty($result) && !$outputFile): ?>
    
        <textarea readonly style="width: 100%; height: 100px;"><?= htmlspecialchars($result) ?></textarea>
    <?php elseif (!empty($outputFile)): ?>

        <a href="uploads/<?= htmlspecialchars($outputFileUrl) ?>" download>Download</a>
    <?php endif; ?>
</body>
</html>
