<?php
echo "Début du script<br>";

try {
    // Connectez-vous à la base de données
    $conn = new PDO("mysql:host=10.20.20.40;dbname=PROJETBDD", "gabriel", "gabriel");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Après la connexion à la base de données<br>";

    // Vérifiez si une requête de suppression a été envoyée
    if (isset($_POST['ID_Site'])) {
        // Préparez et exécutez la requête SQL de suppression
        $sql = "DELETE FROM site_production WHERE ID_Site = :ID_Site";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':ID_Site', $_POST['ID_Site']);
        $stmt->execute();
    }

    // Préparez et exécutez la requête SQL de sélection
    $sql = "SELECT * FROM site_production";
    $stmt = $conn->prepare($sql);
    $stmt->execute();


    // Commencez le tableau
    echo "<table border='1'>";
    echo "<tr><th>ID_Site</th><th>ID_Membre</th><th>ID_Type_Source</th><th>Capacite_Production</th><th>Donnees_Geographique</th><th>ID_Production</th><th>Action</th></tr>";

    // Parcourez et affichez les résultats
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>{$row['ID_Site']}</td>";
        echo "<td>{$row['ID_Membre']}</td>";
        echo "<td>{$row['ID_Type_Source']}</td>";
        echo "<td>{$row['Capacite_Production']}</td>";
        echo "<td>{$row['Donnees_Geographique']}</td>";
        echo "<td>{$row['ID_Production']}</td>";
        echo "<td>";
        echo "<form action='supprimer_site.php' method='post'>";
        echo "<input type='hidden' name='ID_Site' value='{$row['ID_Site']}'>";
        echo "<input type='submit' value='Supprimer'>";
        echo "</form>";
        echo "</td>";
        echo "</tr>";
    }

    // Terminez le tableau
    echo "</table>";
}
catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>