<?php
namespace Core\Trait;

trait JsonTrait {

    /**
     * Envoie les informations au format json
     *
     * @param mixed $data
     * @param integer $responseCode
     * @return void
     */
    public function jsonResponse (mixed $data, int $responseCode)
    {
        header("Content-type: application/json");
        http_response_code($responseCode);

        if (is_object($data)) {
            echo json_encode($data());
            return true;
        } elseif (is_array($data)) {
            foreach ($data as $key => $value) {
                if (is_object($value)) {
                    $data[$key] = $value();
                }
            }
        }
        echo json_encode($data);
    }
}