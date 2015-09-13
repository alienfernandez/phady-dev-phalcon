<?php

namespace App\Common\Controllers;

use Phady\Common\Controllers\ControllerBase;

class PortalController extends ControllerBase
{

	public function loginAction()
	{
	}

	public function login_checkAction()
	{
	}

	public function adminAction()
	{
	}

	public function okAction()
	{
		//$this->session->remove("_security_main");
		print_r($_SESSION);
	}

	public function logoutAction()
	{
	}

	public function access_deniedAction()
	{
	}

}
