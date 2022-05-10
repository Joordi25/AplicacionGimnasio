<?php

class CestaController extends ClassParentController{
	private $model;

	function __construct(){
		$this->model = $this->model("CestaModel");
	}
}

?>