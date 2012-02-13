<?php
class Control extends Application_Control {

	public function logout(){
		$this->model->session_del();
		header('Location: '.URL, true, 303);
		stop();
	}

}