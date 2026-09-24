<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Devis commande</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <h1>Devis - Commande n°<?php echo $commande['numCommande']; ?></h1>

    <h2>Coordonnées du client</h2>
    <p>
        Nom : <?php echo $commande['nom']; ?><br>
        Prénom : <?php echo $commande['prenom']; ?><br>
        Téléphone : <?php echo $commande['telephone']; ?><br>
        Mail : <?php echo $commande['mail']; ?><br>
        Adresse : <?php echo $commande['adresse']; ?>
    </p>

    <h2>Détails de la commande</h2>
    <p>
        Date de commande : <?php echo $commande['dateCommande']; ?><br>
        Date de livraison souhaitée : <?php echo $commande['dateLivraison']; ?><br>
        Statut : <?php echo $commande['statut']; ?>
    </p>

    <table>
        <tr>
            <th>Produit</th>
            <th>Quantité</th>
            <th>Montant total</th>
        </tr>
        <tr>
            <td><?php echo $commande['produit']; ?></td>
            <td><?php echo $commande['quantite']; ?></td>
            <td><?php echo $commande['prixUnitaire'] * $commande['quantite']; ?> €</td>//modifie
        </tr>
    </table>

    <br>
    <button onclick="window.print()">Imprimer le devis</button>
    <button><a href="index.php">Retour à la liste</a></button>
</body>
</html>