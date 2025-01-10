<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conn = new mysqli('localhost', 'root', '', 'coffre_fort');

    $login = $_POST['login']; // Nom d'utilisateur ou email
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, password FROM users WHERE username = ? OR email = ?");
    $stmt->bind_param("ss", $login, $login);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            header('Location: dashboard.php');
            exit;
        } else {
            echo "Mot de passe incorrect.";
        }
    } else {
        echo "Utilisateur non trouvé.";
    }

    $stmt->close();
    $conn->close();
}
?>



<!DOCTYPE html>
<html lang="en">
<header>
    <?php include "includes/link.php"; ?>
    
    <style>
        body {
            scroll-behavior: smooth;
        }

        .form-container {
            display: none;
            background-color: #f8f9fa;
            max-width: 600px;
            margin: 50px auto;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333333;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .button-container {
            text-align: center;
            margin-top: 30px;
        }

        .btn-toggle {
            background-color: #d2b356;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        .btn-toggle:hover {
            background-color: #fff;
            color: #d2b356;
            border: 2px solid #d2b356;
        }

        .hidden {
            display: none;
        }

        /* Page Border */

.page-border {
    position: fixed;
    z-index: 999999;
    pointer-events: none;
}

.page-border .bottom-border, .page-border .left-border, .page-border .right-border, .page-border .top-border {
    background: #f3f3ef;
    position: fixed;
    z-index: 9999;
}

.page-border > .top-border, .page-border > .right-border, .page-border > .bottom-border, .page-border > .left-border {
    padding: 11px;
    background: #ccc;
}

.page-border .bottom-border, .page-border .top-border {
    width: 100%;
    padding: 10px;
    left: 0;
}

.page-border .left-border, .page-border .right-border {
    padding: 10px;
    height: 100%;
    top: 0;
}

.page-border .top-border {
    top: 0;
}

.page-border .right-border {
    right: 0;
}

.page-border .bottom-border {
    bottom: 0;
}

.page-border .left-border {
    left: 0;
}

#wrapper {
    margin:0 15px;
    padding: 15px 0;
    position: relative;
}

    </style>
