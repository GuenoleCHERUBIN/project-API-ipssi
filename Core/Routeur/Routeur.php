<?php
namespace Core\Routeur;

final class Routeur {

    public static function Routes() {
        try {
            if (!empty($_SERVER["PATH_INFO"])) {
                $url = explode('/',$_SERVER["PATH_INFO"]);
                $controllerName = "App\Controller\\". ucfirst($url[1]). "Controller";
                if (class_exists($controllerName)) {
                    $controller = new $controllerName();
                } else {
                    throw new Exception("Classe inexistante", 404);
                }

                switch ($_SERVER['REQUEST_METHOD']){
                    case 'GET':
                        if (isset($url[2]) && is_numeric($url[2])) {
                            $controller->single($url[2]);
                        } elseif (isset($url[2])) {
                            if (method_exists($controller, $url[2])) {
                                $method = $url[2];
                                $controller->$method();
                            } else {
                                throw new Exception("Méthode inexistante en GET", 404);
                            }
                        } else {
                            $controller->index();
                        }
                        break;

                    case 'POST':
                        if (!empty($_POST)) {
                            if (isset($url[2])) {
                                if (method_exists($controller, $url[2])) {
                                    $method = $url[2];
                                    $controller->$method($_POST);
                                } else {
                                    throw new \Exception("Méthode inexistante en POST", 404);
                                }
                            } else {
                                $controller->save($_POST);
                            }
                        } else {
                            throw new \Exception("Method not found", 404);
                        }
                        break;

                    case 'PUT':
                        if (isset($url[2]) && is_numeric($url[2])) {
                            parse_str(file_get_contents("php://input"), $_PUT);
                            $controller->update($url[2], $_PUT);
                        } elseif (isset($url[2])) {
                            if (method_exists($controller, $url[2])) {
                                $method = $url[2];
                                $controller->$method();
                            } else {
                                throw new \Exception("Méthode inexistante en PUT", 404);
                            }
                        } else {
                            throw new \Exception("Method not found", 404);
                        }
                        break;

                    case 'DELETE':
                        if (isset($url[2]) && is_numeric($url[2])) {
                            $controller->delete($url[2]);
                        }
                        break;
                    default:
                        throw new \Exception("Request non autorisée", 403);
                }
            } else {
                throw new Exception("Erreur de récupération de connées");
            }
        } catch(Exception $e){
            $erreur = [
                "message" => $e->getMessage(),
                "code" => $e->getCode()
            ];
            print_r($erreur);
        }
    }

}
