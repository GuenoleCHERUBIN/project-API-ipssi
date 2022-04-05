<?php
namespace App\Model;

use Core\Model\DefaultModel;

/**
 * @method array<Client> findAll()
 * @method Client find(int $id)
 * @method int save(array $data)
 * @method int update(int $id, array $data)
 * @method int delete (int $id)
 */
class ClientModel extends DefaultModel {

    protected string $table = 'client';
    protected string $entity = 'Client';
}