</header>
<body>
    <?php include "includes/nav2.php"; ?>


    <div class="page-border" data-wow-duration="0.7s" data-wow-delay="0.2s">
        <div class="top-border wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown;"></div>
        <div class="right-border wow fadeInRight animated" style="visibility: visible; animation-name: fadeInRight;"></div>
        <div class="bottom-border wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;"></div>
        <div class="left-border wow fadeInLeft animated" style="visibility: visible; animation-name: fadeInLeft;"></div>
    </div>
    
    
    <div class="container my-4">
        <div class="row align-items-center">
            <div class="col-md-6 text-center">
                <img src="images/hashage/hashwow.jpg.webp" alt="Image description" class="img-fluid" style="max-height: 430px;">
            </div>
            <div class="col-md-6">
                <p>
                Les fonctions de hachage sont des outils cryptographiques essentiels qui transforment une donnée d’entrée (texte, fichier, etc.) en une empreinte numérique unique de taille fixe, appelée hash. Leur objectif principal est de garantir l’intégrité des données : toute modification, même infime, dans l’entrée produit un hash totalement différent. Une fonction de hachage doit être unidirectionnelle, c’est-à-dire qu’il est pratiquement impossible de retrouver l’entrée initiale à partir du hash. Elles doivent également être résistantes aux collisions, ce qui signifie qu'il est très difficile de trouver deux entrées différentes produisant le même hash. Ces fonctions sont utilisées dans de nombreux domaines, comme les signatures numériques, l’authentification des mots de passe, et la vérification d’intégrité des fichiers. Des exemples populaires incluent MD5, qui est aujourd'hui obsolète en raison de failles de sécurité, et les versions plus sécurisées comme SHA-256 ou SHA-3. Les fonctions de hachage sont rapides et efficaces, mais leur sécurité dépend de leur conception et de leur résistance aux attaques modernes, telles que les attaques par force brute ou quantiques.
                </p>
            </div>
        </div>
    </div>

    <div class="button-container">
        <button class="btn-toggle" onclick="showForm()">Continuer vers le service</button>
    </div>

    <div class="container my-5" style="padding-top: 0%;">
        <div class="row align-items-center">
            
            <div class="col-md-6">
                <p>
                Les fonctions SHA (Secure Hash Algorithm) sont des algorithmes de hachage cryptographique conçus pour garantir l'intégrité des données. Elles prennent une entrée (texte, fichier, etc.) et produisent une empreinte unique appelée hash, de taille fixe. Les principales versions de SHA incluent SHA-1, désormais considéré comme vulnérable, et les versions de la famille SHA-2 (SHA-224, SHA-256, SHA-384, SHA-512), largement utilisées pour leur sécurité accrue. Ces fonctions sont conçues pour être unidirectionnelles, ce qui signifie qu'il est quasiment impossible de retrouver le message original à partir de son hash. Elles sont également résistantes aux collisions, rendant difficile la génération de deux messages différents ayant le même hash. Les fonctions SHA sont employées dans divers domaines, notamment la signature numérique, l’authentification, et la vérification d’intégrité des fichiers. Avec l'émergence de l'informatique quantique, SHA-3, une version plus récente, a été introduite pour renforcer la sécurité future. Ainsi, SHA joue un rôle central dans la cryptographie moderne.
                </p>
            </div>
            <div class="col-md-6 text-center">
                <img src="images/hashage/hashageimg.png" alt="Image description" class="img-fluid" style="max-height: 600px;">
            </div>
        </div>
    </div>
    

    <div class="container">
        <div class="form-container" id="hashForm">
            <h2>Hashing Service</h2>
            <form action="hash_processor.php" method="POST" enctype="multipart/form-data">
                <!-- Full Name -->
                <div class="mb-3">
                    <label for="fullName" class="form-label">Full Name</label>
                    <input type="text" class="form-control" name="fullName" id="fullName" placeholder="Enter your full name" required>
                </div>
                <!-- Email -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email" required>
                </div>
                <!-- Message to Hash -->
                <div class="mb-3" id="message-container">
                    <label for="messageToHash" class="form-label">Message to Hash</label>
                    <textarea class="form-control" name="messageToHash" id="messageToHash" rows="3" placeholder="Enter your message"></textarea>
                </div>
                <!-- File to Hash -->
                <div class="mb-3" id="file-container">
                    <label for="fileToHash" class="form-label">File to Hash</label>
                    <input type="file" class="form-control" name="fileToHash" id="fileToHash">
                </div>
                <!-- Algorithm -->
                <div class="mb-3">
                    <label for="hashAlgorithm" class="form-label">Choose Algorithm</label>
                    <select class="form-select" name="hashAlgorithm" id="hashAlgorithm" required>
                        <option value="" disabled selected>Select an algorithm</option>
                        <option value="md5">MD5</option>
                        <option value="sha1">SHA-1</option>
                        <option value="sha256">SHA-256</option>
                        <option value="sha512">SHA-512</option>
                        <option value="sha3-256">SHA-3-256</option>
                    </select>
                </div>
                <!-- Salt -->
                <div class="mb-3">
                    <label for="salt" class="form-label">Salt (Optional)</label>
                    <input type="text" class="form-control" name="salt" id="salt" placeholder="Enter salt for additional security">
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Generate Hash</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function showForm() {
            document.getElementById('hashForm').style.display = 'block';
        }

        document.addEventListener("DOMContentLoaded", function () {
            const messageField = document.getElementById("messageToHash");
            const fileField = document.getElementById("fileToHash");
            const messageContainer = document.getElementById("message-container");
            const fileContainer = document.getElementById("file-container");

            messageField.addEventListener("input", () => {
                fileContainer.style.display = messageField.value.trim() ? "none" : "block";
            });

            fileField.addEventListener("change", () => {
                messageContainer.style.display = fileField.value ? "none" : "block";
            });
        });

        function showForm() {
            const form = document.getElementById('hashForm');
            if (form.style.display === 'none' || form.style.display === '') {
                form.style.display = 'block';
                smoothScroll(form);
            }
        }

        function smoothScroll(target) {
            const targetPosition = target.getBoundingClientRect().top + window.pageYOffset;
            const startPosition = window.pageYOffset;
            const distance = targetPosition - startPosition;
            const duration = 700;
            let start = null;

            function animation(currentTime) {
                if (start === null) start = currentTime;
                const elapsedTime = currentTime - start;
                const progress = Math.min(elapsedTime / duration, 1);
                window.scrollTo(0, startPosition + distance * progress);
                if (elapsedTime < duration) {
                    requestAnimationFrame(animation);
                }
            }

            requestAnimationFrame(animation);
        }
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const header = document.getElementById("header");
            const stickyOffset = header.offsetTop;

            window.addEventListener("scroll", function () {
                if (window.scrollY > stickyOffset) {
                    if (!header.classList.contains("sticky")) {
                        header.classList.add("sticky", "fade-in", "shadow-down");
                        header.classList.remove("fade-out");
                    }
                } else {
                    if (header.classList.contains("sticky")) {
                        header.classList.remove("sticky", "fade-in", "shadow-down");
                        header.classList.add("fade-out");
                    }
                }
            });
        });


    </script>
    
</body>
</html>