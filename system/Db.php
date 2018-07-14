<?php

    namespace  system;


	class Db{
		
		public $con;
		public $table = [];	
		
		function __construct( ){
			
			$this->con = new \MySqli('localhost', 'root', '', 'tar' );
	
			if( $this->con->connect_errno ){
				echo $this->con->connect_error;
				exit;
			}
		}
		
		
		
		////////////////////////////////SELECT////////////////////////////////
		public function select( $q_select, $num = false){

			$select = $this->con->query( $q_select );
			$table = [];
				
				if($num){
					$table = $select->fetch_assoc();
				}else{
					while($row = $select->fetch_assoc()){
						array_push($table, $row);
					}
				}
			
			 return $table; 

			
		}
		
		
		
		
		
		/////////////////////////////////////INSERT////////////////////////////////////
		public function insert( $table, $inp_val ){
			
			
			
			$val = implode("','", $inp_val);
			
			$key_array = array_keys ($inp_val );
			
			$fild = implode(",", $key_array);
			
			return $this->con->query( "INSERT INTO $table ( $fild ) VALUES ( '$val' )" );
			
			//if ( !$this->con->query("INSERT INTO $table ( $fild ) VALUES ( '$val' )") ) {
				//printf("Errormessage: %s\n", $this->con->error);
			//}
		}
		
		
		
		////////////////////////////////////UPDATE////////////////////////////////////
		
		public function update($table_up, $update_val, $where){
			
			
			
			$update_new = "";
			
			foreach($update_val as $key => $value){
				
				$update_new  .= $key ." = '".$value."',"; 
			
			
			}
			
			
			
			$up = substr($update_new, 0, -1);
			

			
			 
			 $this->con->query( "UPDATE $table_up  SET $up  WHERE $where" );
			 
			 
			//if ( !$this->con->query( "UPDATE $table_up  SET $up  WHERE $where" ) ) {
				//printf("Errormessage: %s\n", $this->con->error);
			//}
				
			
		
		}
		
		/////////////////////////////////DELETE///////////////////////////////////////////
		
		
		public function del($teble_del, $where){
			
			$this->con->query( "DELETE FROM  $teble_del   WHERE  $where " );
				
			
		
		}
	
	}





	
	
	
	
	
	
	

	
	
	
	




















