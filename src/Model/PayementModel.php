<?php
namespace App\Model;

use App\Entity\Payement;
use Core\Model\DefaultModel;

/**
 * @method array<Categorie> findAll()
 * @method Payement find(int $id)
 * @method int save(array $data)
 * @method int update(int $id, array $data)
 * @method int delete (int $id)
 */
class PayementModel extends DefaultModel {

    protected string $table = 'payement';
    protected string $entity = 'Payement';
}