<?php
namespace App\Model;

use App\Entity\Commande;
use Core\Model\DefaultModel;

/**
 * @method array<Categorie> findAll()
 * @method Commande find(int $idCommande)
 * @method int save(array $data)
 * @method int update(int $idCommande, array $data)
 * @method int delete (int $idCommande)
 */
class CommandeModel extends DefaultModel {

    protected string $table = 'commande';
    protected string $entity = 'Commande';
}