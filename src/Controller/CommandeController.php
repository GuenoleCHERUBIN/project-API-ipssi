<?php
namespace App\Controller;

use App\Model\CommandeModel;
use Core\Controller\DefaultController;

final class CommandeController extends DefaultController{

    private $model;

    public function __construct()
    {
        $this->model = new CommandeModel;
    }

    public function index ()
    {
        $commandes = $this->model->findAll();
        $this->jsonResponse($commandes, 200);
    }

    public function single (int $idCommande)
    {
        $commande = $this->model->find($idCommande);
        $cli = [
            'id' => $commande->getIdCommande(),
        ];
        $this->jsonResponse($cli, 200);

    }

    public function save ()
    {
        $lastId = $this->model->save($_POST);
        $commande = $this->model->find($lastId);
        $cli = [
            'id' => $client->getIdCommande(),
            'name' => $client->getName()
        ];
        $this->jsonResponse($cli, 201);


    }
}