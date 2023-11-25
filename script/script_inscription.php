<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $prenom = $_POST["prenom"];
    $nom = $_POST["nom"];
    $adresse = $_POST["adresse"];
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);
    $confirmPassword = trim($_POST["confirmPassword"]);
    $subvention = isset($_POST["Subvention"]) ? 1 : 0;

    echo "Mot de passe : " . $password . "<br>";
    echo "Confirmation du mot de passe : " . $confirmPassword . "<br>";

    if ($password != $confirmPassword) {
        echo "Le mot de passe et la confirmation du mot de passe ne correspondent pas.";
    } else {
        $password = password_hash($password, PASSWORD_DEFAULT);

        try {
            $conn = new PDO("mysql:host=10.20.20.40;dbname=V_ONE", "gabriel", "gabriel");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "INSERT INTO membre (prenom, nom, adresse_membre, email, password, subvention) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt= $conn->prepare($sql);
            $stmt->execute([$prenom, $nom, $adresse, $email, $password, $subvention]);

            echo "Nouveau compte créé avec succès. Vous serez redirigé vers la page de connexion dans 4 secondes.";
            echo '<meta http-equiv="refresh" content="4;url=/connexion.php" />';
        } catch(PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
        $conn = null;
    }
}
?>