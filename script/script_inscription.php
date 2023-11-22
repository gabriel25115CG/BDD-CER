<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $prenom = $_POST["prenom"];
    $nom = $_POST["nom"];
    $adresse = $_POST["adresse"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];

  

    if ($password != $confirmPassword) {
        echo "Le mot de passe et la confirmation du mot de passe ne correspondent pas.";
    } else {
        $password = password_hash($password, PASSWORD_DEFAULT);

        try {
            $conn = new PDO("mysql:host=10.20.20.40;dbname=PROJETCER", "gabriel", "gabriel");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "INSERT INTO connexion (prenom, nom, email, mot_de_passe) VALUES (?, ?, ?, ?)";
            $stmt= $conn->prepare($sql);
            $stmt->execute([$prenom, $nom, $adresse, $email, $password]);

            echo "Nouveau compte créé avec succès. Vous serez redirigé vers la page de connexion dans 4 secondes.";
            echo '<meta http-equiv="refresh" content="4;url=connexion.php" />';
        } catch(PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
        $conn = null;
    }
}
?>