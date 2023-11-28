<?php
session_start();

// Vérifier si l'utilisateur est connecté et a le statut d'administrateur
if (isset($_SESSION['user']) && $_SESSION['user']['Email'] == "admin@gmail.com") {
    // L'utilisateur est un administrateur, continuer l'exécution de la page

    // ... le reste du code de la page admin.php ...

} else {
    // Rediriger vers une page d'erreur ou une autre page autorisée
    header("Location: ../index_authentifier.php");
    exit();
}
?>