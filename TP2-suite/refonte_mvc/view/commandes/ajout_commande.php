<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajout de commande</title>
</head>
<body>
    <form action="index.php?action=ajouter" method="post">
        <input type="hidden" name="action" value="ajouter">
        
        <label>Client :</label><br>
            <select name="client">
                <?php foreach ($clients as $client): ?>
                    <option value="<?php echo $client['idClient']; ?>">
                        <?php echo $client['prenom'] . " " . $client['nom']; ?>
                    </option>
                <?php endforeach; ?>
            </select><br>

        <label>Date de livraison :</label>
            <input type="date" name="date_livraison"><br>

        <label>Statut :</label>
            <select name="statut">
                <option value="attente">En attente</option>
                <option value="validée">Validée</option>
                <option value="livrée">Livrée</option>
            </select><br>
            
        <label>Produit :</label>
            <input type="text" name="produit"><br>
        <input type="submit" value="Envoyer">
    </form>
</body>
</html>