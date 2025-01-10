<!DOCTYPE html>
<html lang="fr">
<head>
    <?php include "includes/link.php"; ?>
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
</head>
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
<body>
    <?php include "includes/nav2.php"; ?>
    <div class="page-border" data-wow-duration="0.7s" data-wow-delay="0.2s">
        <div class="top-border wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown;"></div>
        <div class="right-border wow fadeInRight animated" style="visibility: visible; animation-name: fadeInRight;"></div>
        <div class="bottom-border wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;"></div>
        <div class="left-border wow fadeInLeft animated" style="visibility: visible; animation-name: fadeInLeft;"></div>
    </div>
    <div class="container">
        <h1>Choisissez une Option :</h1>
        <form method="POST" action="pass.php">
            <button type="submit" name="action" value="generate">Générer un Mot de Passe Fort</button>
        </form>
        <form method="POST" action="verfpass.php">
            <button type="submit" name="action" value="check">Vérifier la Force d'un Mot de Passe</button>
        </form>
    </div>
</body>
</html>
