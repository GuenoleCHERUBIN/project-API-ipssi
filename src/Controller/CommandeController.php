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

    public function index () :never
    {
        $commandes = $this->model->findAll();
        self::jsonResponse($commandes, 200);
    }

     /**
     * Renvoie une commande en fonction de son idCommande
     *
     * @param integer $idCommande
     * @return void
     */
    public function single (int $idCommande)
    {
        $commande = $this->model->find($idCommande);
        self::jsonResponse($commande, 200);

    }

    /**
     * Enregistre une commande en BDD
     *
     * @param array $data
     * @return void
     */
    public function save (array $data)
    {
        $lastId = $this->model->save($data);
        $commande = $this->model->find($lastId);
        self::jsonResponse($commande, 201);


    }
    /**
     * Modifie une commande en BDD
     *
     * @param integer $idCommande
     * @param array $data
     * @return void
     */
    public function update (int $idCommande, array $data)
    {
        if($this->model->update($idCommande, $data)) {
            $commande = $this->model->find($idCommande);
            self::jsonResponse($commande, 201);
        }
    }

    /**
     * Supprime une commande en BDD
     *
     * @param integer $idCommande
     * @return void
     */
    public function delete (int $idCommande)
    {
        $this->model->delete($idCommande);
        self::jsonResponse("commande supprimée", 200);
    }
}