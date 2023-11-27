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
    $conn = new PDO("mysql:host=10.20.20.40;dbname=PROJETBDD", "gabriel", "gabriel");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Préparez et exécutez la requête SQL
    if ($type == 'all') {
        $sql = "SELECT * FROM membre";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    } else {
        $valid_columns = ['Prenom', 'Nom', 'ID_membre'];
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
        echo "<td>" . $row['ID_membre'] . "</td>";
        echo "<td>" . $row['Nom'] . "</td>";
        echo "<td>" . $row['Prenom'] . "</td>";
        echo "<td>" . $row['Email'] . "</td>";
        echo "<td>";
        echo "<form action='script/script_suppression.php' method='post'>";
        echo "<input type='hidden' name='ID_membre' value='" . $row['ID_membre'] . "'>";
        echo "<button type='submit' class='btn btn-danger'>Supprimer</button>";
        echo "</form>";
        echo "</td>"; // Ajoutez cette ligne
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









