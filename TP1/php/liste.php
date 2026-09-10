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
        <!-- Boucle pour afficher les commandes dans le tableau -->
            <?php
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { 
                echo "<tr>
                        <td>" . $row['numCommande'] . "</td>
                        <td>" . $row['prenom'] . " " . $row['nom'] . "</td>
                        <td>" . $row['dateCommande'] . "</td>
                        <td>" . $row['dateLivraison'] . "</td>
                        <td>" . $row['statut'] . "</td>
                        <td> <a href='modifier.php?numCommande=" . $row['numCommande'] . "'>Modifier</a> <a href='supprimer.php?numCommande=" . $row['numCommande'] . "'>Supprimer</a> <a href='devis.php?numCommande=" . $row['numCommande'] . "'>Voir</a></td>
                    </tr>"; 
            }
            ?>

</body>
</html>


