<?php

class Controller {
	
	public $model;
	public $view;
	
	function __construct($model)
	{
		$this->view = new View();

		if (class_exists($model)) {
            $this->model = new $model;
        }
	}
}