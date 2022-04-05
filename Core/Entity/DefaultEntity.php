<?php
namespace Core\Entity;

class DefaultEntity {

    // Déclenche l'hydration à l'instanciation d'une entité
    public function __construct(array $data = [])
    {
        $this->hydrate($data);
    }

    /**
     * Hydrate l'entité avec les données reçues
     *
     * @param array $data
     * @return void
     */
    private function hydrate (array $data)
    {
        foreach ($data as $key => $value) {
            // On transforme les propriétés de clés étrnagères en camelCase
            str_replace("_id", "Id", $key);
            // On génère les setter pour attribuer la valeur à la propriété
            $method = 'set'. ucfirst($key);
            // On vérifie que le setter existe
            if (method_exists($this, $method)) {
                // On passe la valeur à la propriété
                $this->$method(htmlspecialchars($value));
            }
        }
    }
}