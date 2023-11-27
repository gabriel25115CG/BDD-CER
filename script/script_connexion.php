<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    try {
        $conn = new PDO("mysql:host=10.20.20.40;dbname=PROJETBDD", "gabriel", "gabriel");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT * FROM membre WHERE Email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user) {
            // Vérifie si la colonne 'password' est présente dans le résultat
            if (isset($user['password'])) {
                $storedPassword = $user['password'];

                if (password_verify($password, $storedPassword)) {
                    echo "Mot de passe stocké : " . $storedPassword . "<br>";

                    $_SESSION['user'] = $user;

                    if ($email == "admin@gmail.com") {
                        echo "Redirection vers admin.php<br>";
                        header("Location: ../admin.php");
                    } else {
                        echo "Redirection vers index_authentifier.php<br>";
                        header("Location: ../index_authentifier.php");
                    }

                    exit();
                } else {
                    echo "Le mot de passe ne correspond pas.<br>";
                    echo "Mot de passe entré : " . $password . "<br>";
                    echo "Mot de passe stocké : " . $storedPassword . "<br>";
                }
            } else {
                echo "La colonne 'password' n'est pas présente dans le résultat.<br>";
            }
        } else {
            echo "Email non trouvé dans la base de données.<br>";
        }
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}
?>
