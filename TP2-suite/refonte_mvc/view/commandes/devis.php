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
        Nom : <?php echo $client['nom']; ?><br>
        Prénom : <?php echo $client['prenom']; ?><br>
        Téléphone : <?php echo $client['telephone']; ?><br>
        Mail : <?php echo $client['mail']; ?><br>
        Adresse : <?php echo $client['adresse']; ?>
    </p>

    <h2>Détails de la commande</h2>
    <p>
        Date de commande : <?php echo $commande['dateCommande']; ?><br>
        Date de livraison souhaitée : <?php echo $commande['dateLivraison']; ?><br>
        Statut : <?php echo $statut['nomStatut']; ?>
    </p>

    <table>
        <tr>
            <th>Produit</th>
            <th>Quantité</th>
            <th>Montant total</th>
        </tr>
        <tr>
            <td><?php echo $produit['nomProduit']; ?></td>
            <td><?php echo $commande['quantite']; ?></td>
            <td><?php echo $produit['prixUnitaire'] * $commande['quantite']; ?> €</td>
        </tr>
    </table>

    <br>
    <button onclick="window.print()">Imprimer le devis</button>
    <button><a href="index.php">Retour à la liste</a></button>
</body>
</html>