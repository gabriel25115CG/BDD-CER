<?php
session_start();
// Configuration de la base de données
$servername = "10.20.20.40";
$username = "gabriel";
$password = "gabriel";
$dbname = "PROJETBDD";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Vérifiez si l'utilisateur a déjà des coordonnées bancaires
    $stmt = $conn->prepare("SELECT * FROM donnees_paiement WHERE ID_Membre = :id_membre");
    $stmt->bindParam(':id_membre', $_POST['id_membre']);
    $stmt->execute();

    // Définir les informations bancaires à 0 si le type de paiement est "espece" ou "cheque"
    $informations_bancaire = ($_POST['type_paiement'] == 'espece' || $_POST['type_paiement'] == 'cheque') ? 0 : $_POST['numero_carte'];

    // Définir la date du jour
    $date_paiement = date('Y-m-d');

    if ($stmt->rowCount() > 0) {
        // L'utilisateur a déjà des coordonnées bancaires, donc nous mettons à jour
        $stmt = $conn->prepare("UPDATE donnees_paiement SET Type_Paiement = :type_paiement, Informations_Bancaire = :informations_bancaire, Date_Paiement = :date_paiement WHERE ID_Membre = :id_membre");
    } else {
        // L'utilisateur n'a pas de coordonnées bancaires, donc nous insérons
        $stmt = $conn->prepare("INSERT INTO donnees_paiement (ID_Membre, Type_Paiement, Informations_Bancaire, Date_Paiement) VALUES (:id_membre, :type_paiement, :informations_bancaire, :date_paiement)");
    }

    // Liaison des paramètres
    $stmt->bindParam(':id_membre', $_POST['id_membre']);
    $stmt->bindParam(':type_paiement', $_POST['type_paiement']);
    $stmt->bindParam(':informations_bancaire', $informations_bancaire);
    $stmt->bindParam(':date_paiement', $date_paiement);

    // Exécution de la requête
    $stmt->execute();

    echo "Coordonnées bancaires ajoutées ou mises à jour avec succès.";
} catch(PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

$conn = null;
?>

