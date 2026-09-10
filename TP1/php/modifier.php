<?php
require('connexion.php');// Connexion à la base de données via la fichier connexion.php

// Récupération des données de la commande à modifier via le numéro de commande
$stmt = $pdo->query("SELECT * FROM commandes JOIN clients ON commandes.idClient = clients.idClient WHERE numCommande =" . $_GET['numCommande'] . ";"); 
$row = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modification de la commande</title>
</head>

<body>
    <!--Formulaire de modification de commande pré-rempli avec value-->
    <form action="update.php" method="post">
        <!--Champ caché pour que le numéro de commande soit récupérable dans update.php-->
        <input type="hidden" name="numCommande" value= "<?php echo $row['numCommande']; ?>">
        <label>Client :</label>
            <input type="text" name="client" value= "<?php echo $row['prenom'] . ' ' . $row['nom']; ?>" readonly><br>
        <label>Date de commande :</label>
            <input type="date" name="dateCommande" value= "<?php echo $row['dateCommande']; ?>" ><br>
        <label>Date de livraison :</label>
            <input type="date" name="dateLivraison" value= "<?php echo $row['dateLivraison']; ?>" ><br>
        <label>Statut :</label>
            <input type="text" name="statut" value= "<?php echo $row['statut']; ?>" ><br>
        <label>Produit :</label>
            <input type="text" name="produit" value= "<?php echo $row['produit']; ?>" ><br>
        <label>Quantité :</label>
            <input type="number" name="quantite" value= "<?php echo $row['quantite']; ?>" ><br>
        <input type="submit" value="Envoyer">
    </form>
    
</body>
</html>