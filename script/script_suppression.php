<?php

if (isset($_POST['ID_Membre'])) {
    $ID_Membre = $_POST['ID_Membre'];

    try {
        // Connectez-vous à la base de données
        $conn = new PDO("mysql:host=10.20.20.40;dbname=V_ONE", "gabriel", "gabriel");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Préparez et exécutez la requête SQL
        $sql = "DELETE FROM membre WHERE ID_Membre = :ID_Membre";
        $stmt = $conn->prepare($sql);
        $stmt->execute(['ID_Membre' => $ID_Membre]);

        // Redirigez l'utilisateur vers la page de consultation
        header("Location: script_consultation.php");
    } catch(PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
} else {
    echo "Erreur : ID_Membre non défini.";
}
?>