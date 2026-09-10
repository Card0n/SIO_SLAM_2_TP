<?php
require('connexion.php');

// Récupération de la commande et du client
$stmt = $pdo->prepare("SELECT * FROM commandes JOIN clients ON commandes.idClient = clients.idClient WHERE numCommande = :numCommande");
$stmt->execute([':numCommande' => $_GET['numCommande']]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Devis commande</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <h1>Devis - Commande n°<?php echo $row['numCommande']; ?></h1>

    <h2>Coordonnées du client</h2>
    <p>
        Nom : <?php echo $row['nom']; ?><br>
        Prénom : <?php echo $row['prenom']; ?><br>
        Téléphone : <?php echo $row['telephone']; ?><br>
        Mail : <?php echo $row['mail']; ?><br>
        Adresse : <?php echo $row['adresse']; ?>
    </p>

    <h2>Détails de la commande</h2>
    <p>
        Date de commande : <?php echo $row['dateCommande']; ?><br>
        Date de livraison souhaitée : <?php echo $row['dateLivraison']; ?><br>
        Statut : <?php echo $row['statut']; ?>
    </p>

    <table>
        <tr>
            <th>Produit</th>
            <th>Quantité</th>
            <th>Montant total</th>
        </tr>
        <tr>
            <td><?php echo $row['produit']; ?></td>
            <td><?php echo $row['quantite']; ?></td>
            <td><?php echo $row['montantTotal'] * $row['quantite']; ?> €</td>
        </tr>
    </table>

    <br>
    <button onclick="window.print()">Imprimer le devis</button>
    <button><a href="liste.php">Retour à la liste</a></button>
</body>
</html>