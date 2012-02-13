<?php
class Control extends Application_Control {

	public function logout(){
		$this->model->session_del();
		header('Location: /', true, 303);
		stop();
	}

}