<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajout de produit à la commande</title>
</head>
<body>
<form action="index.php" method="post">
        <input type="hidden" name="action" value="ajouterProduitCommande">
        <input type="hidden" name="numCommande" value="<?php echo $commande['numCommande']; ?>">

        <label>Client :</label><br>
        <select name="idClient" readonly>
            <?php foreach ($clients as $client): ?>
                <option value="<?php echo $client['idClient']; ?>" 
                <?php if ($client['idClient'] == $commande['idClient']) { echo "selected"; } ?>>
                    <?php echo $client['prenom'] . " " . $client['nom']; ?>
                </option>
            <?php endforeach; ?>
        </select><br><br>

        <label>Date de livraison :</label><br>
        <input type="date" name="dateLivraison" value="<?php echo $commande['dateLivraison']; ?>" readonly><br><br>

        <label>Statut :</label><br>
        <select name="idStatut" readonly>
            <?php foreach ($statuts as $statut): ?>
                <option value="<?php echo $statut['idStatut']; ?>" 
                <?php if ($statut['idStatut'] == $commande['idStatut']) { echo "selected"; } ?>>
                    <?php echo $statut['nomStatut']; ?>
                </option>
            <?php endforeach; ?>
        </select><br><br>

        <label>Produit :</label><br>
        <select name="idProduit">
            <?php foreach ($produits as $produit): ?>
                <option value="<?php echo $produit['idProduit']; ?>" 
                <?php if ($produit['idProduit'] == $commande['idProduit']) { echo "selected"; } ?>>
                    <?php echo $produit['nomProduit']; ?>
                </option>
            <?php endforeach; ?>
        </select><br><br>

        <label>Quantité :</label><br>
        <input type="number" name="quantite" value="<?php echo $commande['quantite']; ?>"><br><br>

        <input type="submit" value="Enregistrer les modifications">
    </form>
</body>
</html>