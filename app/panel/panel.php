<?php
class panelControl extends Control {

	function panel(){
		if (!$this->model->session) return $this->logout();
		echo $this->model->user;
	}

}