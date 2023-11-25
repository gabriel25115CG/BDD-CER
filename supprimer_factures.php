<?php
session_start();

if (!isset($_SESSION['user'])) {
    echo "Aucun utilisateur connecté.<br>";
    header("Location: connexion.php");
    exit();
} elseif ($_SESSION['user']['email'] != 'admin@gmail.com') {
    echo "L'utilisateur connecté n'est pas l'administrateur.<br>";
    header("Location: connexion.php");
    exit();
}
?>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Page protégée - Communauté d'Énergie Renouvelable</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #343a40;
            color: #fff;
            margin-bottom: 60px; /* Hauteur de votre pied de page */

        }
        .navbar-custom {
            background-color: #212529; /* Couleur de fond gris foncé */
        }
        .navbar-custom .navbar-brand {
            color: #ffffff; /* Couleur de texte blanc */
        }
        .form-control {
            background-color: #495057;
            border-color: #495057;
            color: #fff;
        }
        .navbar-custom .dropdown-menu {
        background-color: #333333; /* Couleur de fond gris foncé */
    }
    .navbar-custom .dropdown-item {
        color: #ffffff; /* Couleur de texte blanc */
    }
    .navbar-custom .dropdown-item:hover, .navbar-custom .dropdown-item:focus {
        color: #000000; /* Couleur de texte noir au survol ou au focus */
        background-color: #cccccc; /* Couleur de fond gris clair au survol ou au focus */
    }
    .footer {
        position: fixed;
        left: 0;
        bottom: 0;
        width: 100%;
        height: 60px; /* Hauteur de votre pied de page */
        background-color: #212529; /* La même couleur que la barre de navigation */
        color: white;
        text-align: center;
        line-height: 60px; /* Centrer le texte verticalement */
    }
    </style>
</head>
<body class="bg-dark text-light fixed-top">

<nav class="navbar navbar-expand-lg navbar-custom">
    <img src="../images/planete-terre.png" alt="Logo" style="width: 40px; height: 40px; margin-right: 40px;">
    <a class="navbar-brand" href="#">Communauté d'Énergie Renouvelable</a>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">
                    Menu
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="supprimer_site.php">Supprimer un site de production</a>
                    <a class="dropdown-item" href="supprimer_factures.php">Supprimer une factures</a>
                    <a class="dropdown-item" href="info_utilisateurs.php">Voir infos utilisateurs</a>
                </div>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="btn btn-primary ml-2" href="profil.php">Profil</a>
            </li>
            <li class="nav-item">
                <a class="btn btn-danger ml-2" href="/script/deconnexion.php">Déconnexion</a>
            </li>
        </ul>
    </div>
</nav>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
<footer class="footer">
    <div class="container">
        <span class="text-white">Communauté d'Énergie Renouvelable</span>
    </div>
</footer>
</html>









