<?php
	namespace App\Common\Services;


	use App\Common\Models\Business\RabbitMQServicesCore;

	class RabbitMQServices {

		public function createCustomerServices ($service) {
			$rabbitServ = new RabbitMQServicesCore();
			return $rabbitServ->rabbitMQService($service);
		}

	}