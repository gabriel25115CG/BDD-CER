<?php
session_start();

// Vérifiez si l'utilisateur est connecté et est l'administrateur
if (!isset($_SESSION['user']) || $_SESSION['user']['email'] != 'admin@gmail.com') {
    header("Location: connexion.php");
    exit();
}
?>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Page d'administration</title>
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
    .admin-page {
        background-color: #2a394f; /* Nouvelle couleur de fond pour la page d'administration */
    }

    .admin-banner {
        background-color: #ffc107; /* Couleur de la bannière d'administration */
        color: #000; /* Couleur du texte de la bannière */
        padding: 10px;
        text-align: center;
    }
    </style>
</head>
<body class="bg-dark text-light fixed-top">




<nav class="navbar navbar-expand-lg navbar-custom">
    <img src="images/planete-terre.png" alt="Logo" style="width: 40px; height: 40px; margin-right: 40px;">
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
                    <a class="dropdown-item" href="supprimer_utilisateur.php">Supprimer un utilisateur</a>
                    
                </div>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="btn btn-primary ml-2" href="profil.php">Profil</a>
            </li>
            <li class="nav-item">
                <a class="btn btn-danger ml-2" href="script/deconnexion.php">Déconnexion</a>
            </li>
        </ul>
    </div>
</nav>
<div class="alert alert-warning admin-banner" role="alert">
    <strong>Administration:</strong> Vous êtes actuellement sur la page d'administration.
</div>
    <section class="container mt-4">
        <h1 class="display-4 text-center">Bienvenue, <?php echo $_SESSION['user']['prenom']; ?>!</h1>
    </section>
    <section class="container mt-4">
        <p>Bienvenue sur la page d'administration du systeme de gestion de la communauté d'énergie renouvelable.</p>
    </section>
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