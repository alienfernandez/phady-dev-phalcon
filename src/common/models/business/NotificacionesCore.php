<?php

	namespace App\Common\Models\Business;

	use App\Common\Models\Entities\Notificaciones;
	use App\Common\Models\Repositories\NotificacionesRepository;
	use App\Component\Util\UUID;
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
	class NotificacionesCore extends Injectable {

		public function __construct () {

		}

		/**
		 * @name persistNotification - Insertar o modificar un Notificacion
		 * @param array $arrData Array de datos del Notificacion
		 *                  [Tipo, Nombre, Facebook, Twitter, Nacionalidad, Potencial]
		 * @return bool
		 */
		public function persistNotification ($arrData) {
			$newNotif = new Notificaciones();
			$newNotif->NotificacionId = UUID::v4();
			foreach ($arrData as $key => $value) {
				//Verificar si existe la propiedad en el modelo
				if (property_exists($newNotif, $key)) {
					$newNotif->{$key} = $value;
				}
			}
			$newNotif->save();
			return $newNotif;
		}

		/**
		 * @name getTotalNotification - Obtener cantidad de Notificaciones
		 * @return array
		 */
		public function getTotalNotification ($arrData) {
			$contRepo = new NotificacionesRepository();
			return $contRepo->getAmountNotifications($arrData);
		}

		public function highlightText ($text, $query) {
			if (($text || $text === '0') && ($query || $query === '0')) {
				$posResultQuery = strpos(strtolower($text), strtolower($query));
				if ($posResultQuery !== null) {
					$subStrQuery = substr($text, $posResultQuery, strlen($query));
					$strQuery = preg_replace('/' . $query . '/i', "<span style='background:#D82EE8;color:#FFF;border:1px dotted;margin-right:0px'><strong>$subStrQuery</strong></span>", $text);
				} else {
					$strQuery = '';
				}
				return $strQuery;
			}
		}

		/**
		 * @name getNotification - Obtener los Notificaciones de un medio
		 * @return array
		 */
		public function getNotification ($arrData) {
			$query = (array_key_exists('query', $arrData)) ? $arrData['query'] : '';
			$contRepo = new NotificacionesRepository();
			$arrNotifications = $contRepo->getNotifications($arrData);
			foreach ($arrNotifications as $key => $notif) {
				//print_r($arrNotifications);die;
				$timeStr = $this->getStrTime($notif['Creado']);
				$arrNotifications[$key]['TimeStr'] = $timeStr;
				$msgStr = $this->getShortMessage($notif['Mensaje']);
				$arrNotifications[$key]['MensajeShort'] = $msgStr;
				if ($query || $query === '0') {
					$arrNotifications[$key]['Mensaje'] = (!$this->highlightText($notif['Mensaje'], $query)) ? $notif['Mensaje'] : $this->highlightText($notif['Mensaje'], $query);
				}
			}
			return $arrNotifications;
		}

		/**
		 * @name getShortMessage - Obtener el mensaje cortado
		 * @param array $str Mensaje
		 * @return string
		 */
		public function getShortMessage ($str) {
			$maxLength = 30;
			$length = strlen($str);
			if ($length > $maxLength) {
				$msgShort = substr($str, 0, $maxLength) . ' ...';
			} else {
				$msgShort = $str;
			}
			return $msgShort;
		}

		/**
		 * @name getStrTime - Obtener el tiempo en string
		 * @param array $time Tiempo
		 * @return string
		 */
		public function getStrTime ($time) {
			//$time = '2014-09-28 12:22:44';
			$timeSpt = explode(' ', $time);
			$dateCreate = new \DateTime($time);
			$date = new \DateTime('now');
			$dateInterval = $date->diff($dateCreate);
			$days = $dateInterval->days;
			//print_r($dateInterval);die;
			$dayStr = '';
			if ($days == 0) {
				if ($dateInterval->h > 0) {
					$dayStr = 'Hace ' . $dateInterval->h . ' horas';
				} elseif ($dateInterval->i > 0) {
					$dayStr = 'Hace ' . $dateInterval->i . ' minutos';
				} elseif ($dateInterval->s > 0) {
					$dayStr = 'Hace unos segundos';
				}

			} elseif ($days == 1) {
				$dayStr = 'Ayer a las ' . $timeSpt[1];
			} else {
				$dayStr = 'Hace ' . $days . ' días a las ' . $timeSpt[1];
			}
			return $dayStr;
		}

		/**
		 * @name changeRead - Marcar como leido Notificacion
		 * @param array $id Id del Notificacion
		 * @return bool
		 */
		public function changeRead ($idNotif) {
			$objNotificacion = Notificaciones::findFirstByNotificacionId($idNotif);
			$objNotificacion->NoLeido = 0;
			return $objNotificacion->save();
		}

		/**
		 * @name deleteNotification - Eliminar un Notificacion
		 * @param array $id Id del Notificacion
		 * @return bool
		 */
		public function deleteNotification ($idNotif) {
			$objNotificacion = Notificaciones::findFirstByNotificacionId($idNotif);
			$objNotificacion->delete();
			return true;
		}

	}
