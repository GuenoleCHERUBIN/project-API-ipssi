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

    public function index ()
    {
        $clients = $this->model->findAll();
        $this->jsonResponse($clients, 200);
    }

    public function single (int $id)
    {
        $client = $this->model->find($id);
        $cli = [
            'id' => $client->getId(),
            'name' => $client->getName()
        ];
        $this->jsonResponse($cli, 200);

    }

    public function save ()
    {
        $lastId = $this->model->save($_POST);
        $client = $this->model->find($lastId);
        $cli = [
            'id' => $client->getId(),
            'name' => $client->getName()
        ];
        $this->jsonResponse($cli, 201);


    }
}