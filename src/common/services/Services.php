<?php
	namespace App\Common\Services;

	use App\Common\Services\Exceptions;
	use App\Component\Core\CommandCore;

	/**
	 * @class Services
	 * Clase para gestionar los servicios en la aplicacion
	 *
	 * @author Alien Fernández Fuentes <alienfernandez85@gmail.com>
	 * @package Common
	 * @copyright
	 * @version 1.0
	 */
	abstract class Services {
		public static function getService ($module, $name) {
			$className = "\\App\\" . $module . "\\Services\\{$name}";

			if (!class_exists($className)) {
				throw new Exceptions\InvalidServiceException("Class {$className} doesn't exists.");
			}

			return new $className();
		}
	}
