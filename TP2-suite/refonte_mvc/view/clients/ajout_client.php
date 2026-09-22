<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajout de client</title>
</head>
<body>
    <form action="index.php?action=ajouter" method="post">
        <input type="hidden" name="action" value="ajouter">
        
        <label>Prenom :</label>
            <input type="text" name="prenom"><br>
        <label>Nom :</label>
            <input type="text" name="nom"><br>
        <label>Téléphone :</label>
            <input type="text" name="telephone"><br>
        <label>Mail :</label>
            <input type="email" name="mail"><br>
        <label>Adresse :</label>
            <input type="text" name="adresse"><br>
        <label>Code postal :</label>
            <input type="text" name="codePostal"><br>

        <input type="submit" value="Envoyer">
    </form>
</body>
</html>