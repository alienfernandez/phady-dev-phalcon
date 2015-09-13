<?php

namespace App\Common\Models\Business;

/**
 * @class MessageCore
 * Clase de negocio para generar errores, warning y mensajes con flash de la app
 *
 * @author Alien Fernández Fuentes <alienfernandez85@gmail.com>
 * @package Common
 * @copyright
 * @version 1.0
 */
class MessageCore {

	const MESSAGE_TYPE_ERROR = 'error';
	const MESSAGE_TYPE_NOTICE = 'notice';

	public function __construct() {

	}

	/**
	 * @name generateHtmlMessage - Generar html para mostrar error, warning y mensajes
	 * @param array $arrMsg - Array de mensajes para formar hmtl
	 * @param string $type - Tipo de mensaje
	 * @return html
	 */
	public static function generateHtmlMessage($arrMsg, $type = self::MESSAGE_TYPE_ERROR) {
		$preMsg = '';
		if ($type && $type == self::MESSAGE_TYPE_ERROR) {
			$preMsg = 'No se ha podido completar la acción solicitada porque se detectaron el(los) siguiente(s) error(es).';
		} else if ($type && $type == self::MESSAGE_TYPE_NOTICE) {
			$preMsg = 'Durante de la ejecución de la acción solicitada se detectaron el(las) siguiente(s) notificacion(es).';
		}

		$htmlMsg = '<div class="col-lg-12 margin-bottom-5">' . $preMsg . '</div><ul>';
		if (array_key_exists('error_code', $arrMsg) || array_key_exists('notice_code', $arrMsg) || array_key_exists('success_code', $arrMsg)) {
			$htmlMsg .= '<li>' . $arrMsg['message'] . '</li>';
		} elseif (array_key_exists('has_errors', $arrMsg)) {
			//Si existe varios errores
			foreach ($arrMsg['errors'] as $error) {
				$htmlMsg .= '<li>' . $error['message'] . '</li>';
			}
		} elseif (array_key_exists('has_notice', $arrMsg)) {
			//Si existe varios errores
			foreach ($arrMsg['notice'] as $notice) {
				$htmlMsg .= '<li>' . $notice['message'] . '</li>';
			}
		}
		$htmlMsg .= '<ul>';
		return $htmlMsg;
	}

}
