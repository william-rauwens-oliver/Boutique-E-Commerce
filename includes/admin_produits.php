<?php
require 'includes/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = $_POST['nom'];
    $description = $_POST['description'];
    $prix = $_POST['prix'];
    $image = $_POST['image'];

    $sql = "INSERT INTO produits (nom, description, prix, image) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nom, $description, $prix, $image]);

    echo "Produit ajouté avec succès!";
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Produit</title>
</head>
<body>
    <header>
        <h1>Ajouter un Produit</h1>
    </header>
    <main>
        <form method="post" action="">
            <label for="nom">Nom du produit :</label>
            <input type="text" id="nom" name="nom" required>
            
            <label for="description">Description :</label>
            <textarea id="description" name="description"></textarea>
            
            <label for="prix">Prix :</label>
            <input type="number" id="prix" name="prix" step="0.01" required>
            
            <label for="image">Image URL :</label>
            <input type="text" id="image" name="image">
            
            <button type="submit">Ajouter le produit</button>
        </form>
    </main>
</body>
</html>
