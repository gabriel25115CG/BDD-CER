<?php
session_start();

// Assurez-vous que l'utilisateur est connecté
if (!isset($_SESSION['user'])) {
    header("Location: connexion.php");
    exit();
}

// Obtenez l'ID du membre à partir de la session
$id_membre = $_SESSION['user']['ID_membre'];

// Obtenez les informations du site de production à partir des données du formulaire
$id_type_source = $_POST['ID_Type_Source'];
$capacite_production = $_POST['Capacite_Production'];
$donnees_geographique = $_POST['Donnees_Geographique'];

try {
    // Établissez une connexion à la base de données
    $conn = new PDO("mysql:host=10.20.20.40;dbname=PROJETBDD", "gabriel", "gabriel");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Préparez et exécutez la requête SQL
    $sql = "INSERT INTO site_production (ID_Membre, ID_Type_Source, Capacite_Production, Donnees_Geographique) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id_membre, $id_type_source, $capacite_production, $donnees_geographique]);

    echo "Le site de production a été déclaré avec succès.";
} catch(PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>