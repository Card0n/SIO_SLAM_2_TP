<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajout de commande</title>
</head>
<body>
    <form action="index.php" method="post">
        <input type="hidden" name="action" value="ajouterCommande">
        
        <label>Client :</label><br>
            <select name="idClient">
                <?php foreach ($clients as $client): ?>
                    <option value="<?php echo $client['idClient']; ?>">
                        <?php echo $client['prenom'] . " " . $client['nom']; ?>
                    </option>
                <?php endforeach; ?>
            </select><br>

        <label>Date de livraison :</label>
            <input type="date" name="dateLivraison"><br>

        <label>Statut :</label>
            <select name="idStatut">
                <?php foreach ($statuts as $statut): ?>
                    <option value="<?php echo $statut['idStatut']; ?>">
                        <?php echo $statut['nomStatut']; ?>
                    </option>
                <?php endforeach; ?>
            </select><br>
            
        <label>Produit :</label>
            <select name="idProduit">
                <?php foreach ($produits as $produit): ?>
                    <option value="<?php echo $produit['idProduit']; ?>">
                        <?php echo $produit['nomProduit']; ?>
                    </option>
                <?php endforeach; ?>
                </select><br>

        <label>Quantité :</label>
            <input type="number" name="quantite"><br>
            </select><br>
        <input type="submit" value="Envoyer">
    </form>
</body>
</html>