<?php
require('connexion.php'); // Connexion à la base de données via la fichier connexion.php

// Requête de suppression de la commande avec le numéro de commande
$stmt = $pdo->query("DELETE FROM commandes WHERE numCommande =" . $_GET['numCommande'] . ";"); 

// Vérification de l'exécution de la requête
if ($stmt === false) {
    echo "Erreur: La suppression a échoué. ";
}
else {
    echo "Commande supprimée avec succès.";
}
?>

<!-- Bouton retour -->
<button><a href="liste.php">Retour à la liste des commandes -></a></button>