<?php
namespace App\Entity;

use Core\Entity\DefaultEntity;

final class Client extends DefaultEntity{
    
    private int $id;

    private string $name;

    private string $surname;
    
    private int $tel;

    private string $address;

    private int $codepostal;

    private string $city;

    

    


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
     * Get the value of nom
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of prenom
     */ 
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * Set the value of prenom
     *
     * @return  self
     */ 
    public function setSurname($surname)
    {
        $this->surname = $surname;

        return $this;
    }

    /**
     * Get the value of tel
     */ 
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * Set the value of tel
     *
     * @return  self
     */ 
    public function setTel($tel)
    {
        $this->tel = $tel;

        return $this;
    }

    /**
     * Get the value of adress
     */ 
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set the value of adress
     *
     * @return  self
     */ 
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get the value of codepostal
     */ 
    public function getCodepostal()
    {
        return $this->codepostal;
    }

    /**
     * Set the value of codepostal
     *
     * @return  self
     */ 
    public function setCodepostal($codepostal)
    {
        $this->codepostal = $codepostal;

        return $this;
    }

    /**
     * Get the value of ville
     */ 
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set the value of ville
     *
     * @return  self
     */ 
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }
}