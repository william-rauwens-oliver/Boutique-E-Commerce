<?php
$host = 'localhost'; // Adresse de l'hôte de la base de données
$dbname = 'ecommerceBoutique'; // Nom de la base de données
$user = 'root'; // Nom d'utilisateur
$pass = 'root'; // Mot de passe

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Échec de la connexion : ' . $e->getMessage();
}
?>
