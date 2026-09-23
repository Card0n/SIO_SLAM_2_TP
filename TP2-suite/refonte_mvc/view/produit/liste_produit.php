<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des produits</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <nav>
        <button><a href="index.php">Commandes</a></button>
        <button><a href="index.php?action=listeClients">Clients</a></button>
        <button><a href="index.php?action=listeProduits">Produits</a></button>
        <button><a href="index.php?action=listeStatut">Statut</a></button>
    </nav>
    <h1>Liste des produits</h1>
    <br>

    <button><a href="index.php?action=ajouterProduit">Ajouter un produit</a></button>

    <table>
        <tr>
            <th>Produit</th>
            <th>Prix unitaire</th>
            <th>Actions</th>
        </tr>

        <?php foreach ($produits as $produit): ?> 
        <tr>
            <td><?php echo $produit['nomProduit']; ?></td>
            <td><?php echo $produit['prixUnitaire']; ?></td>
            
            <td> <a href='index.php?action=modifierProduit&idProduit=<?php echo $produit['idProduit']; ?>'>Modifier</a> 
            <a href='index.php?action=supprimerProduit&idProduit=<?php echo $produit['idProduit']; ?>'>Supprimer</a>
        </tr>
        <?php endforeach; ?>
    </table>

</body>
</html>
