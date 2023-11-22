<?php
session_start();
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulter Facture</title>
    <!-- Inclure Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Ajouter un thème sombre -->
    <style>
          body {
        background-color: #343a40;
        color: white;
    }
    .navbar-custom {
        background-color: #212529;
    }
    .navbar {
        background-color: #212529;
    } /* Ajoutez cette accolade fermante */
    .btn-custom {
        background-color: #007bff;
        border-radius: 25px;
        color: white;
    }
    .btn-custom:hover {
        background-color: #0056b3;
        color: white;
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
<body>
<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <a class="navbar-brand" href="index_authentifier.php">
        <img src="images/planete-terre.png" alt="Logo" style="width: 40px; height: 40px; margin-right: 40px;">
        Communauté d'Énergie Renouvelable
    </a>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <button class="btn btn-success ml-2" onclick="window.location.href='index.php'">Accueil</button>
            </li>
        </ul>
    </div>
</nav>
<br>
<br>
<br>
<br>

    <section class="container mt-4">
        <h1>Consulter Facture</h1>
        <p>Entrez le numéro de votre facture pour la consulter :</p>
        <form action="chemin/vers/votre/script.php" method="post">
            <div class="form-group">
                <label for="facture">Numéro de facture :</label>
                <input type="text" id="facture" name="facture" class="form-control">
            </div>
            <input type="submit" value="Consulter" class="btn btn-custom">
        </form>
    </section>

    <footer class="footer">
    <footer class="footer">
    <div class="container">
        <span class="text-white">Communauté d'Énergie Renouvelable</span>
    </div>
</footer>
</footer>

    <!-- Inclure Bootstrap JS et jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>