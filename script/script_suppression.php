<?php
session_start();

if (isset($_POST['ID_membre'])) {
    $ID_Membre = $_POST['ID_membre'];

    try {
        // Connectez-vous à la base de données
        $conn = new PDO("mysql:host=10.20.20.40;dbname=PROJETBDD", "gabriel", "gabriel");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Préparez et exécutez la requête SQL
        $sql = "DELETE FROM membre WHERE ID_membre = :ID_membre";
        $stmt = $conn->prepare($sql);
        $stmt->execute(['ID_membre' => $ID_Membre]);

        // Redirigez l'utilisateur vers la page de consultation
        header("Location: script_consultation.php");
    } catch(PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
} else {
    echo "Erreur : ID_Membre non défini.";
}
?>