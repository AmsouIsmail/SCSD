<?php
// Définir les chemins des clés
define('KEYS_DIR', __DIR__ . '/keys');

// Vérifier si les clés existent
function checkKeys($username) {
    $privateKeyPath = KEYS_DIR . "/{$username}_private_key.pem";
    $publicKeyPath = KEYS_DIR . "/{$username}_public_key.pem";
    if (!file_exists($privateKeyPath)) {
        throw new Exception("Clé privée introuvable pour l'utilisateur : " . $username);
    }

    if (!file_exists($publicKeyPath)) {
        throw new Exception("Clé publique introuvable pour l'utilisateur : " . $username);
    }
}

// Charger la clé privée
function getPrivateKey($username) {
    checkKeys($username);
    $privateKeyPath = KEYS_DIR . "/{$username}_private_key.pem";
    $privateKey = file_get_contents($privateKeyPath);
    $key = openssl_pkey_get_private($privateKey);
    if (!$key) {
        throw new Exception("Erreur lors du chargement de la clé privée pour l'utilisateur : " . $username);
    }
    return $key;
}

// Charger la clé publique
function getPublicKey($username) {
    checkKeys($username);
    $publicKeyPath = KEYS_DIR . "/{$username}_public_key.pem";
    $publicKey = file_get_contents($publicKeyPath);
    $key = openssl_pkey_get_public($publicKey);
    if (!$key) {
        throw new Exception("Erreur lors du chargement de la clé publique pour l'utilisateur : " . $username);
    }
    return $key;
}
?>
