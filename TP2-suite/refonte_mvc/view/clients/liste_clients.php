<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des clients</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <h1>Liste des clients</h1>
    <br>

    <button><a href="index.php?action=ajout">Ajouter un client</a></button>

    <table>
        <tr>
            <th>Client</th>
            <th>Téléphone</th>
            <th>Mail</th>
            <th>Adresse</th>
            <th>Code postal</th>
            <th>Actions</th>
        </tr>

        <?php foreach ($clients as $client): ?> 
        <tr>
            <td><?php echo $client['prenom'] . " " . $client['nom']; ?></td>
            <td><?php echo $client['telephone']; ?></td>
            <td><?php echo $client['mail']; ?></td>
            <td><?php echo $client['adresse']; ?></td>
            <td><?php echo $client['codePostal']; ?></td>
            
            <td> <a href='index.php?action=modifier&idClient=<?php echo $client['idClient']; ?>'>Modifier</a> 
            <a href='index.php?action=supprimer&idClient=<?php echo $client['idClient']; ?>'>Supprimer</a>
        </tr>
        <?php endforeach; ?>
    </table>

</body>
</html>
