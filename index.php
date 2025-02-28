<?php
/* Si on fait un require simple en gros on se fout de savoir s'il est là ou pas
Avec le require_once on force le truc pour que ça bloque si on le trouve pas */
require_once 'Produit.php';

$produitObj = new Produit(); // je crée une nouvelle instance de produit

// Liste des produits
$produits = $produitObj->lister();

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gestion des Produits (POO)</title>
</head>
<body>
<h1>Liste des articles</h1>
<?php if (!empty($produits)): ?>
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Prix</th>
            <th>Stock</th>
            <th>Modifier</th>
            <th>Supprimer</th>
        </tr>
        </thead>
        <tbody>
        <!-- PHP -->
        <?php foreach ($produits as $p): ?> <!-- les ":" c'est pour éviter d'ouvrir l'accolade du foreach -->
            <tr>
                <!-- on utilise ?= pour faire un echo -->
                <td><?=  htmlspecialchars($p['id_produit'])  ?></td>
                <td><?=  htmlspecialchars($p['nom_produit'])  ?></td>
                <td><?=  htmlspecialchars($p['prix_produit'] . ' €')  ?></td>
                <td><?=  htmlspecialchars($p['stock_produit'])  ?></td>
                <td><button><a href="edit.php?id=<?= $p['id_produit']; ?>">Modifier</a></button></td>
                <td><button><a href="delete.php?id=<?= $p['id_produit']; ?>">Supprimer</a></button></td>
            </tr>
        <?php endforeach; ?> <!-- là on ferme l'accolade du foreach en gros -->
        </tbody>
    </table>

    <div>
        <button><a href="add.php">Ajouter un article</a></button>
    </div>

<?php else: ?>
    <p>Aucun produit</p>
<?php endif; ?>

</body>
</html>