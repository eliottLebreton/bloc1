<!-- submit-contact.php -->
<?php
// Vérifier si la méthode POST a été utilisée pour envoyer le formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données envoyées par le formulaire
    $prenom = htmlspecialchars($_POST['prenom']);  // Sécuriser les données pour éviter les attaques XSS
    $nom = htmlspecialchars($_POST['nom']);
    $mail = htmlspecialchars($_POST['mail']);
    $commentaire = htmlspecialchars($_POST['commentaire']);
    
    // Afficher les données reçues
    echo "<h1>Informations Soumises :</h1>";
    echo "<p><strong>Prénom:</strong> " . $prenom . "</p>";
    echo "<p><strong>Nom:</strong> " . $nom . "</p>";
    echo "<p><strong>Email:</strong> " . $mail . "</p>";
    echo "<p><strong>Commentaire:</strong> " . nl2br($commentaire) . "</p>"; // nl2br pour les sauts de ligne dans le commentaire
} else {
    echo "<p>Aucune donnée soumise. Veuillez remplir le formulaire.</p>";
}
?>
