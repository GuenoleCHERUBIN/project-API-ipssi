<?php
namespace App\Entity;

use Core\Entity\DefaultEntity;

final class Place extends DefaultEntity{

    private int $id;

    private int $nbpersonne;
    

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of nbpersonne
     */ 
    public function getNbpersonne()
    {
        return $this->nbpersonne;
    }

    /**
     * Set the value of nbpersonne
     *
     * @return  self
     */ 
    public function setNbpersonne($nbpersonne)
    {
        $this->nbpersonne = $nbpersonne;

        return $this;
    }
}