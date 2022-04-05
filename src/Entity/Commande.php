<?php
namespace App\Entity;

class Commande{
    private int $idCommande;

    private int $idMenu;

    private int $idClient;

    private int $idPayment;
    
    private string $statut;    


/**
     * Get the value of idMenu
     */ 
    public function getIdCommande()
    {
        return $this->idMenu;
    }

    /**
     * Set the value of idMenu
     *
     * @return  self
     */ 
    public function setIdCommande($idCommande)
    {
        $this->idCommande = $idCommande;

        return $this;
    }


    /**
     * Get the value of idMenu
     */ 
    public function getIdMenu()
    {
        return $this->idMenu;
    }

    /**
     * Set the value of idMenu
     *
     * @return  self
     */ 
    public function setIdMenu($idMenu)
    {
        $this->idMenu = $idMenu;

        return $this;
    }

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
     * Get the value of idPayment
     */ 
    public function getIdPayment()
    {
        return $this->idPayment;
    }

    /**
     * Set the value of idPayment
     *
     * @return  self
     */ 
    public function setIdPayment($idPayment)
    {
        $this->idPayment = $idPayment;

        return $this;
    }

    /**
     * Get the value of statut
     */ 
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * Set the value of statut
     *
     * @return  self
     */ 
    public function setStatut($statut)
    {
        $this->statut = $statut;

        return $this;
    }

}