<?php
namespace App\Security;

use App\Model\AuthAppModel;

class ApiSecurity {

    public function verifyApikey (string $apikey): bool
    {
        $model = new AuthAppModel;
        $app = $model->findBy(['apikey' => $apikey]);
        if ($app) {
            return true;
        }
        return false;
    }
}