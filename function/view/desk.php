<?php 
  print $controller->menu();
  $content = $controller->content($url);
  $str = html_entity_decode($content, ENT_QUOTES);
  eval("?> $str <?php ");
?>            