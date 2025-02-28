<?php
// Démarrage de la session $_SESSION
session_start();

/* Si on fait un require simple en gros on se fout de savoir s'il est là ou pas
Avec le require_once on force le truc pour que ça bloque si on le trouve pas */
require_once 'Produit.php';

$produitObj = new Produit(); // je crée une nouvelle instance de produit

// insertion avec une requête préparée -> mieux pour la sécu
// $stmt = $pdo->prepare('INSERT INTO truc (machin) VALUES (?)'); /* prepare est une fonction qui est dans la classe pdo */
// $stmt->execute([$bidule]);

// Vérification de la soumission du formulaire via la method post
if ($_SERVER['REQUEST_METHOD'] === 'POST') { // $_SERVER est appelée variable super globale

    $name = isset($_POST['nom']) ? trim($_POST['nom']) : ''; // trim permet d'enlever les espaces devant et derrière ce qui est rentré dans le champ
    $price = isset($_POST['prix']) ? trim($_POST['prix']) : '';
    $stock = isset($_POST['stock']) ? trim($_POST['stock']) : '';


    // Vérification que le champ n'est pas vide
    if ($name !== '' && $price !== '' && $stock !== '') {
        $produitObj->ajouter($name, $price, $stock);

        header("Location: add.php");
        exit();
    } else {
        $_SESSION['message'] = "Veuillez remplir tous les champs !";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un produit</title>
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
<?php
// Affichage du message stocké en session
if (isset($_SESSION['message'])) {
    echo "<p>" . htmlspecialchars($_SESSION['message']) . "</p>";
    // suppression du message stocké en session
    unset($_SESSION['message']);
}
?>
</body>
</html>