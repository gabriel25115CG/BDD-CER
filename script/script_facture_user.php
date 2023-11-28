<?php
// Démarrez la session
session_start();

// Vérifiez si l'utilisateur est connecté
if (!isset($_SESSION['ID_membre'])) {
    // Redirigez vers la page de connexion si l'utilisateur n'est pas connecté
    header("Location: connexion.php");
    exit();
}

// Informations de connexion à la base de données
$serveur = "10.20.20.40";
$utilisateur = "gabriel";
$mot_de_passe = "gabriel";
$base_de_donnees = "PROJETBDD";

// Connexion à la base de données
$connexion = new mysqli($serveur, $utilisateur, $mot_de_passe, $base_de_donnees);

// Vérifiez la connexion à la base de données
if ($connexion->connect_error) {
    die("La connexion à la base de données a échoué : " . $connexion->connect_error);
}

// Récupérez l'ID_membre de la session
$id_membre = $_SESSION['ID_membre'];

// Demandez à l'utilisateur de saisir l'ID_Facture
echo "Veuillez saisir l'ID_Facture : ";
$id_facture = trim(fgets(STDIN)); // Utilisation de fgets pour lire l'entrée de l'utilisateur depuis la console

// Sélectionnez les informations de la facture depuis la base de données
$query = "SELECT * FROM facture WHERE ID_Facture = $id_facture AND ID_Membre = $id_membre";
$resultat = $connexion->query($query);

// Vérifiez si la requête a réussi
if ($resultat) {
    // Vérifiez s'il y a des résultats
    if ($resultat->num_rows > 0) {
        // Récupérez la ligne résultante
        $row = $resultat->fetch_assoc();

        // Affichez toutes les informations de la facture
        echo "ID_Facture : " . $row['ID_Facture'] . "\n";
        echo "ID_Cout : " . $row['ID_Cout'] . "\n";
        echo "ID_Consommation : " . $row['ID_Consommation'] . "\n";
        echo "Montant_Total : " . $row['Montant_Total'] . "\n";
        echo "Date_Facturation : " . $row['Date_Facturation'] . "\n";
    } else {
        echo "Aucune facture trouvée pour l'ID_Facture $id_facture et l'ID_Membre $id_membre.";
    }
} else {
    echo "Erreur lors de la récupération des informations de la facture : " . $connexion->error;
}

// Fermez la connexion à la base de données
$connexion->close();
?>
