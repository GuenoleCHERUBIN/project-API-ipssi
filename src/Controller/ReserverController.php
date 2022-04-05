<?php
namespace App\Controller;

use App\Model\ReserverModel;
use Core\Controller\DefaultController;

final class ReserverController extends DefaultController{

    private $model;

    public function __construct()
    {
        $this->model = new ReserverModel;
    }

    public function index () :never
    {
        $reservers = $this->model->findAll();
        self::jsonResponse($reservers, 200);
    }

     /**
     * Renvoie une place en fonction de son id
     *
     * @param integer $id
     * @return void
     */
    public function single (int $id)
    {
        $reserver = $this->model->find($id);
        self::jsonResponse($reserver, 200);

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
        $reserver = $this->model->find($lastId);
        self::jsonResponse($reserver, 201);


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
            $reserver = $this->model->find($id);
            self::jsonResponse($reserver, 201);
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
        self::jsonResponse("reservation supprimée", 200);
    }
}