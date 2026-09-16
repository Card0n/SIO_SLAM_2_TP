<?php
require('connexion.php');// Connexion à la base de données via la fichier connexion.php

$stmt = $pdo->query("SELECT * FROM commandes JOIN clients ON commandes.idClient = clients.idClient"); // Requête pour récupérer les commandes avec les informations des clients
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Listes des commandes</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <h1>Liste des commandes</h1>
    <br>

    <button><a href="ajout.php">Ajouter une commande</a></button>

    <table>
        <tr>
            <th>N° commande</th>
            <th>Client</th>
            <th>Date de commande</th>
            <th>Date de livraison</th>
            <th>Statut</th>
            <th>Actions</th>
        </tr>

        <?php foreach ($commandes as $commande): ?> 
        <tr>
            <td><?php echo $commande['numCommande']; ?></td>
            <td><?php echo $commande['prenom'] . " " . $commande['nom']; ?></td>
            <td><?php echo $commande['dateCommande']; ?></td>
            <td><?php echo $commande['dateLivraison']; ?></td>
            <td><?php echo $commande['statut']; ?></td>
            
            <td> <a href='modifier.php?numCommande=<?php echo $commande['numCommande']; ?>'>Modifier</a> 
            <a href='supprimer.php?numCommande=<?php echo $commande['numCommande']; ?>'>Supprimer</a> 
            <a href='devis.php?numCommande=<?php echo $commande['numCommande']; ?>'>Voir</a></td>
        </tr>
        <?php endforeach; ?>
    </table>

</body>
</html>
