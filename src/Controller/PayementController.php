<?php
namespace App\Controller;

use App\Model\PayementModel;
use Core\Controller\DefaultController;

final class PayementController extends DefaultController{

    private $model;

    public function __construct()
    {
        $this->model = new PayementModel();
    }

    public function index ()
    {
        $payements = $this->model->findAll();
        self::jsonResponse($payements, 200);
    }

    /**
     * @param int $id
     */
    public function single (int $id)
    {
        $payement = $this->model->find($id);
        self::jsonResponse($payement, 200);

    }

    /**
     * @param array $data
     */
    public function save (array $data)
    {
        $lastId = $this->model->save($data);
        $payement = $this->model->find($lastId);
        self::jsonResponse($payement, 201);
    }

    /**
     * @param int $id
     * @param array $data
     */
    public function update (int $id, array $data)
    {
        if($this->model->update($id, $data)) {
            $payement = $this->model->find($id);
            self::jsonResponse($payement, 201);
        }
    }

    /**
     * @param int $id
     */
    public function delete (int $id)
    {
        $this->model->delete($id);
        self::jsonResponse("Payement supprimé", 200);
    }
}