<?php
namespace App\Entity;

use Core\Entity\DefaultEntity;

class AuthApp extends DefaultEntity{

    private int $id;

    private string $name;

    private string $apikey;

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of name
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @param string $name
     *
     * @return self
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of apikey
     *
     * @return string
     */
    public function getApikey(): string
    {
        return $this->apikey;
    }

    /**
     * Set the value of apikey
     *
     * @param string $apikey
     *
     * @return self
     */
    public function setApikey(string $apikey): self
    {
        $this->apikey = $apikey;

        return $this;
    }

    public function JsonSerialize(): array
    {
        return [
            "name" => $this->name,
            "apikey" => $this->apikey
        ];
    }
}