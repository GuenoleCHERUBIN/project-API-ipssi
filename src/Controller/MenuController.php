<?php
namespace App\Controller;

use App\Model\MenuModel;
use Core\Controller\DefaultController;

final class MenuController extends DefaultController{

    private $model;

    public function __construct()
    {
        $this->model = new MenuModel();
    }

    public function index ()
    {
        $menus = $this->model->findAll();
        self::jsonResponse($menus, 200);

    }

    /**
     * @param int $id
     */
    public function single (int $id)
    {
        $menu = $this->model->find($id);
        self::jsonResponse($menu, 200);

    }

    /**
     * @param array $data
     */
    public function save (array $data)
    {
        $lastId = $this->model->save($data);
        $menu = $this->model->find($lastId);
        self::jsonResponse($menu, 201);
    }

    /**
     * @param int $id
     * @param array $data
     */
    public function update (int $id, array $data)
    {
        if($this->model->update($id, $data)) {
            $menu = $this->model->find($id);
            self::jsonResponse($menu, 201);
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