<?php
$message = ''; // Variable pour afficher le message

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conn = new mysqli('localhost', 'root', '', 'coffre_fort');

    if ($conn->connect_error) {
        $message = "Erreur de connexion à la base de données : " . $conn->connect_error;
    } else {
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];

        if ($password !== $confirm_password) {
            $message = "Les mots de passe ne correspondent pas.";
        } else {
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);

            $stmt = $conn->prepare("INSERT INTO users (first_name, last_name, username, email, password) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("sssss", $first_name, $last_name, $username, $email, $hashed_password);

            if ($stmt->execute()) {
                $message = "Inscription réussie. <a href='index.php'>Connectez-vous ici</a>";
            } else {
                $message = "Erreur lors de l'inscription : " . $stmt->error;
            }

            $stmt->close();
        }

        $conn->close();
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/namari-color.css">



    
    <!--Meta Keywords and Description-->
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no"/>

    <!--Favicon-->
    <link rel="shortcut icon" href="../images/logobanseul.ico" title="Favicon"/>

    <!-- Bootstrap CSS (Add this to enable Bootstrap) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Main CSS Files -->
    <link rel="stylesheet" href="../css/style.css">

    <!-- Namari Color CSS -->
    <link rel="stylesheet" href="../css/namari-color.css">

    <!--Icon Fonts - Font Awesome Icons-->
    <link rel="stylesheet" href="../css/font-awesome.min.css">

    <!-- Animate CSS-->
    <link href="../css/animate.css" rel="stylesheet" type="text/css">

    <!--Google Webfonts-->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
    <style>
    .btn-color{
  background-color: #0e1c36;
  color: #fff;
  
}

.profile-image-pic{
  height: 200px;
  width: 200px;
  object-fit: cover;
}



.cardbody-color{
  background-color: #ebf2fa;
}

a{
  text-decoration: none;
}



/* Reset Bootstrap's default spacing for container and row */
.container-fluid {
    padding-left: 20px !important;
    padding-right: 20px !important;
}

/* Preserve bottom margin */
.row {
    margin-left: 30px !important;
    margin-right: 30px !important;
    margin-top: 25px !important; /* Remove top margin */
}

/* General Styles */
#header {
    position: relative; /* Normal positioning before scroll */
    width: 100%;
    z-index: 9999;
    background-color: rgba(255, 255, 255, 0.9); /* Semi-transparent background */
    transition: background-color 0.3s, box-shadow 0.3s; /* Smooth transitions */
    box-shadow: none;
    margin: 0 auto; /* Center header */
    padding: _px 20px; /* Optional: control inner padding */
    display: flex;
    align-items: center;
    justify-content: center;
}

#header.sticky {
    position: fixed !important;
    top: 0;
    left: 0;
    width: 100%;
    background-color: rgba(255, 255, 255, 1);
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
}

/* Navigation Links */
#nav-main ul {
    gap: 8px; /* Reduced gap between navigation links */
}


/* Social Icons */
.social-icons {
    display: flex;
    gap: 5px; /* Reduced gap between social icons */
    list-style: none;
    margin: 0;
    padding: 0;
    align-items: center; /* Vertically centers the icons */
}

.social-icons li {
    display: flex;
    align-items: center;
}

/* Remove top margin for alignment */
ul, li {
    margin-top: -10px !important;
}

#logo img {
    max-height: 80px;
    width: auto;
}


    </style>
