<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Souscription Contrat - Communauté d'Énergie Renouvelable</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="bg-dark text-white">
    <div class="container mt-4">
        <h1 class="text-center">Souscription Contrat</h1>
        <form action="souscription_contrat.php" method="post">
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" required>
            </div>
            <div class="form-group">
                <label for="prenom">Prénom</label>
                <input type="text" class="form-control" id="prenom" name="prenom" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="telephone">Numéro de téléphone</label>
                <input type="tel" class="form-control" id="telephone" name="telephone" required>
            </div>
            <div class="form-group">
                <label for="site">Site de rattachement</label>
                <input type="text" class="form-control" id="site" name="site" required>
            </div>
            <div class="form-group">
                <label for="date">Date de souscription</label>
                <input type="date" class="form-control" id="date" name="date" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Souscrire</button>
                <a href="index_authentifier.php" class="btn btn-secondary ml-2">Retour</a>
            </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>