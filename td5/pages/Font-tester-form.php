<?php
// Définit les valeurs par défaut
$defaultColor = '#000000'; // Noir par défaut
$defaultSize = 12; // Taille par défaut
$message = '';
$size = $defaultSize;
$color = $defaultColor;

// Vérification des données soumises par le formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['message'])) {
        $message = htmlspecialchars($_POST['message']);
    }

    // Vérification de la couleur
    if (!empty($_POST['color'])) {
        $color = htmlspecialchars($_POST['color']);
    }

    // Vérification de la taille
    if (isset($_POST['size']) && is_numeric($_POST['size'])) {
        $size = intval($_POST['size']);
    }
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

    <h2>Saisir un message :</h2>
    <form method="POST" action="">
        <label for="message">Message:</label><br>
        <textarea id="message" name="message" rows="4" cols="50" required></textarea><br>
        
        <label for="color">Couleur:</label><br>
        <input type="color" id="color" name="color" value="<?php echo $color; ?>"><br>
        
        <label for="size">Taille:</label><br>
        <input type="number" id="size" name="size" value="<?php echo $size; ?>" min="1"><br>
        
        <button type="submit">Envoyer</button>
    </form>

    <h2>Ajuster la taille du message :</h2>
    <a href="?message=<?php echo urlencode($message); ?>&color=<?php echo urlencode($color); ?>&size=<?php echo max(1, $size - 1); ?>">-</a>
    <span><?php echo $size; ?></span>
    <a href="?message=<?php echo urlencode($message); ?>&color=<?php echo urlencode($color); ?>&size=<?php echo $size + 1; ?>">+</a>
</body>
</html>
