<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajout de produit</title>
</head>
<body>
    <form action="index.php" method="post">
        <input type="hidden" name="action" value="ajouterProduit">
        
        <label>Nom du produit :</label>
            <input type="text" name="nomProduit"><br>
        <label>Prix unitaire :</label>
            <input type="number" name="prixUnitaire"><br>

        <input type="submit" value="Envoyer">
    </form>
</body>
</html>