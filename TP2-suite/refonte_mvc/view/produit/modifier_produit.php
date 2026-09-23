<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modification d'un produit</title>
</head>
<body>
    <form action="index.php" method="post">
        <input type="hidden" name="action" value="modifierProduit">
        <input type="hidden" name="idProduit" value="<?php echo $produit['idProduit']; ?>">
        
        <label>Nom du produit :</label>
            <input type="text" name="nomProduit" value="<?php echo $produit['nomProduit']; ?>"><br>
        <label>Prix unitaire :</label>
            <input type="number" name="prixUnitaire" value="<?php echo $produit['prixUnitaire']; ?>"><br>

        <input type="submit" value="Envoyer">
    </form>
</body>
</html>