<?php
namespace App\Controller;

use App\Model\ClientModel;
use Core\Controller\DefaultController;

final class ClientController extends DefaultController{

    private $model;

    public function __construct()
    {
        $this->model = new ClientModel;
    }

    public function index () :never
    {
        $clients = $this->model->findAll();
        self::jsonResponse($clients, 200);
    }

     /**
     * Renvoie une client en fonction de son id
     *
     * @param integer $id
     * @return void
     */
    public function single (int $id)
    {
        $client = $this->model->find($id);
        self::jsonResponse($client, 200);

    }

    /**
     * Enregistre une client en BDD
     *
     * @param array $data
     * @return void
     */
    public function save (array $data)
    {
        $lastId = $this->model->save($data);
        $client = $this->model->find($lastId);
        self::jsonResponse($client, 201);


    }
    /**
     * Modifie une client en BDD
     *
     * @param integer $id
     * @param array $data
     * @return void
     */
    public function update (int $id, array $data)
    {
        if($this->model->update($id, $data)) {
            $client = $this->model->find($id);
            self::jsonResponse($client, 201);
        }
    }

    /**
     * Supprime une client en BDD
     *
     * @param integer $id
     * @return void
     */
    public function delete (int $id)
    {
        $this->model->delete($id);
        self::jsonResponse("Client supprimée", 200);
    }
}