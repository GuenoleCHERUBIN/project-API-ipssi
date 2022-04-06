<?php
namespace App\Entity;

use Core\Entity\DefaultEntity;

final class Admin extends DefaultEntity implements \JsonSerializable {

    private int $id;

    private string $mail;

    private string $password;

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of email
     */ 
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'mail' => $this->mail,
            'password' => $this->password,
        ];
    }
}