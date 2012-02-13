<?php
/**
 * Global model file, this will load first every request.
 */
 class Model extends Application_Model {

 	const DB_RESET        = false;
 	const SESSION_TIMEOUT = 1;    // HOURS


 	public $session = null;
 	public $user    = null;

 	/**
 	 * Constructor
 	 */
 	public function _construct(){
 		session_start();
 		# Connect to/Create database
 		$this->db = DB::sqlite(APP.'etor.sqlite');
 		# Import Database Schema when necessary
 		if (self::DB_RESET || $this->db->is_empty())
 			$this->db->import(APP.'etor.sql');
 		# Check if there is a valid session in every request but login.
		$this->session = $this->db->select('session','user','uuid=? LIMIT 1', session_id());
		if ($this->session)
			$this->user = $this->db->select('user','name','id=? LIMIT 1', $this->session);
 	}

	function session_set($id){
		# set the session id
		session_regenerate_id(true);
		$uuid = session_id();
		#setcookie('session', $uuid, time()+(3600*(int)self::SESSION_TIMEOUT));
		$this->db->exec("INSERT OR REPLACE INTO session (user, uuid) VALUES (?,?)", $id, $uuid);
	}

	/**
	 * Deletes session
	 *
	 * @created 2012/FEB/12 19:40
	 */
	function session_del(){
		if ($this->session) $this->db->exec("DELETE FROM session WHERE user=?", $this->session);
		session_destroy();
	}


 }