<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vérification URL - Google Safe Browsing</title>
    <link rel="stylesheet" href="check_url.css">
</head>
<body>
    <div class="container">
        <h1>Vérification de la sécurité d'une URL</h1>
        <form action="" method="POST">
            <input type="text" name="url" placeholder="Entrez l'URL à vérifier" required>
            <button type="submit">Vérifier</button>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $url = filter_var($_POST['url'], FILTER_SANITIZE_URL);

            // Vérifier si l'URL est valide
            if (!filter_var($url, FILTER_VALIDATE_URL)) {
                echo "<p class='result error'>L'URL saisie n'est pas valide.</p>";
            } else {
                // Clé API Google Safe Browsing
                $apiKey = 'AIzaSyCpjt-uFl-WN2E8jivNBVkDyMbqYxno8gI'; // Remplacez par votre clé API
                $apiUrl = "https://safebrowsing.googleapis.com/v4/threatMatches:find?key=$apiKey";

                // Construction des données pour l'API
                $postData = [
                    'client' => [
                        'clientId' => "votre-projet",
                        'clientVersion' => "1.0"
                    ],
                    'threatInfo' => [
                        'threatTypes' => ["MALWARE", "SOCIAL_ENGINEERING", "UNWANTED_SOFTWARE"],
                        'platformTypes' => ["ANY_PLATFORM"],
                        'threatEntryTypes' => ["URL"],
                        'threatEntries' => [
                            ['url' => $url]
                        ]
                    ]
                ];

                // Initialisation de cURL
                $ch = curl_init($apiUrl);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));

                $response = curl_exec($ch);
                $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                curl_close($ch);

                if ($httpCode === 200) {
                    $data = json_decode($response, true);
                    if (!empty($data['matches'])) {
                        echo "<p class='result danger'>L'URL est signalée comme dangereuse !</p>";
                    } else {
                        echo "<p class='result safe'>L'URL semble sécurisée.</p>";
                    }
                } else {
                    echo "<p class='result error'>Erreur lors de la vérification de l'URL. Code HTTP : $httpCode</p>";
                }
            }
        }
        ?>
    </div>
</body>
</html>
