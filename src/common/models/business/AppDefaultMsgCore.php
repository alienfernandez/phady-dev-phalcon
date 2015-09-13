<?php

namespace App\Common\Models\Business;

/**
 * @class AppDefaultMsgCore
 * Clase de negocio para generar errores por defecto de la aplicacion
 *
 * @author Alien Fernández Fuentes <alienfernandez85@gmail.com>
 * @package Common
 * @copyright
 * @version 1.0
 */
class AppDefaultMsgCore
{

	/*
	 * Mensajes y Codigos de error
	 * */
	const TOKEN_FORM_MSG_ERROR = 'Token de seguridad incorrecto';
	const TOKEN_FORM_CODE_ERROR = 'TOKEN_FORM_ERROR';

	const METHOD_POST_MSG_ERROR = 'La petición no pudo ser procesada por la aplicación';
	const METHOD_POST_CODE_ERROR = 'METHOD_POST_ERROR';

	const RECAPCHA_INCORRECT_MSG_ERROR = 'El código de seguridad ingresado es incorrecto. Por favor introduzca correctamente el texto que muestra en la imagen';
	const RECAPCHA_INCORRECT_CODE_ERROR = 'RECAPCHA_INCORRECT_ERROR';

	const TERMS_ACCEPT_MSG_ERROR = 'Debe aceptar los términos y políticas de privacidad del sistema';
	const TERMS_ACCEPT_CODE_ERROR = 'TERMS_ACCEPT_ERROR';

	const IDENTITY_NO_FOUND_MSG_ERROR = 'No se encuentra la identidad del usuario.';
	const IDENTITY_NO_FOUND_CODE_ERROR = 'IDENTITY_NO_FOUND_ERROR';

	const MODEL_EXIST_ARCHIVO_CODE_ERROR = 'ARCHIVE_NO_SAVE_ERROR';

    const MODEL_SAVE_ARCHIVO_MSG_ERROR = 'Ocurrió un error al guardar el archivo';
    const MODEL_SAVE_ARCHIVO_CODE_ERROR = 'ARCHIVE_NO_SAVE_ERROR';

	const MODEL_EXIST_CARGO_MSG_ERROR = 'No se pudo guardar los datos del cargo.';
	const MODEL_EXIST_CARGO_CODE_ERROR = 'CARGO_NO_SAVE_ERROR';

	const ACCESS_DENIED_MSG_ERROR = 'Lo sentimos. Usted no tiene acceso a este sección del sistema, si usted debe tener acceso a este contenido contacte con el administrador del sistema <a href="mailto:sociedadcivil@politica.gob.ec">sociedadcivil@politica.gob.ec</a>';
	const ACCESS_DENIED_CODE_ERROR = 'ACCESS_DENIED_ERROR';

    const MODEL_SAVE_MSG_ERROR = 'No se pudo guardar el elemento.';
    const MODEL_SAVE_CODE_ERROR = 'SAVE_ERROR';

    const MODEL_EXIST_RECORD_MSG_ERROR = 'Ya existe un registro igual.';
    const MODEL_EXIST_RECORD_CODE_ERROR = 'RECORD_EXIST_ERROR';

	const MAX_FILE_SIZE_1MB_MSG_ERROR = 'El tamaño máximo de la imagen permitido es 1 MB';
	const MAX_FILE_SIZE_1MB_CODE_ERROR = 'MAX_FILE_SIZE_1MB_ERROR';

	const UPLOAD_FILE_MSG_ERROR = 'Ocurrió un error al subir el archivo';
	const UPLOAD_FILE_CODE_ERROR = 'UPLOAD_FILE_ERROR';

	const UPLOAD_IMG_ONLY_MSG_ERROR = 'Solo se permite subir imágenes';
	const UPLOAD_IMG_ONLY_CODE_ERROR = 'UPLOAD_IMG_ONLY_ERROR';

	const UPLOAD_PDF_ONLY_MSG_ERROR = 'Solo se permite subir archivos pdf';
	const UPLOAD_PDF_ONLY_CODE_ERROR = 'UPLOAD_PDF_ONLY_ERROR';

	const UUID_NO_VALID_MSG_ERROR = 'Identificador no válido';
	const UUID_NO_VALID_CODE_ERROR = 'UUID_NO_VALID_ERROR';

	const NO_FOUND_REGISTRY_MSG_ERROR = 'No fue posible recuperar el registro';
	const NO_FOUND_REGISTRY_CODE_ERROR = 'NO_FOUND_REGISTRY_ERROR';

	public function __construct()
	{

	}

}
