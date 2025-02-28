<?php
// les fichiers class ont les nomme avec une majuscule

/* Class Database
* Se connecter à la bas de données
 * Bien gérer les ressources (pattern singleton (qd on utilise static et null en même temps)
 * Simplifier l'utilisation de PDO
 */
class Database {

    // propriété privée et statique -> la prop existe tout le temps, même si on a pas créé d'instance de la classe
    // instance unique de la connexion pour éviter les multi connexion à la bdd
    private static $instance = null; // tout va passer par ici et y'aura qu'une seule connexion sur la bdd

    // propriété pour stocker l'objet $pdo
    // pour rappel PDO sert à se connecter à la bdd
    // PDO est une classe déjà présente dans PHP avec ses méthodes, ses prop etc.
    private $pdo;

    // Constructeur privé (il ne peut être appelé qu'une fois)
    // (on touche à la BDD -> données sensibles)
    private function __construct() {

        // Configuration de la base de données
        $host = "localhost";
        $dbname = "mytech";
        $user = "root";
        $pass = "";

        try {
            $this->pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Erreur de connexion : " . $e->getMessage());
        }
    }


    public static function getInstance() {
       if (self::$instance === null) {
           // self fait référence à la class dans laquelle on est
           // (un peu comme $this mais on peut pas accéder aux prop)
           self::$instance = new Database();
       }
       // si y'a déjà une instance on la retourne
        // si y'en a pas on en crée une autre

       return self::$instance;
    }

    public function getConnection(){
        //Retourne l'objet PDO. Pourquoi ? Pour pouvoir faire des requêtes
        return $this->pdo;
    }
}

// Exemple pour appeler cette classe
// $db = Database::getInstance()->getConnection();