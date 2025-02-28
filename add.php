<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un produit (POO)</title>
    <link rel="stylesheet" href="index.css">

</head>
<body>
<h1>Ajouter un produit</h1>
<form action="add.php" method="post">
    <div>
        <label for="nom">Nom : </label>
        <input type="text" id="nom" name="nom" required>
    </div>
    <div>
        <label for="prix">Prix : </label>
        <input type="number" id="prix" name="prix" required>
    </div>
    <div>
        <label for="stock">Stock : </label>
        <input type="number" id="stock" name="stock" required></input>
    </div>
    <div>
        <button type="submit">Ajouter</button>
    </div>
</form>
<div>
    <button><a href="index.php">Retour</a></button>
</div>
</body>
</html>
