<?php
 namespace controllers;
 use system\Controller;

 use models\User;

	class Home extends Controller{

	    public  function index(){
			$this->view->eror = false;
		    if(isset($_POST['submit'])){
				
				
		        if(!empty($_POST['pass']) && !empty($_POST['email']) ){

                    
					$user = new User;
                    $data = $user->login($_POST['email'],md5($_POST['pass']));
                    var_dump($data['id']);
						
					
					if(is_null($data)){
						$this->view->eror = "wrong email or password!";
					}else{
						$_SESSION['user_id'] = $data['id'];
					    header("Location: /account");
		
					}

                
				
				}else{
		            $this->view->eror ='file all fields';
                }
            
			}

			$this->view->ren_head('login');
		}


        public function singUp(){
            $this->view->empty_error = false;

            if(isset($_POST['reg'])){

                if(!empty($_POST['first_name']) && !empty($_POST['last_name']) &&  !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['password_confirmation'])){

                    $user = new User;
                    $data = $user->NumRows($_POST['email']);

                    if(is_null($data)){

                        if($_POST['password'] == $_POST['password_confirmation']){


                            $result = $user->reg_user( $_POST['first_name'], $_POST['last_name'], $_POST['email'],$_POST['gender'], md5($_POST['password']) );

                            if($result){
                                $this->view->empty_error = 'Success!!!';
                            }else{
                                $this->view->empty_error = 'We have a problem!';
                            }

                        }else{

                            $this->view->empty_error =  'Password confirmation is not correct';
                        }


                    }else{
                        $this->view->empty_error =  'Such mails were already registered!!!';
                    }





                }else{
                    $this->view->empty_error =  'File all fields';
                }


            }

            $this->view->ren_head('reg');
        }



        public function logout(){
	        if(isset($_SESSION['user_id'])){
	            unset($_SESSION['user_id']);
	            header("Location: /");
            }
        }




    }