</head>
<body>

        <div id="header" class="nav-collapse container-fluid" >
            <div class="row align-items-center" style="width: 100%; display: flex;">
                <div class="col d-flex justify-content-between align-items-center" style="width: 100%;">

                    <!-- Logo -->
                    <div id="logo" class="d-flex align-items-center" >
                        <!-- Logo that is shown on the banner -->
                        <img src="../images/logobanner.png" id="banner-logo" alt="Landing Page" style="max-height: 80px;" />
                        <!-- The Logo that is shown on the sticky Navigation Bar -->
                        <img src="../images/logobanner.png" id="navigation-logo" alt="Landing Page" style="max-height: 80px;" />
                    </div>
                    <!-- End of Logo -->

                    <!-- Main Navigation -->
                    <nav id="nav-main" class="d-flex align-items-center">
                        <ul class="d-flex list-unstyled mb-0" style="gap: 8px;">
                            <li>
                                <a href="../index.php#banner">ACCUEIL</a>
                            </li>
                            <li>
                                <a href="../index.php#about">À PROPOS</a>
                            </li>
                            <li>
                                <a href="../index.php#pricing">SERVICES</a>
                            </li>
                            <li>
                                <a href="../index.php#testimonials">AVIS</a>
                            </li>
                            <li>
                                <a href="../index.php#clients">NOTRE ÉQUIPE</a>
                            </li>
                        </ul>
                    </nav>
                    <!-- End of Main Navigation -->

                    <!-- Social Icons in Header -->
                    <aside class="d-flex align-items-center" style="gap: 5px;">
                        <ul class="social-icons d-flex list-unstyled mb-0" style="gap: 5px;">
                            <li>
                                <a target="_blank" title="Facebook" href="https://www.facebook.com/">
                                    <i class="fa fa-facebook fa-1x"></i><span>Facebook</span>
                                </a>
                            </li>
                            <li>
                                <a target="_blank" title="Google+" href="http://google.com/">
                                    <i class="fa fa-google-plus fa-1x"></i><span>Google+</span>
                                </a>
                            </li>
                            <li>
                                <a target="_blank" title="Twitter" href="http://www.twitter.com/">
                                    <i class="fa fa-twitter fa-1x"></i><span>Twitter</span>
                                </a>
                            </li>
                            <li>
                                <a target="_blank" title="Instagram" href="http://www.instagram.com/lovely_muuunir">
                                    <i class="fa fa-instagram fa-1x"></i><span>Instagram</span>
                                </a>
                            </li>
                            <li>
                                <a target="_blank" title="Behance" href="http://www.behance.net">
                                    <i class="fa fa-behance fa-1x"></i><span>Behance</span>
                                </a>
                            </li>
                        </ul>
                    </aside>
                </div>
            </div>
        </div>
        <!-- End of Header -->
        <div class="page-border" data-wow-duration="0.7s" data-wow-delay="0.2s">
            <div class="top-border wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown;"></div>
            <div class="right-border wow fadeInRight animated" style="visibility: visible; animation-name: fadeInRight;"></div>
            <div class="bottom-border wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;"></div>
            <div class="left-border wow fadeInLeft animated" style="visibility: visible; animation-name: fadeInLeft;"></div>
        </div>






    <style>
        .btn-color {
            background-color: #0e1c36;
            color: #fff;
        }
        .cardbody-color {
            background-color: #ebf2fa;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card my-5">
                    <form class="card-body cardbody-color p-lg-5" method="POST" action="">
                        <div class="text-center">
                            <img src="../images/logo1.png" class="img-fluid profile-image-pic img-thumbnail rounded-circle my-3" width="200px" alt="profile">
                        </div>

                        <!-- Affichage du message -->
                        <?php if (!empty($message)): ?>
                            <div class="alert <?= strpos($message, 'réussie') !== false ? 'alert-success' : 'alert-danger'; ?> text-center">
                                <?= $message; ?>
                            </div>
                        <?php endif; ?>

                        <div class="mb-3">
                            <input type="text" class="form-control" name="first_name" placeholder="Prénom" required>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="last_name" placeholder="Nom" required>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="username" placeholder="Nom d'utilisateur" required>
                        </div>
                        <div class="mb-3">
                            <input type="email" class="form-control" name="email" placeholder="Adresse e-mail" required>
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control" name="password" placeholder="Mot de passe" required>
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control" name="confirm_password" placeholder="Confirmez le mot de passe" required>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-color px-5 mb-5 w-100">S'inscrire</button>
                        </div>
                        <div class="text-center">
                            <p class="form-text text-dark">Déjà un compte ? <a href="index.php" class="text-dark fw-bold">Connectez-vous ici</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

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
