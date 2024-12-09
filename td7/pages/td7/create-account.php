<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = htmlspecialchars($_POST["email"]);
    $password = htmlspecialchars($_POST["password"]);

    echo "<h2>Compte créé avec succès</h2>";
    echo "<p><strong>Email :</strong> $email</p>";
    echo "<p><strong>Mot de passe :</strong> (sécurisé)</p>";
}
?>
