<?php

namespace App\Common\Models\Business;

use Phalcon\Mvc\User\Component;

/**
 * @class GenerateClassPHPCore
 * Clase de negocio para generar clases php
 *
 * @author Alien Fernández Fuentes <alienfernandez85@gmail.com>
 * @package Common
 * @copyright
 * @version 1.0
 */
class GenerateClassPHPCore
{
	protected $generator = null;

	public function __construct()
	{

	}

	/**
	 * @name generateClassByDataSource - Generar clases dado una fuente de datos
	 * @param string $className - Nombre de la clase
	 * @param array $dataSource - Fuente de datos
	 *                  ['const' => Nombre de la Constante]
	 *                  ['value' => Valor de la Constante]
	 * @return array
	 */
	public function generateClassConstantByDataSource($classPath, $className, $dataSource, $namespace = '', $comentary = '')
	{
		//print_r($class_path);die;
		$this->generator = new \ezcPhpGenerator($classPath . '/' . $className . '.php');
		$this->generator->niceIndentation = true;
		if ($namespace) {
			$this->generator->appendCustomCode("namespace " . $namespace . ";");
		}
		$this->generator->appendEmptyLines(1);
		$this->generator->appendComment($comentary);
		$this->generator->appendCustomCode("class " . $className);
		$this->generator->appendCustomCode("{");
		$this->generator->indentLevel = true;
		foreach ($dataSource as $source) {
			$this->generator->appendCustomCode('const ' . $source['const'] . ' = "' . $source['value'] . '";');
			$this->generator->appendEmptyLines(1);
		}
		$this->generator->appendCustomCode("}");
		$this->generator->finish();
		//clearstatcache();
		//\apc_clear_cache();

		/*$this->generator->appendVariableAssignment("lo", 1);
		$this->generator->appendVariableAssignment("hi", 1);
		$this->generator->appendVariableAssignment("i", 2);
		$this->generator->appendWhile('$i < $number');
		$this->generator->indentLevel = true;
		$this->generator->niceIndentation = true;
		$this->generator->appendVariableAssignment("hi", "$lo + $hi");
		$this->generator->appendVariableAssignment("lo", "$hi - $lo");
		$this->generator->appendEndWhile();
		*/

		return true;
	}

}
