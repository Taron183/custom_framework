<?php

	namespace system;
	
	class Routes{
		function  __construct($path){
			
			if(isset($path[0]) && !empty($path[0])){
				
				$ctrl = $path[0];
				
				$ctrl = str_replace('-','',$ctrl);
				
				
				
				if(file_exists('controllers/'.$ctrl.'.php')){
					
					$ctrl_class = '\controllers\\'.$ctrl;
					
					
					
					
					
					if(class_exists($ctrl_class, true )){
						$ctrl_obj = new $ctrl_class;
					
						if(isset($path[1]) && !empty($path[1])){
							
							$method = $path[1];
							
							if(method_exists($ctrl_obj, $method)){
								
								
								//$ctrl_obj->$method();
								
								
								
								array_splice($path,0,2);

								call_user_func_array(array($ctrl_obj, $method), $path);
								
								
								
								
							}else{
								echo "Error  not method";
							}
						
						}else{
							$ctrl_obj->index();
							
						
							
						}
					
					}else{
						
						echo "Error  not class";
					}
				
				}else{
					echo "Error  not found";
				}
				
			
			
			}else{
				
				
				
				$df_obj = new \controllers\Home;
				$df_obj ->index();
				
				
			}
			
		
		}
	
	}







