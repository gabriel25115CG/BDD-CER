


<?php
session_start();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulter Facture</title>
    <!-- Inclure Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Ajouter un thème sombre -->
    <style>
          body {
        background-color: #343a40;
        color: white;
    }
    .navbar-custom {
        background-color: #212529;
    }
    .navbar {
        background-color: #212529;
    } /* Ajoutez cette accolade fermante */
    .btn-custom {
        background-color: #007bff;
        border-radius: 25px;
        color: white;
    }
    .btn-custom:hover {
        background-color: #0056b3;
        color: white;
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
<body>
<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <a class="navbar-brand" href="index_authentifier.php">
        <img src="../images/planete-terre.png" alt="Logo" style="width: 40px; height: 40px; margin-right: 40px;">
        Communauté d'Énergie Renouvelable
    </a>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <button class="btn btn-success ml-2" onclick="window.location.href='index.php'">Accueil</button>
            </li>
        </ul>
    </div>
</nav>
<br>
<br>
<br>
<br>
<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$servername = "10.20.20.40";
$username = "gabriel";
$password = "gabriel";
$dbname = "PROJETBDD";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}


// Vérifiez si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérez le numéro de facture de l'utilisateur
    $id_facture = $_POST['ID_Facture'];

    // Préparez et exécutez la requête SQL pour récupérer la facture de l'utilisateur
    $sql = "SELECT * FROM facture WHERE ID_Facture = :ID_Facture";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':ID_Facture', $id_facture);
    $stmt->execute();
    $facture = $stmt->fetch(PDO::FETCH_ASSOC);

    // Assurez-vous que la facture existe
    if ($facture) {
        // Affichez les informations de la facture
        echo "ID_Facture : " . $facture['ID_Facture'] . "<br>";
        echo "ID_Cout : " . $facture['ID_Cout'] . "<br>";
        echo "ID_Membre : " . $facture['ID_Membre'] . "<br>";
        echo "ID_Consommation : " . $facture['ID_Consommation'] . "<br>";
        echo "Montant_Total : " . $facture['Montant_Total'] . "<br>";
        echo "Date_Facturation : " . $facture['Date_Facturation'] . "<br>";
    } else {
        echo "Aucune facture trouvée avec l'ID_Facture : " . $id_facture;
    }
}
?>

    <footer class="footer">
    <footer class="footer">
    <div class="container">
        <span class="text-white">Communauté d'Énergie Renouvelable</span>
    </div>
</footer>
</footer>

    <!-- Inclure Bootstrap JS et jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>











































