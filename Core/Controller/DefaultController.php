<?php
namespace Core\Controller;

use Core\Trait\JsonTrait;

/**
 * Une class abstract est une class parent qui ne peut être instanciée.
 * Elle contient obligatoirement des méthodes abstract.
 * 
 * Ces méthodes abstract sont des méthodes que l'on doit obligatoirement définir dans les class enfant
 */
class DefaultController{

    use JsonTrait;

    /**
     * Génère l'affichage des templates des pages
     *
     * @param string $view
     * @param array $params
     * @return void
     */
    public function render (string $view, array $params = []): void
    {
        ob_start();
            extract($params);
            if (file_exists(ROOT . "/templates/$view.phtml")) {
                require ROOT . "/templates/$view.phtml";
            } else {
                throw new \Exception("Le template demandé n'existe pas", 1);
            }
        $content = ob_get_clean();
        require ROOT . "/templates/base.phtml";
    }

}