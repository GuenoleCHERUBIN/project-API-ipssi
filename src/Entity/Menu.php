<?php
namespace App\Entity;

class Menu{

    private int $id;

    private string $entree;

    private string $plat;

    private string $dessert;

    private string $boisson;

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
     * Get the value of entree
     */ 
    public function getEntree()
    {
        return $this->entree;
    }

    /**
     * Set the value of entree
     *
     * @return  self
     */ 
    public function setEntree($entree)
    {
        $this->entree = $entree;

        return $this;
    }

    /**
     * Get the value of plat
     */ 
    public function getPlat()
    {
        return $this->plat;
    }

    /**
     * Set the value of plat
     *
     * @return  self
     */ 
    public function setPlat($plat)
    {
        $this->plat = $plat;

        return $this;
    }

    /**
     * Get the value of dessert
     */ 
    public function getDessert()
    {
        return $this->dessert;
    }

    /**
     * Set the value of dessert
     *
     * @return  self
     */ 
    public function setDessert($dessert)
    {
        $this->dessert = $dessert;

        return $this;
    }

    /**
     * Get the value of boisson
     */ 
    public function getBoisson()
    {
        return $this->boisson;
    }

    /**
     * Set the value of boisson
     *
     * @return  self
     */ 
    public function setBoisson($boisson)
    {
        $this->boisson = $boisson;

        return $this;
    }
}