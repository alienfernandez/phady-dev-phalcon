<?php

	namespace App\Common\Models\Business;

	use App\Component\Core\CommandCore;
	use Phalcon\DI\Injectable;

	/**
	 * @class NotificacionesCore
	 * Clase para gestionar las notificaciones de la aplicacion
	 *
	 * @author  Alien Fernandez Fuentes <alienfernandez85@gmail.com>
	 * @package Common
	 * @copyright
	 * @version 1.0
	 */
	class RabbitMQServicesCore extends Injectable {
		public function rabbitMQService ($service) {
			$command = new CommandCore();
			switch ($service) {
				case 'CONTACTOSLISTEXPORT':
				{
					$cacheRabbitContac = $this->cache->redis->onOneRandomServer()->get('pIdRabbitMqContacto');
					if (!$cacheRabbitContac || !$command->is_running($cacheRabbitContac)) {
						$pIdRabbitMqContacto = $command->background('php -f ' . $this->parameters->root_dir . '/messagingconsumer/ConsumerXlsContacto.php');
						$this->cache->redis->onAllServer($strict = true)->set('pIdRabbitMqContacto', $pIdRabbitMqContacto);
					}
				}
					break;
				default:
					{

					}
			}
			return true;
		}
	}