<?php
    session_start();
	
	spl_autoload_register(function ($spacename){
		
		
		
		include $spacename.'.php';
		
	});
	
	
	
	
	
	$url = substr($_SERVER['REQUEST_URI'],1);
	$url = explode('/',$url);
	
	
	   
	
	use system\Routes;
	new Routes($url);








?>



