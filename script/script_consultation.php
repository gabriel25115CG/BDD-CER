<?php
session_start();

// Vérifier si l'utilisateur est connecté et a le statut d'administrateur
if (isset($_SESSION['user']) && $_SESSION['user']['Email'] == "admin@gmail.com") {
    // L'utilisateur est un administrateur, continuer l'exécution de la page

    // ... le reste du code de la page admin.php ...

} else {
    // Rediriger vers une page d'erreur ou une autre page autorisée
    header("Location: ../index_authentifier.php");
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
<?php
session_start();

// Vérifier si l'utilisateur est connecté et a le statut d'administrateur
if (isset($_SESSION['user']) && $_SESSION['user']['Email'] == "admin@gmail.com") {
    // L'utilisateur est un administrateur, continuer l'exécution de la page

    // ... le reste du code de la page admin.php ...

} else {
    // Rediriger vers une page d'erreur ou une autre page autorisée
    header("Location: ../index_authentifier.php");
    exit();
}

$type = isset($_POST['type']) ? $_POST['type'] : 'all';
$valeur = isset($_POST['valeur']) ? $_POST['valeur'] : '';

try {
    // Connectez-vous à la base de données
    $conn = new PDO("mysql:host=10.20.20.40;dbname=V_ONE", "gabriel", "gabriel");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Préparez et exécutez la requête SQL
    if ($type == 'all') {
        $sql = "SELECT * FROM membre";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    } else {
        $valid_columns = ['prenom', 'nom', 'ID_Membre'];
            if (!in_array($type, $valid_columns)) {
            die("Erreur : type de recherche invalide.");
        }
        $sql = "SELECT * FROM membre WHERE $type = :valeur";
        $stmt = $conn->prepare($sql);
        $stmt->execute(['valeur' => $valeur]);
    }

    // Commencez le tableau
    echo "<table class='table' style='color: white;'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>Nom</th>";
    echo "<th>Prénom</th>";
    echo "<th>Email</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";

    // Affichez les résultats
    while ($row = $stmt->fetch()) {
        echo "<tr>";
        echo "<td>" . $row['ID_Membre'] . "</td>";
        echo "<td>" . $row['Nom'] . "</td>";
        echo "<td>" . $row['Prenom'] . "</td>";
        echo "<td>" . $row['Email'] . "</td>";
        echo "<td>";
        echo "<form action='script_suppression.php' method='post'>";
        echo "<input type='hidden' name='ID_Membre' value='" . $row['ID_Membre'] . "'>";
        echo "<button type='submit' class='btn btn-danger'>Supprimer</button>";
        echo "</form>";
        echo "</td>";
        echo "</tr>";
    }

    // Terminez le tableau
    echo "</tbody>";
    echo "</table>";
} catch(PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>
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









