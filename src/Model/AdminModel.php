<?php
namespace App\Model;

use Core\Model\DefaultModel;

/**
 * @method array<Admin> findAll()
 * @method Admin find(int $id)
 * @method int save(array $data)
 * @method int update(int $id, array $data)
 * @method int delete (int $id)
 */
class AdminModel extends DefaultModel {

    protected string $table = 'admin';
    protected string $entity = 'Admin';
}