<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    try {
        $conn = new PDO("mysql:host=10.20.20.40;dbname=V_ONE", "gabriel", "gabriel");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT * FROM membre WHERE email = ?";
        $stmt= $conn->prepare($sql);
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user) {
            $storedPassword = $user['Password'];

            if (password_verify($password, $storedPassword)) {
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
            }
        } else {
            echo "Email non trouvé dans la base de données.<br>";
        }
    } catch(PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}
?>
