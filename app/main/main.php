<?php
/**
 * Default controller
 */
class mainControl extends Control {

	/**
	 * Portada
	 *
	 * @created 2012/FEB/12 15:46
	 */
	function main(){
		# if no session is availableload home page normally
		if (!$this->model->session) return false;
		# user is logged in, take them to their home page.
		header('Location: panel', true, 303);
		stop();
	}

	/**
	 * User tries to login
	 *
	 * @created 2012/FEB/12 19:32
	 */
	function login(){
		# login succesful return 200.
		if (($error = $this->model->login()) === true) stop();
		# return the corresponding error
		$error = 'error_'.(string)$error;
		parent::$error('Esta página no es accesible directamente.');
		//header('Location: '. BASE);
	}

}
