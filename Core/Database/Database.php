<?php
namespace Core\Database;

class Database {

    private string $host;
    private string $dbname;
    private string $user;
    private string $password;
    private \PDO|false $pdo;

    public function __construct()
    {
        $this->getConfig();
        $this->pdo = new \PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->password, [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
        ]);
        $this->pdo->exec("SET NAMES utf8");
    }

    /**
     * Récupère les infos de connexion à la BDD pour charger les propriétés
     *
     * @return void
     */
    private function getConfig()
    {
        // On vérifie que le fichier de config existe
        if (file_exists(ROOT. "/config/dbConfig.php")) {
            require ROOT. "/config/dbConfig.php";
            // On parcourt le tableau et pour chaque élément on associe la valeur à la propriété du même nom que la clé
            foreach ($dbConfig as $key => $value) {
                $this->$key = $value;
            }
        } else {
            throw new \Exception("Le fichier de config de Base de données n'existe pas.", 1);
        }
    }

    /**
     * Permet d'utiliser la connexion à la BDD
     *
     * @return \PDO|false
     */
    public function getPdo(): \PDO|false
    {
        return $this->pdo;
    }

    /**
     * Récupère les informations en BDD
     *
     * @param string $statement
     * @param string $className
     * @param boolean $one
     * @return array<object>|object
     */
    public function getData (string $statement, string $className, bool $one = false): array|object
    {
        $query = $this->pdo->query($statement);
        $query->setFetchMode(\PDO::FETCH_CLASS, "App\Entity\\$className");
        if ($one) {
            // FETCH_CLASS permet d'associer les données reçues à une entité passé en 2nd paramètre
            // On associe ainsi les restrictions liées aux propriétés de la class.
            return $query->fetch();
        } else {
            return $query->fetchAll();
        }
    }

    /**
     * Ajoute ou met à jour des données en BDD
     *
     * @param string $statement
     * @param array $data
     * @return int
     */
    public function saveData (string $statement, array $data = []): int
    {
        $prepare = $this->pdo->prepare($statement);
        if ($prepare->execute($data)) {
            return $this->pdo->lastInsertId();
        } else {
            throw new \Exception("Une erreur s'est produite lors de l'insertion. Veuillez réessayer");
        }
    }
}