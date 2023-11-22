<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    try {
        $conn = new PDO("mysql:host=10.20.20.40;dbname=PROJETCER", "gabriel", "gabriel");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT * FROM connexion WHERE email = ?";
        $stmt= $conn->prepare($sql);
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['mot_de_passe'])) {
            session_start();
            $_SESSION['user'] = $user;

            // Si l'e-mail est admin@gmail.com, redirigez vers la page d'administration
            if ($email == "admin@gmail.com") {
                header("Location: ../admin.php");
                exit();
            } else {
                // Rediriger vers index_authentifier.php
                header("Location: ../index_authentifier.php");
                exit();
            }
        } else {
            echo "Email ou mot de passe incorrect";
        }
    } catch(PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
    $conn = null;
}
?>