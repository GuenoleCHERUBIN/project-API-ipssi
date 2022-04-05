<?php
namespace App\Controller;

use App\Model\PlaceModel;
use Core\Controller\DefaultController;

final class PlaceController extends DefaultController{

    private $model;

    public function __construct()
    {
        $this->model = new PlaceModel;
    }

    public function index () :never
    {
        $places = $this->model->findAll();
        self::jsonResponse($places, 200);
    }

     /**
     * Renvoie une place en fonction de son id
     *
     * @param integer $id
     * @return void
     */
    public function single (int $id)
    {
        $place = $this->model->find($id);
        self::jsonResponse($place, 200);

    }

    /**
     * Enregistre une place en BDD
     *
     * @param array $data
     * @return void
     */
    public function save (array $data)
    {
        $lastId = $this->model->save($data);
        $place = $this->model->find($lastId);
        self::jsonResponse($place, 201);


    }
    /**
     * Modifie une place en BDD
     *
     * @param integer $id
     * @param array $data
     * @return void
     */
    public function update (int $id, array $data)
    {
        if($this->model->update($id, $data)) {
            $place = $this->model->find($id);
            self::jsonResponse($place, 201);
        }
    }

    /**
     * Supprime une place en BDD
     *
     * @param integer $id
     * @return void
     */
    public function delete (int $id)
    {
        $this->model->delete($id);
        self::jsonResponse("Table supprimée", 200);
    }
}