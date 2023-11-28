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

    // Préparation de la requête SQL
    $stmt = $conn->prepare("INSERT INTO contrat_adhesion (ID_Membre, Type_Contrat, Date_Debut_Contrat, Date_Fin_Contrat) VALUES (:id_membre, :type_contrat, :date_debut_contrat, :date_fin_contrat)");

    // Liaison des paramètres
    $stmt->bindParam(':id_membre', $_POST['id_membre']);
    $stmt->bindParam(':type_contrat', $_POST['type_contrat']);
    $stmt->bindParam(':date_debut_contrat', $_POST['date_debut_contrat']);
    $stmt->bindParam(':date_fin_contrat', $_POST['date_fin_contrat']);

    // Exécution de la requête
    $stmt->execute();

    echo "Contrat ajouté avec succès.";
} catch(PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

$conn = null;