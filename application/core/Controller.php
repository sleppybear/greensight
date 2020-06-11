<?php

class Controller {
	
	public $model;
	public $view;
	
	function __construct($model)
	{
		$this->view = new View();
		$this->model = new $model;
	}
}