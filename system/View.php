<?php
	namespace system;

	 class View{
		public function render($file_name,$hf=true){
			
			if(file_exists('views/'.$file_name.'.php')){
				
				
				
				if($hf){
					include 'views/layout/header.php';
					include 'views/'.$file_name.'.php';
					include 'views/layout/footer.php';
				}else{
                    include 'views/'.$file_name.'.php';
                }
					
				
			
			
			}else{
				echo "Error not  found views";
			}
			 
		}



         public function ren($file_name,$hf=true){

             if(file_exists('views/'.$file_name.'.php')){



                 if($hf){
                     include 'views/layout/head.php';
                     include 'views/'.$file_name.'.php';
                     include 'views/layout/footer.php';
                 }else{
                     include 'views/'.$file_name.'.php';
                 }




             }else{
                 echo "Error not  found views";
             }


         }


         public function ren_head($file_name,$hf=true){

             if(file_exists('views/'.$file_name.'.php')){



                 if($hf){
                     include 'views/layout/head_connect.php';
                     include 'views/'.$file_name.'.php';
                     include 'views/layout/footer.php';
                 }else{
                     include 'views/'.$file_name.'.php';
                 }




             }else{
                 echo "Error not  found views";
             }


         }
		
		 
	 }





