<?php

	namespace App\Common\Models\Repositories;

	/**
	 * @class NotificacionRepository
	 * Clase repositorio de consultas para gestionar los Notificacions de la aplicacion
	 *
	 * @author  Alien Fernandez Fuentes <alienfernandez85@gmail.com>
	 * @package Common
	 * @copyright
	 * @version 1.0
	 */
	class NotificacionesRepository extends Repositories {

		// Devuelve el filtro para busquedas
		static public function getFilter ($arrData) {
			//print_r($arrData);die;
			$arrFilter = array();
			$arrValues = array();
			if (array_key_exists('NotificacionId', $arrData)) {
				$arrFilter [] = "notif.NotificacionId = :NotificacionId:";
				$arrValues ['NotificacionId'] = $arrData['NotificacionId'];
			}
			if (array_key_exists('DestinatarioId', $arrData)) {
				$arrFilter [] = "notif.DestinatarioId = :DestinatarioId:";
				$arrValues ['DestinatarioId'] = $arrData['DestinatarioId'];
			}
			if (array_key_exists('RemitenteId', $arrData)) {
				$arrFilter [] = "notif.RemitenteId = :RemitenteId:";
				$arrValues ['RemitenteId'] = $arrData['RemitenteId'];
			}
			if (array_key_exists('Medios', $arrData) && $arrData['Medios']) {
				$strMedios = "'" . implode("','", $arrData['Medios']) . "'";
				$arrFilter [] = "notif.DestinatarioId IN (" . $strMedios . ")";
			}
			if (array_key_exists('Mensaje', $arrData)) {
				$arrFilter [] = "notif.Mensaje = :Mensaje:";
				$arrValues ['Mensaje'] = $arrData['Mensaje'];
			}
			if (array_key_exists('NoLeido', $arrData)) {
				$arrFilter [] = "notif.NoLeido = :NoLeido:";
				$arrValues ['NoLeido'] = $arrData['NoLeido'];
			}
			if (array_key_exists('unread', $arrData) && $arrData['unread']) {
				$arrFilter [] = "notif.NoLeido = :unread:";
				$arrValues ['unread'] = ($arrData['unread'] == 'S') ? 1 : 0;
			}
			if (array_key_exists('Importante', $arrData)) {
				$arrFilter [] = "notif.Importante = :Importante:";
				$arrValues ['Importante'] = $arrData['Importante'];
			}
			if (array_key_exists('query', $arrData)) {
				$arrFilter [] = "(lower(notif.Mensaje) iLIKE :query: )";
				//Para que en el filtro no busque dentro de una subcadena
				$arrValues ['query'] = (array_key_exists('nocontiene', $arrData)) ? $arrData['query'] : "%{$arrData['query']}%";

			}
			if (array_key_exists('search', $arrData) && $arrData['search']['value']) {
				$arrFilter [] = "(lower(notif.Mensaje) LIKE :search: )";
				$search = strtolower($arrData['search']['value']);
				//print_r($search);die;
				//Para que en el filtro no busque dentro de una subcadena
				$arrValues ['search'] = (array_key_exists('nocontiene', $arrData)) ? $search : "%{$search}%";
			}
			if ((array_key_exists('startDate', $arrData) && !empty($arrData['startDate'])) || (array_key_exists('endDate', $arrData) && !empty($arrData['startDate']))) {
				if ((array_key_exists('startDate', $arrData) && $arrData['startDate']) && (array_key_exists('endDate', $arrData) && $arrData['endDate'])) {
					$arrFilter [] = "(Creado BETWEEN :startDate: AND :endDate:)";
					$arrValues ['startDate'] = $arrData['startDate'];
					$arrValues ['endDate'] = $arrData['endDate'];
				} else if ((array_key_exists('startDate', $arrData) && $arrData['startDate']) && (array_key_exists('endDate', $arrData) && empty($arrData['endDate']))) {
					$arrFilter [] = "(Creado >= :startDate:)";
					$arrValues ['startDate'] = $arrData['startDate'];
				} else {
					$arrFilter [] = "(Creado <= :endDate:)";
					$arrValues ['endDate'] = $arrData['endDate'];
				}
			}
			$filter = implode(' AND ', $arrFilter);
			return ($arrFilter) ? array('filter' => $filter, 'values' => $arrValues) : array('filter' => '', 'values' => array());
		}

		/**
		 * @name getNotifications - Obtener las Notificaciones dado por el array de filtro
		 * @param array $arrDataFilter - Array de datos a filtrar
		 *              [Creado] - fecha
		 *              [Mensaje] - Mensaje
		 *              [DestinatarioId] - Id del destinatario del mensaje
		 *              [start] - Inicio de pagina
		 *              [limit] - Limite de elementos por pagina
		 * @return array
		 */
		public function getNotifications ($arrDataFilter) {
			$getFilter = self::getFilter($arrDataFilter);
			$qbuild = $this->modelsManager->createBuilder();

			if ($getFilter) {
				if (array_key_exists('filter', $getFilter) && $getFilter['filter']) {
					$qbuild->where($getFilter['filter']);
					//$qb->bind($getFilter['values']);
				}
			}
			//Inicio y Limite
			//print_r($arrDataFilter);die;
			if ((array_key_exists('limit', $arrDataFilter) && $arrDataFilter['limit'])) {
				$qbuild->limit($arrDataFilter['limit'], (array_key_exists('start', $arrDataFilter) && $arrDataFilter['start']) ? $arrDataFilter['start'] : 0);
			}

			//Ordenar por columnas
			//print_r($getFilter);die;
			$notifications = $qbuild->columns(array('notif.NotificacionId', 'notif.RemitenteId', 'notif.DestinatarioId', 'notif.Mensaje', 'notif.NoLeido', 'notif.TipoNotificacionId',
				'notif.Importante', 'notif.Archivo', 'contact.Nombre'))
				->addFrom('App\Common\Models\Entities\Notificaciones', 'notif')
				->innerJoin('App\Seguridad\Models\Entities\Usuarios', 'usr.UsuarioId = notif.RemitenteId', 'usr')
				->innerJoin('App\Organizaciones\Models\Entities\Contactos', 'contact.UsuarioId = usr.UsuarioId', 'contact')
				->innerJoin('App\Organizaciones\Models\Entities\Personas', 'pers.ContactoId = contact.ContactoId', 'pers')
				->orderBy('notif.Creado DESC')
				->getQuery()
				->execute($getFilter['values'])
				->toArray();

			return $notifications;
		}

		/**
		 * @name getAmountNotifications - Obtener la cantidad de Notificaciones dado por el array de filtro
		 * @param array $arrDataFilter - Array de datos a filtrar
		 *              [Creado] - fecha
		 *              [Mensaje] - Mensaje
		 *              [DestinatarioId] - Id del medio
		 *              [start] - Inicio de pagina
		 *              [limit] - Limite de elementos por pagina
		 * @return array
		 */
		public function getAmountNotifications ($arrDataFilter) {
			$getFilter = self::getFilter($arrDataFilter);
			$qbuild = $this->modelsManager->createBuilder();

			if ($getFilter) {
				if (array_key_exists('filter', $getFilter) && $getFilter['filter']) {
					$qbuild->where($getFilter['filter']);
				}
			}
			//print_r($getFilter);die;
			$count = $qbuild->columns(array('COUNT(*) as amount'))
				->addFrom('App\Common\Models\Entities\Notificaciones', 'notif')
				->getQuery()
				->execute($getFilter['values'])
				->toArray();

			return $count[0]['amount'];
		}

	}
