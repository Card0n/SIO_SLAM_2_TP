<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des statuts</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <nav>
        <button><a href="index.php">Commandes</a></button>
        <button><a href="index.php?action=listeClients">Clients</a></button>
        <button><a href="index.php?action=listeProduits">Produits</a></button>
        <button><a href="index.php?action=listeStatut">Statut</a></button>
    </nav>
    <h1>Liste des statuts</h1>
    <br>

    <button><a href="index.php?action=ajouterStatut">Ajouter un statut</a></button>

    <table>
        <tr>
            <th>Nom</th>
            <th>Actions</th>
        </tr>

        <?php foreach ($statuts as $statut): ?> 
        <tr>
            <td><?php echo $statut['nomStatut']; ?></td>
            
            <td> <a href='index.php?action=modifierStatut&idStatut=<?php echo $statut['idStatut']; ?>'>Modifier</a> 
            <a href='index.php?action=supprimerStatut&idStatut=<?php echo $statut['idStatut']; ?>'>Supprimer</a>
        </tr>
        <?php endforeach; ?>
    </table>

</body>
</html>
