<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Connexion - Communauté d'Énergie Renouvelable</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #343a40;
            color: #fff;
        }
        .navbar {
            background-color: #212529;
        }
        .form-control {
            background-color: #495057;
            border-color: #495057;
            color: #fff;
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
                <button class="btn btn-success ml-2" onclick="window.location.href='index.php'">Accueil</button>
            </li>
        </ul>
    </div>
</nav>
<br>
<br>
    <section class="container mt-4">
        <h1 class="display-4 text-center">Connexion</h1>
        <form class="mt-4" action="script/script_connexion.php" method="post">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Entrez votre email">
            </div>
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Entrez votre mot de passe">
            </div>
            <button type="submit" class="btn btn-success">Se connecter</button>
        </form>
    </section>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>