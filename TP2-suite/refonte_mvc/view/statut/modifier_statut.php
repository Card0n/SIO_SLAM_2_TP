<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modification d'un statut</title>
</head>
<body>
    <form action="index.php" method="post">
        <input type="hidden" name="action" value="modifierStatut">
        <input type="hidden" name="idStatut" value="<?php echo $statut['idStatut']; ?>">
        
        <label>Nom du statut :</label>
            <input type="text" name="nomStatut" value="<?php echo $statut['nomStatut']; ?>"><br>

        <input type="submit" value="Envoyer">
    </form>
</body>
</html>