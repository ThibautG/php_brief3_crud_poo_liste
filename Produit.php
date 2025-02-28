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
    public function ajouter(string $nom, float $prix, int $stock):bool {
        // Requête préparée
        $stmt = $this->pdo->prepare("INSERT INTO produits (nom_produit, prix_produit, stock_produit) VALUES (?, ?, ?)");

        return $stmt->execute([$nom, $prix, $stock]);
    }

    /** Lister les produits de la bdd
     * @return array Tableau associatif contenant les produits
     * */
    public function lister():array{
        $stmt = $this->pdo->query("SELECT * FROM produits");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /** Modifier un produit dans la bdd
     * @param string $nom le nom du produit
     * @param float $prix le prix
     * @param int $stock la quantité
     * @param int $id l'identifiant
     * @return boolean true si modification OK sinon false
     * */
    public function modifier(string $nom, float $prix, int $stock, int $id):bool {
        // Requête préparée
        $stmt = $this->pdo->prepare("UPDATE produits SET nom_produit = ?, prix_produit = ?, stock_produit = ? WHERE id_produit = ?");

        return $stmt->execute([$nom, $prix, $stock, $id]);
    }

    /** Supprimer un produit dans la bdd
     * @param int $id l'identifiant
     * @return boolean true si suppression OK sinon false
     * */
    public function supprimer(int $id):bool {
        // Requête préparée
        $stmt = $this->pdo->prepare("DELETE FROM produits WHERE id_produit = ?");

        return $stmt->execute([$id]);
    }


}

?>