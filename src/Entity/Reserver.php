<?php
namespace App\Entity;

use Core\Entity\DefaultEntity;

final class Reserver extends DefaultEntity implements \JsonSerializable {

    private int $idClient;

    private int $idPlace;

    private  $date;

    private  $heure;

    /**
     * Get the value of idClient
     */ 
    public function getIdClient()
    {
        return $this->idClient;
    }

    /**
     * Set the value of idClient
     *
     * @return  self
     */ 
    public function setIdClient($idClient)
    {
        $this->idClient = $idClient;

        return $this;
    }

    /**
     * Get the value of idPlace
     */ 
    public function getIdPlace()
    {
        return $this->idPlace;
    }

    /**
     * Set the value of idPlace
     *
     * @return  self
     */ 
    public function setIdPlace($idPlace)
    {
        $this->idPlace = $idPlace;

        return $this;
    }

    /**
     * Get the value of date
     */ 
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set the value of date
     *
     * @return  self
     */ 
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get the value of heure
     */ 
    public function getHeure()
    {
        return $this->heure;
    }

    /**
     * Set the value of heure
     *
     * @return  self
     */ 
    public function setHeure($heure)
    {
        $this->heure = $heure;

        return $this;
    }

    public function jsonSerialize(): array
    {
        return [
            'id_client' => $this->idClient,
            'id_place' => $this->idPlace,
            'date' => $this->date,
            'heure' => $this->heure
        ];
    }
}