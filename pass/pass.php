

<!DOCTYPE html>
<html lang="fr">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mot de Passe Généré</title>
    <link rel="stylesheet" href="pass.css">
 <!--Page Title-->
 <title>S.C.S.D</title>

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

</head>
<style>
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
    margin-top: 0 !important;
}

#logo img {
    max-height: 80px;
    width: auto;
}



/*------------   style de div conteiner ici   --------------*/

.container {
    background: #ffffff; /* Fond blanc */
    padding: 30px 40px; /* Espacement intérieur */
    border-radius: 10px; /* Coins arrondis */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Ombre pour effet visuel */
    text-align: center; /* Centrage du texte */
    width: 100%;
    max-width: 500px; /* Limite la largeur */
    position: absolute; /* Position absolue pour centrer dans la page */
    top: 50%; /* Positionne à 50% de la hauteur */
    left: 50%; /* Positionne à 50% de la largeur */
    transform: translate(-50%, -50%); /* Décale de la moitié de la largeur et de la hauteur */
}

.container h1 {
    font-size: 26px; /* Taille du titre principal */
    font-weight: bold;
    color: #333333; /* Couleur sombre pour le contraste */
    margin-bottom: 20px;
}

.container p {
    font-size: 16px; /* Taille du texte */
    color: #555555; /* Texte légèrement grisé */
    margin-bottom: 10px;
}

.container h2 {
    font-size: 22px; /* Taille du mot de passe généré */
    font-weight: bold;
    color:rgb(135, 15, 15); /* Couleur bleue pour mettre en valeur le mot de passe */
    margin: 10px 0;
    word-wrap: break-word; /* Gère les mots trop longs */
}

.container button {
    background: #ffffff; /* Fond blanc par défaut */
    color: #333333; /* Couleur du texte noir */
    padding: 12px 20px; /* Taille des boutons */
    font-size: 16px;
    font-weight: bold;
    border: 8px solid silver; /* Bordure grise par défaut */
    border-radius: 15px;
    cursor: pointer;
    transition: all 0.3s ease-in-out; /* Transitions fluides */
    width: 100%;
    max-width: 300px;
    margin: 0 auto; /* Centre le bouton */
}

.container button:hover {
    border-color: goldenrod; /* Bordure dorée au survol */
    color: golden; /* Texte doré au survol */
    background: #f9f9f9; /* Fond légèrement grisé */
    transform: scale(1.05); /* Effet d'agrandissement */
}

.container button:focus {
    outline: none;
    box-shadow: 0 0 10px rgba(184, 160, 25, 0.7); /* Ombre dorée */
}

.container a {
    display: inline-block;
    margin-top: 20px;
    color:goldenrod; /* Couleur bleue pour le lien */
    text-decoration: none; /* Supprime le soulignement par défaut */
    font-weight: bold;
    transition: color 0.3s ease-in-out; /* Transition pour le changement de couleur */
}

.container a:hover {
    color:rgb(187, 176, 82); /* Couleur plus foncée au survol */
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
    <div class="container">
        <h1>Mot de Passe Généré</h1>
        <p>Voici votre mot de passe généré :</p>

        <h2><?php 
        function generateStrongPassword($length = 12) {
            // Générer un mot de passe fort
            $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_+{}|:"<>?';
            
            do {
                $password = '';
                for ($i = 0; $i < $length; $i++) {
                    $password .= $characters[random_int(0, strlen($characters) - 1)];
                }
        
                // Vérifier que le mot de passe contient des lettres majuscules, minuscules, des chiffres et au plus 2 symboles
                $lowercase = preg_match('/[a-z]/', $password);
                $uppercase = preg_match('/[A-Z]/', $password);
                $digit = preg_match('/[0-9]/', $password);
                $special = preg_match_all('/[!@#$%^&*()_+{}|:"<>?]/', $password);
        
            } while (!$lowercase || !$uppercase || !$digit || $special > 2);
        
            return $password;
        }
        
        // Exemple d'utilisation
        echo generateStrongPassword();
        
        
       ?></h2>
        <br>
        <form method="POST" action="pass.php">
            <button type="submit" name="action" value="generate">Regénérer un autre Mot de Passe Fort</button>
        </form>
        <a href="choix.php">Retour à la page d'accueil</a>
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

