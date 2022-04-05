<?php
try {
    if (!empty($_SERVER["PATH_INFO"])) {
        $url = explode('/',$_SERVER["PATH_INFO"]);
        switch ($url[1]){
            case "client":
                echo "bonjour";
                break;
            case "test2":
                echo "bonsoir";
                break;
            default:
                throw new Exception("La demande n'est pas valide");
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