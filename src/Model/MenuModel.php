<?php
namespace App\Model;


use Core\Model\DefaultModel;

/**
 * @method array<Menu> findAll()
 * @method Menu find(int $id)
 * @method int save(array $data)
 * @method int update(int $id, array $data)
 * @method int delete (int $id)
 */
class MenuModel extends DefaultModel {

    protected string $table = 'menu';
    protected string $entity = 'Menu';
}