<?php
require('connexion.php');// Connexion à la base de données via la fichier connexion.php
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajout de commande</title>
</head>

<body>
    <!--Formulaire d'ajout de commande-->
    <form action="insert.php" method="post">
        <label>Client :</label><br>
            <select name="client">
                <!-- Boucle pour afficher les clients -->
                <?php
                $stmt = $pdo->query("SELECT idClient, prenom, nom FROM clients"); // Requête pour récupérer les clients
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { 
                        echo "<option value='
                            " . $row['idClient'] . "'>" . $row['prenom'] . " " . $row['nom'] . "
                        </option>";
                    }
                ?>
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
        <label>Quantité :</label>
            <input type="number" name="quantite"><br>
        <input type="submit" value="Envoyer">
    </form>
    
</body>
</html>
