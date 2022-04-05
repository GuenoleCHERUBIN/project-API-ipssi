<?php
namespace App\Model;

use Core\Model\DefaultModel;

/**
 * @method array<Place> findAll()
 * @method Place find(int $id)
 * @method int save(array $data)
 * @method int update(int $id, array $data)
 * @method int delete (int $id)
 */
class PlaceModel extends DefaultModel {

    protected string $table = 'place';
    protected string $entity = 'Place';
}