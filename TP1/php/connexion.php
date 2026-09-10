<?php 
$dsn = "mysql:host=localhost;dbname=gestion_commande;charset=utf8"; 
$user = "root"; 
$password = ""; 

// Connexion à la base de données avec PDO
try { 
    $pdo = new PDO($dsn, $user, $password); 
    // Activation des erreurs 
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) { 
    echo "Erreur de connexion : " . $e->getMessage(); 
} 

?>