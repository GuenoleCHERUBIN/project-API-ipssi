<?php
namespace App\Entity;

use Core\Entity\DefaultEntity;

class Payement extends DefaultEntity implements \JsonSerializable {

    private int $id;

    private int $num_carte;

    private string $nom_carte;

    private string $date_exp;

    private int $crypto;

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of num_carte
     */
    public function getNumCarte()
    {
        return $this->num_carte;
    }

    /**
     * Set the value of num_carte
     *
     * @return  self
     */
    public function setNumCarte($num_carte)
    {
        $this->num_carte = $num_carte;

        return $this;
    }

    /**
     * Get the value of nom_carte
     */
    public function getNomCarte()
    {
        return $this->nom_carte;
    }

    /**
     * Set the value of nom_carte
     *
     * @return  self
     */
    public function setNomCarte($nom_carte)
    {
        $this->nom_carte = $nom_carte;

        return $this;
    }

    /**
     * Get the value of date_exp
     */
    public function getDateExp()
    {
        return $this->date_exp;
    }

    /**
     * Set the value of date_exp
     *
     * @return  self
     */
    public function setDateExp($date_exp)
    {
        $this->date_exp = $date_exp;

        return $this;
    }

    /**
     * Get the value of crypto
     */
    public function getCrypto()
    {
        return $this->crypto;
    }

    /**
     * Set the value of crypto
     *
     * @return  self
     */
    public function setCrypto($crypto)
    {
        $this->crypto = $crypto;

        return $this;
    }

    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'num_carte' => $this->num_carte,
            'nom_carte' => $this->nom_carte,
            'crypto' => $this->crypto,
            'date_exp' => $this->date_exp
        ];
    }
}