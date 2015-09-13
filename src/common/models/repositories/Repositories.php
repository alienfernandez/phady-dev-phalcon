<?php

namespace App\Common\Models\Repositories;

use Phalcon\Mvc\User\Component;

/**
 * @class Repositories
 * Clase para gestionar los repositorios
 *
 * @author Alien Fernández Fuentes <alienfernandez85@gmail.com>
 * @package Common
 * @copyright
 * @version 1.0
 */
abstract class Repositories extends Component {

    public static function getRepository($name) {
        $className = "\\App\\Commom\\Models\\Repositories\\Repository\\{$name}";

        if (!class_exists($className)) {
            throw new Exceptions\InvalidRepositoryException("Repository {$className} doesn't exists.");
        }

        return new $className();
    }

}
