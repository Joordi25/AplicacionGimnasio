<?php

class ForgotController extends ClassParentController{
	private $model;

	function __construct(){
		$this->model = $this->model("ForgotModel");
	}
}

?>