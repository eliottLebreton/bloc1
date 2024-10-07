<?php
// Initialiser les variables
$numRows = 0;
$numCols = 0;
$tableHTML = '';

// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer le nombre de lignes et de colonnes
    $numRows = isset($_POST['numRows']) ? intval($_POST['numRows']) : 0;
    $numCols = isset($_POST['numCols']) ? intval($_POST['numCols']) : 0;

    // Générer le tableau HTML si les valeurs sont valides
    if ($numRows > 0 && $numCols > 0) {
        $tableHTML .= '<table border="1" cellpadding="5" cellspacing="0">';
        
        // Boucle pour créer les lignes et les colonnes
        for ($i = 0; $i < $numRows; $i++) {
            $tableHTML .= '<tr>';
            for ($j = 0; $j < $numCols; $j++) {
                $tableHTML .= '<td>Cellule ' . ($i + 1) . '-' . ($j + 1) . '</td>';
            }
            $tableHTML .= '</tr>';
        }
        
        $tableHTML .= '</table>';
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Générateur de Tableau HTML</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Générateur de Tableau HTML</h1>

    <form method="POST" action="">
        <label for="numRows">Nombre de lignes :</label>
        <input type="number" id="numRows" name="numRows" min="1" required>
        
        <label for="numCols">Nombre de colonnes :</label>
        <input type="number" id="numCols" name="numCols" min="1" required>
        
        <button type="submit">Générer le tableau</button>
    </form>

    <h2>Résultat du tableau :</h2>
    <div>
        <?php
        // Afficher le tableau généré
        if ($tableHTML) {
            echo $tableHTML;
        }
        ?>
    </div>

    <h2>Code HTML du tableau :</h2>
    <textarea rows="10" cols="100" readonly><?php echo htmlspecialchars($tableHTML); ?></textarea>
</body>
</html>
