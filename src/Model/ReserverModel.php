<?php
namespace App\Model;

use Core\Model\DefaultModel;

/**
 * @method array<Reserver> findAll()
 * @method Reserver find(int $id)
 * @method int save(array $data)
 * @method int update(int $id, array $data)
 * @method int delete (int $id)
 */
class ReserverModel extends DefaultModel {

    protected string $table = 'reserver';
    protected string $entity = 'Reserve';
}