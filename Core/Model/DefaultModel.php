<?php
namespace Core\Model;

use Core\Database\Database;

class DefaultModel extends Database{

    protected string $table;
    protected string $entity;

    /**
     * Retourne toutes lignes d'une table
     *
     * @return array<object>
     */
    public function findAll(): array
    {
        return $this->getData("SELECT * FROM $this->table", $this->entity);
    }

    /**
     * Retourne une ligne d'une table en fonctionde l'id passé
     *
     * @param integer $id
     * @return object
     */
    public function find(int $id): object
    {
        return $this->getData("SELECT * FROM $this->table WHERE id = $id", $this->entity, true);
    }

    /**
     * Retourne une liste d'éléments en fonctions de critères
     *
     * @param array $criteria
     * @param array $order
     * @return array
     */
    public function findBy(array $criteria = [], array $order = []): array
    {
        $statement = "SELECT * FROM $this->table ";
        if (!empty($criteria)) {
            $statement .= "WHERE ";
            foreach ($criteria as $key => $value) {
                $statement .= "$key = '$value' AND ";
            }
        }

        $statement = substr($statement, 0, -4);
        if (!empty($order)) {
            $statement .= "ORDER BY ";
            foreach ($order as $key => $value) {
                $statement .= "$key $value, ";
            }
            $statement = substr($statement, 0, -2);
        }
        return $this->getData($statement, $this->entity);
    }
    /**
     * Retourne une liste d'éléments en fonctions de critères
     *
     * @param array $criteria
     * @param array $order
     * @return object
     */
    public function findOneBy(array $criteria = [], array $order = []): object
    {
        $statement = "SELECT * FROM $this->table ";
        if (!empty($criteria)) {
            $statement .= "WHERE ";
            foreach ($criteria as $key => $value) {
                $statement .= "$key = '$value' AND ";
            }
        }

        $statement = substr($statement, 0, -4);
        if (!empty($order)) {
            $statement .= "ORDER BY ";
            foreach ($order as $key => $value) {
                $statement .= "$key $value, ";
            }
            $statement = substr($statement, 0, -2);
        }
        return $this->getData($statement, $this->entity, true);
    }


    /**
     * Enregistre une nouvelle ligne en BDD
     *
     * @param array $data
     * @return integer
     */
    public function save (array $data): int
    {
        $stmt = "INSERT INTO $this->table (";
        $values = " VALUES (";
        foreach ($data as $key => $value) {
            $stmt .= "$key, ";
            $values .= ":$key, ";
        }
        $stmt = substr($stmt, 0, -2) . ")";
        $values = substr($values, 0, -2) . ")";
        $stmt .= $values;

        return $this->saveData($stmt, $data);
    }

    /**
     * Met à jour les données d'une ligne en BDD
     *
     * @param integer $id
     * @param array $data
     * @return integer
     */
    public function update (int $id, array $data): int
    {
        $stmt = "UPDATE $this->table SET ";
        foreach ($data as $key => $value) {
            $stmt .= "$key = :$key, ";
        }
        $stmt = substr($stmt, 0, -2). " WHERE id = $id";
        return $this->saveData($stmt, $data);
    }

    /**
     * Supprime une ligne en BDD
     *
     * @param integer $id
     * @return integer
     */
    public function delete (int $id): int
    {
        $stmt = "DELETE FROM $this->table WHERE id = $id";
        return $this->saveData($stmt);
    }


}