<?php 	
	class estructure {
		var $db;
  	function  __construct($db){
    $this->db = $db;
  }
  public function content($url){
	  if ($url == "") {
	   $query = "SELECT * FROM  content where state = 1 and url = 'home' ";            
	  }else{
	   $query = "SELECT * FROM  content where state = 1 and url = '$url' ";              
	  }      
	  $this->db->doQuery($query, SELECT_QUERY);           
	  $reg = $this->db->results; 
	  $html.= $reg['0']['content'];
	  return $html;   
	}
	public function menu(){
		$query = "SELECT * FROM  content where state = 1 ";            	
	  $this->db->doQuery($query, SELECT_QUERY);           
	  $reg = $this->db->results;			  
		$html.='<nav class="navbar navbar-default">';
		$html.='<div class="container-fluid">';
		$html.='<div class="navbar-header">';
		$html.='<a class="navbar-brand" href="#">System Proyect</a>';
		$html.='</div>';
		$html.='<ul class="nav navbar-nav">';
		foreach ($reg as $res) {
			$html.='<li class=""><a href="'.$res['url'].'">'.$res['tittle'].'</a></li>';
		}		
		$html.='</ul>';
		$html.='</div>';
		$html.='</nav>		';
		return $html;
	} 
}//final de la clase estructura
 ?>