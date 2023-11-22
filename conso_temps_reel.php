<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consommation en Temps Réel</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #343a40;
            color: white;
        }
        .navbar-custom {
            background-color: #212529;
        }
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
<nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
    <a class="navbar-brand" href="#">Communauté d'Énergie Renouvelable</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a href="index_authentifier.php" class="btn btn-custom">Accueil</a>
            </li>
        </ul>
    </div>
</nav>

    <section class="container mt-4">
        <h1>Consommation en Temps Réel</h1>
        <p>Entrez votre identifiant de site pour suivre votre consommation en temps réel :</p>
        <form action="chemin/vers/votre/script.php" method="post">
            <div class="form-group">
                <label for="siteId">Identifiant du site :</label>
                <input type="text" id="siteId" name="siteId" class="form-control">
            </div>
            <input type="submit" value="Suivre" class="btn btn-custom">
        </form>    </section>

        <footer class="footer">
    <div class="container">
        <span class="text-white">Communauté d'Énergie Renouvelable</span>
    </div>
</footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>