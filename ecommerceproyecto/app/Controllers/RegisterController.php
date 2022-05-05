<?php

class RegisterController extends ClassParentController{
	private $model;

	function __construct(){
		$this->model = $this->model("RegisterModel");
	}
}

?>