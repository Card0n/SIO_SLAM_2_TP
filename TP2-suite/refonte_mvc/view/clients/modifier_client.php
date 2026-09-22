<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modification d'un client</title>
</head>
<body>
    <form action="index.php" method="post">
        <input type="hidden" name="action" value="modifier">
        <input type="hidden" name="idClient" value="<?php echo $client['idClient']; ?>">
        
        <label>Prenom :</label>
            <input type="text" value="<?php echo $client['prenom']; ?>"><br>
        <label>Nom :</label>
            <input type="text" value="<?php echo $client['nom']; ?>"><br>
        <label>Téléphone :</label>
            <input type="text" name="telephone" value="<?php echo $client['telephone']; ?>" ><br>
        <label>Mail :</label>
            <input type="email" name="mail" value="<?php echo $client['mail']; ?>" ><br>
        <label>Adresse :</label>
            <input type="text" name="adresse" value="<?php echo $client['adresse']; ?>" ><br>
        <label>Code postal :</label>
            <input type="text" name="codePostal" value="<?php echo $client['codePostal']; ?>" ><br>
        <input type="submit" value="Envoyer">
    </form>
</body>
</html>