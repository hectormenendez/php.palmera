<?php
class mainModel extends Model {


	/**
	 * Check if user exists in database
	 */
	function login(){
		if (!isset($_POST['user']) || !isset($_POST['pass'])) return 400;
		# sanitize data
		$user = filter_var($_POST['user'], FILTER_SANITIZE_STRING);
		$pass = md5(filter_var($_POST['pass'], FILTER_SANITIZE_STRING));
		# verify existence
		$id = $this->db->select('user','id','name=? AND pass=? LIMIT 1', $user, $pass);
		if (!$id) return 403;
		# set the session credentials
		$this->session_set($id);
		return true;
	}

}