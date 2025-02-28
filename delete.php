<?php
// Démarrage de la session $_SESSION
session_start();

/* Si on fait un require simple en gros on se fout de savoir s'il est là ou pas
Avec le require_once on force le truc pour que ça bloque si on le trouve pas */
require_once 'Produit.php';

// récupération de l'id dans l'url
$id= isset($_GET['id']) ? $_GET['id'] : 0; // correction de Sacha


$produitObj = new Produit(); // je crée une nouvelle instance de produit

$produitObj->supprimer($id);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="index.css">
    <title>Supprimer un produit</title>
</head>
<body>

<?php
// Affichage du message stocké en session

echo "<p>" . htmlspecialchars($_SESSION['message']) . "</p>";
// suppression du message stocké en session
unset($_SESSION['message']);

header("Location: index.php");

?>

</body>
</html>
