<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modification de la commande</title>
</head>
<body>
    <form action="index.php" method="post">
        <input type="hidden" name="action" value="modifier">
        <input type="hidden" name="numCommande" value="<?php echo $row['numCommande']; ?>">
        <input type="hidden" name="idClient" value="<?php echo $row['idClient']; ?>">
        
        <label>Client :</label>
            <input type="text" value="<?php echo $row['prenom'] . ' ' . $row['nom']; ?>" readonly><br>
        <label>Date de commande :</label>
            <input type="date" name="dateCommande" value="<?php echo $row['dateCommande']; ?>" ><br>
        <label>Date de livraison :</label>
            <input type="date" name="dateLivraison" value="<?php echo $row['dateLivraison']; ?>" ><br>
        <label>Statut :</label>
            <input type="text" name="statut" value="<?php echo $row['statut']; ?>" ><br>
        <label>Produit :</label>
            <input type="text" name="produit" value="<?php echo $row['produit']; ?>" ><br>
        <label>Quantité :</label>
            <input type="number" name="quantite" value="<?php echo $row['quantite']; ?>" ><br>
        <input type="submit" value="Envoyer">
    </form>
</body>
</html>