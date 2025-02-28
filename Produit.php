<?php

require 'Database.php';

class Produit {
    // une seule propriété privée
    private $pdo;

    // Constructeur (rappel : permet de créer une instance de la classe produit)
    public function __construct() {
        // retourne une instance de Database
        $this->pdo = Database::getInstance()->getConnection();
    }

    /** Ajout d'un nouveau produit dans la bdd
     * @param string $nom le nom du produit
     * @param float $prix le prix
     * @param int $stock la quantité
     * @return boolean true si ajout OK sinon false
     * */
    public function ajouter(string $nom, float $prix, int $stock) {
        // Requêtes préparées
        $stmt = $this->pdo->prepare("INSERT INTO produits (nom_produit, prix_produit, stock_produit) VALUES (?, ?, ?)");

        return $stmt->execute([$nom, $prix, $stock]);
    }

    /** Lister les produits de la bdd
     * @return array Tableau associatif contenant les produits
     * */
    public function lister(){
        $stmt = $this->pdo->query("SELECT * FROM produits");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


}

?>