<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Listes des commandes</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <h1>Liste des commandes</h1>
    <br>

    <button><a href="index.php?action=ajout">Ajouter une commande</a></button>

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
            
            <td> <a href='index.php?action=modifier&numCommande=<?php echo $commande['numCommande']; ?>'>Modifier</a> 
            <a href='index.php?action=supprimer&numCommande=<?php echo $commande['numCommande']; ?>'>Supprimer</a> 
            <a href='index.php?action=voir&numCommande=<?php echo $commande['numCommande']; ?>'>Voir</a></td>
        </tr>
        <?php endforeach; ?>
    </table>

</body>
</html>
