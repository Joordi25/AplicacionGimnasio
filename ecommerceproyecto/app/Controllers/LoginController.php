<?php

class LoginController extends ClassParentController{
	private $model;

	function __construct(){
		$this->model = $this->model("LoginModel");
	}
}

?>