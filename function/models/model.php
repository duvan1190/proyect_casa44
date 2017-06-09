<?php 
	class model	{

		public $logic;
		public $estructure;
		public $tools;	
		public $db;

		public function __construct()
	  {
	    $this->db = new Database();
			$this->db->connect();
			$this->logic = new logic($this->db);	
			$this->estructure = new estructure($this->db);
			$this->tools = new tools($this->db);					
	  }
	  public function content($url)
	  {
	  	return $this->estructure->content($url);
	  }
	  public function menu()
	  {
	  	return $this->estructure->menu();
	  }
	  public function form_prueba(){
			$form = array(
 				array("title" => 'prueba',"type" => 'text','class' => 'form-prueba pruebamas'),
 				array("title" => 'prueba2',"type" => 'checkbox','class' => 'form-prueba'),
 				array("title" => 'pruebafinal',"type" => 'color','class' => 'form-prueba'),
 				array("title" => 'prueba3',"type" => 'submit','class' => 'form-prueba', 'value' => 'guardar'),
 			);	
			return $this->tools->form_create($form);
  	}	  
	}
?>