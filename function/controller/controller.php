<?php 
	class Controller {
		public $model;
		public $db;

		public function __construct()
	  {
	    $this->db = new Database();
			$this->db->connect();
			$this->model = new model($this->db);			
	  }
	  public function content($url) {
	  	return $this->model->content($url);
	  }
	  public function menu() {
	  	return $this->model->menu();
	  }	  
	  public function form_prueba() {
	  	return $this->model->form_prueba();
	  }	  	  
	}
?>