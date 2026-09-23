<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modification de la commande</title>
</head>
<body>
    <form action="index.php" method="post">
        <input type="hidden" name="action" value="modifierCommande">
        <input type="hidden" name="numCommande" value="<?php echo $commande['numCommande']; ?>">
        <input type="hidden" name="idClient" value="<?php echo $commande['idClient']; ?>">
        
        <label>Client :</label>
            <input type="text" value="<?php echo $commande['prenom'] . ' ' . $commande['nom']; ?>" readonly><br>
        <label>Date de commande :</label>
            <input type="date" name="dateCommande" value="<?php echo $commande['dateCommande']; ?>" ><br>
        <label>Date de livraison :</label>
            <input type="date" name="dateLivraison" value="<?php echo $commande['dateLivraison']; ?>" ><br>
        <label>Statut :</label>
            <input type="text" name="statut" value="<?php echo $commande['statut']; ?>" ><br>
        <label>Produit :</label>
            <input type="text" name="produit" value="<?php echo $commande['produit']; ?>" ><br>
        <label>Quantité :</label>
            <input type="number" name="quantite" value="<?php echo $commande['quantite']; ?>" ><br>
        <input type="submit" value="Envoyer">
    </form>
</body>
</html>