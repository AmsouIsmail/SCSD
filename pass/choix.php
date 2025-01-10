
<!DOCTYPE html>
<html lang="fr">
<head>
    
    <?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['option'])) {
        $choice = $_POST['option'];

        if ($choice === 'generate') {
            // Rediriger vers la page de génération de mot de passe
            header('Location: pass/generate_password.py');
            exit();
        } elseif ($choice === 'check') {
            // Rediriger vers la page de vérification de mot de passe
            header('Location: pass/check_password_strengh.php');
            exit();
        }
    }
}
?>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choisissez une Option</title>
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

.container1 {
    background: #ffffff;
    padding: 30px 40px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    text-align: center;
    width: 100%;
    max-width: 500px;
    margin: auto; /* Utilisé pour le centrage horizontal */
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%); /* Centrer verticalement et horizontalement */
}

.container1 h1 {
    font-size: 24px;
    font-weight: bold;
    margin-bottom: 20px;
    color: #333333;
}

.container1 form {
    margin-bottom: 15px;
}

.container1 button {
    background: goldenrod;
    color: #ffffff;
    padding: 12px 20px;
    font-size: 16px;
    font-weight: bold;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background 0.3s ease-in-out, transform 0.2s;
    width: 100%;
    max-width: 300px;
    margin: 0 auto; /* Centre le bouton à l'intérieur du formulaire */
}

.container1 button:hover {
    background:rgb(217, 189, 78);
    transform: scale(1.05);
}

.container1 button:focus {
    outline: none;
    box-shadow: 0 0 5px rgba(33, 150, 243, 0.5);
}

.container1 form:last-child {
    margin-bottom: 0;
}


</style>

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
    <div class="container1">
        <h1>Choisissez une Option :</h1>
        <form method="POST" action="pass.php">
            <button type="submit" name="action" value="generate">Générer un Mot de Passe Fort</button>
        </form>
        <form method="POST" action="verfpass.php">
            <button type="submit" name="action" value="check">Vérifier la Force d'un Mot de Passe</button>
        </form>
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
