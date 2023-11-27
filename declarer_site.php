<?php
    session_start();

    if(!isset($_SESSION['user'])) {
        header('Location: connexion.php');
        exit;
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Déclarer un site de production</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #343a40;
            color: white;
        }
        .dark-banner {
            background-color: #212529; /* Couleur de fond noire */
            height: 50px;
        }
        .navbar-dark {
            background-color: #212529; /* Couleur de fond noire */
        }
        .nav-item a {
    background-color: #007bff; /* Couleur de fond du bouton bleu */
    border-radius: 5px; /* Bords arrondis */
    padding: 10px; /* Espacement intérieur */
    transition: background-color 0.3s ease; /* Animation de transition */
}
.nav-link {
    color: #ffffff; /* Couleur du texte blanc */
}

.nav-item a:hover {
    background-color: #0056b3; /* Couleur de fond du bouton bleu au survol */
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
    <a class="navbar-brand" href="#">
        <img src="images/planete-terre.png" alt="Logo" style="width: 40px; height: 40px; margin-right: 40px;">
        Communauté d'Énergie Renouvelable
    </a>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <button class="btn btn-success ml-2" onclick="window.location.href='index_authentifier.php'">Accueil</button>
            </li>
        </ul>
    </div>
</nav>
<br>
<br>

<div class="container mt-5">
    <h1>Déclarer un site de production</h1>
    <form action="script/script_declarersite.php" method="post">
        <div class="form-group">
            <label for="siteName">Nom du site</label>
            <input type="text" class="form-control" id="Donnees_Geographique" name="Donnees_Geographique" placeholder="Entrez le nom du site">
        </div>
        <div class="form-group">
            <label for="type_site">Type de site de production :</label>
            <select id="type_site" name="ID_Type_Source">
                <option value="1">Energie solaire</option>
                <option value="2">Energie éolienne</option>
                <option value="3">Biomasse</option>
                <option value="4">Hydroelectrique</option>
                <option value="5">Thermique</option>
            </select>
        </div>
        <div class="form-group">
            <label for="capacite_production">Capacité de production :</label>
            <input type="number" id="capacite_production" name="Capacite_Production" min="0" step="0.1" placeholder="Entrez la capacité de production">
        </div>
    
        <button type="submit" class="btn btn-primary">Déclarer</button>
    </form>
</div>

  
    <footer class="footer mt-auto py-3 bg-dark text-white">
        <div class="container text-center">
            <span>Copyright &copy; 2022 Mon Site</span>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
<footer class="footer">
    <div class="container">
        <span class="text-white">Communauté d'Énergie Renouvelable</span>
    </div>
</footer>
</html>