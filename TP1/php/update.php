<?php
require('connexion.php');// Connexion à la base de données via la fichier connexion.php

// Requête de mise à jour de la commande
$stmt = $pdo->prepare("UPDATE commandes SET dateCommande = :dateCommande, dateLivraison = :dateLivraison, statut = :statut, produit = :produit, quantite = :quantite WHERE numCommande = :numCommande"); 

// Exécution de la requête en définissant les valeurs à partir des données du formulaire de modification de commande
$stmt->execute([
    ":dateCommande" => $_POST['dateCommande'],
    ":dateLivraison" => $_POST['dateLivraison'],
    ":statut" => $_POST['statut'],
    ":produit" => $_POST['produit'],
    ":quantite" => $_POST['quantite'],
    ":numCommande" => $_POST['numCommande']
]);

// Vérification de l'exécution de la requête
if ($stmt === false) {
    echo "Erreur: La mise à jour a échoué. ";
}
else {
    echo "La commande a bien été mise à jour.";
}
?>

<!-- Bouton retour -->
<button><a href="liste.php">Retour à la liste des commandes -></a></button>