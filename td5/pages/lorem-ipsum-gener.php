<?php
// Récupérer 30 paragraphes de lorem ipsum
$lipsumUrl = "https://lipsum.com/";
$xml = @simplexml_load_file($lipsumUrl); // Le @ pour supprimer les warnings

// Vérifier si le chargement a réussi
if ($xml === false) {
    die("Erreur lors de la récupération des paragraphes de Lipsum.");
}

// Stocker les paragraphes dans un tableau
$paragraphs = [];
foreach ($xml->feed->entry as $entry) {
    $paragraphs[] = (string) $entry->content;
}

// Initialiser la variable pour les paragraphes générés
$generatedParagraphs = '';

// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $numParagraphs = isset($_POST['numParagraphs']) ? intval($_POST['numParagraphs']) : 0;

    // S'assurer que le nombre demandé est valide
    if ($numParagraphs > 0 && $numParagraphs <= count($paragraphs)) {
        // Générer les paragraphes demandés
        $generatedParagraphs = implode("\n\n", array_slice($paragraphs, 0, $numParagraphs));
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Générateur de Lorem Ipsum</title>
</head>
<body>
    <h1>Générateur de Lorem Ipsum</h1>

    <form method="POST" action="">
        <label for="numParagraphs">Choisissez le nombre de paragraphes :</label>
        <input type="number" id="numParagraphs" name="numParagraphs" min="1" max="30" required>
        <button type="submit">Générer</button>
    </form>

    <h2>Résultat :</h2>
    <textarea rows="10" cols="100" readonly><?php echo htmlspecialchars($generatedParagraphs); ?></textarea>
</body>
</html>
