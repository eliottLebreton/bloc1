<?php
// Définit les valeurs par défaut
$defaultColor = 'black';
$defaultSize = 12;
$errorMessage = 'Aucun paramètre passé dans l\'URL.';
$message = '';
$size = $defaultSize;
$color = $defaultColor;

// Vérification des paramètres GET
if (isset($_GET['message']) && !empty($_GET['message'])) {
    $message = htmlspecialchars($_GET['message']);
    
    // Vérification de la couleur
    if (isset($_GET['color']) && !empty($_GET['color'])) {
        $color = htmlspecialchars($_GET['color']);
    }

    // Vérification de la taille
    if (isset($_GET['size']) && is_numeric($_GET['size'])) {
        $size = intval($_GET['size']);
    }
} else {
    // Si aucun message n'est passé, on affiche le message d'erreur
    $message = $errorMessage;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Affichage de Message</title>
    <style>
        .message {
            color: <?php echo $color; ?>;
            font-size: <?php echo $size; ?>px;
        }
    </style>
</head>
<body>
    <div class="message"><?php echo $message; ?></div>

    <h2>Liens vers différents messages :</h2>
    <ul>
        <li><a href="?message=Bonjour%20tout%20le%20monde&color=red&size=15">Message 1: Rouge (taille 15)</a></li>
        <li><a href="?message=PHP%20est%20génial&color=green&size=30">Message 2: Vert (taille 30)</a></li>
        <li><a href="?message=Merci%20de%20votre%20visite&color=blue&size=50">Message 3: Bleu (taille 50)</a></li>
    </ul>

    <h2>Saisir un message :</h2>
    <form method="GET" action="">
        <label for="message">Message:</label>
        <input type="text" id="message" name="message" required>
        <br>
        <label for="color">Couleur:</label>
        <input type="text" id="color" name="color" placeholder="black">
        <br>
        <label for="size">Taille:</label>
        <input type="number" id="size" name="size" placeholder="12">
        <br>
        <button type="submit">Envoyer</button>
    </form>

    <h2>Ajuster la taille du message :</h2>
    <a href="?message=<?php echo urlencode($message); ?>&color=<?php echo urlencode($color); ?>&size=<?php echo max(1, $size - 1); ?>">-</a>
    <span><?php echo $size; ?></span>
    <a href="?message=<?php echo urlencode($message); ?>&color=<?php echo urlencode($color); ?>&size=<?php echo $size + 1; ?>">+</a>
</body>
</html>
