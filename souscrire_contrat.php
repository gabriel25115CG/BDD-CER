<php

session_start();

?>

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
<form action="script/script_ajouter_contrat.php" method="post">
   
    <div class="form-group">
        <label for="id_membre">ID Membre</label>
        <input type="text" class="form-control" id="id_membre" name="id_membre" required>
    </div>
    <div class="form-group">
    <label for="type_contrat">Type de Contrat</label>
    <select class="form-control" id="type_contrat" name="type_contrat" required>
        <option value="">Sélectionnez le type de contrat</option>
        <option value="mensuel">Mensuel</option>
        <option value="annuel">Annuel</option>
    </select>
</div>
    <div class="form-group">
        <label for="date_debut_contrat">Date de début du contrat</label>
        <input type="date" class="form-control" id="date_debut_contrat" name="date_debut_contrat" required>
    </div>
    <div class="form-group">
        <label for="date_fin_contrat">Date de fin du contrat</label>
        <input type="date" class="form-control" id="date_fin_contrat" name="date_fin_contrat" required>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Souscrire</button>
        <a href="index_authentifier.php" class="btn btn-secondary ml-2">Retour</a>
    </div>
</form>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>