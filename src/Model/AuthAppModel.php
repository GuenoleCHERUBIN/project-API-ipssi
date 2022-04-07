<?php
namespace App\Model;

use Core\Model\DefaultModel;

class AuthAppModel extends DefaultModel {
    protected string $table = "auth_app";
    protected string $entity = "AuthApp";
}