<?php
    namespace controllers;
    use models\Friend;
    use system\Controller;

    use models\User;

    class Account extends  Controller {

        public  function  __construct(){

            if(!isset($_SESSION['user_id'])){
                header("Location: /");
            }
            parent::__construct();
        }


        public  function  index(){

           $user_id  = $_SESSION['user_id'];


               $user = new User;
               $data = $user-> getbayId($user_id);




                $this->view->user =$data;



           $this->view->render('account');


        }


        public function  search(){

            $search = $_POST['search'];

            $user = new User;
            $search_res = $user->searchUser($search);
            echo   json_encode( $search_res);

        }


        public  function  photo(){

            $user_id  = $_SESSION['user_id'];


            $user = new User;
            $data = $user-> getbayId($user_id);


            $this->view->user =$data;

            if (isset($_FILES['file']['name']) ) {
                $avatar_name = $_FILES['file']['name'];
                $format = ['jpeg','jpg'];
                $exp = explode('.', $avatar_name);
                $end = end($exp);
                $md5_img=md5($avatar_name .date("h/m/s/m/d/y")).'.'.$end;
                if(in_array($end,$format)== true){

                    if(!file_exists("public/images/$user_id")){
                        mkdir("public/images/$user_id" );
                    }
                    $tep_name = $_FILES['file']['tmp_name'];
                    $src="public/images/".$user_id."/".$md5_img;
                    $up_img = move_uploaded_file($tep_name , $src);

                    if($up_img){
                        $avatar_update = $user-> avatarUpdate($md5_img,$user_id);


                    }

                    $avatar_array =[
                        "avatar"=>$md5_img,
                        "id"=>$user_id
                    ];


                }

                echo json_encode($avatar_array);
                exit;

            }


            $this->view->render('photo');

        }



        public  function  profil($id_search){

            $user_id  = $_SESSION['user_id'];
            $user = new User;
            $data = $user->getbayId($user_id);

            $data_search = $user->getSearchId($id_search);

            $this->view->user_search = $data_search;


            $this->view->user =$data;

            $friend = new Friend;
            $dataCheck = $friend->requestCheck($user_id,$id_search);
            $this->view->statusCheck = $dataCheck;

            $this->view->ren('profil');


        }


        public  function  friendRequest(){


            $friend = new Friend;
            $dataCheck = $friend->requestCheck($_POST['user_id'],$_POST['friend_id'] );



                var_dump($dataCheck);

           if($dataCheck == null){
               $friend->insertIds($_POST['user_id'],$_POST['friend_id'],$_POST['status']);
               echo "Friend Request Sent";

           }
        }


        public function  requestBox(){
                $friend = new Friend;
                $requestbox = $friend->requestBoxs($_POST['user_id']);

                //var_dump($requestbox);
                echo json_encode($requestbox);



        }


        public  function  friendsConfirm(){


            $friend = new Friend;
            $confirm = $friend->friendConfirm($_POST['user_id'],$_POST['friend_id'],$_POST['status']);




        }



        public  function   ignoreFriend(){
            $friend = new Friend;
            $ignore = $friend->ignoreFriend($_POST['user_id'],$_POST['friend_id']);

        }



        public function  friends(){
            $user_id  = $_SESSION['user_id'];
            
            $user = new User;
            $data = $user-> getbayId($user_id);
            $this->view->user =$data;

            

            $friend = new Friend;

            $friends = $friend->friendsSellect($user_id);

            $this->view->friends = $friends;


            $this->view->render("friends");

        }


         public function  messageRequest(){
                $user_id  = $_SESSION['user_id'];

                $friend = new Friend;
                $requestbox = $friend->messageReq($user_id);

                echo json_encode($requestbox);

        }


        public function friendsMe(){
            $to_id = $_POST['user_id'];
            $friend = new Friend;
            $dataSelect = $friend->friendsMeSel($to_id);
            echo json_encode($dataSelect);

        }


        public function  friendsMessages(){
            $from_id = $_POST['friend_id'];
            $to_id = $_SESSION['user_id'];

            $friend = new Friend;

            $friend_data = $friend->friendsMeSel($from_id);

            
            $output = [
                
                'friend' => $friend_data
            ];

            echo json_encode($output);
        }



        public function insertMessages(){
            $friend = new Friend;
            $status = $friend->insertMessages($_SESSION['user_id'], $_POST['to_id'], $_POST['inp_val']);

            echo json_encode(['status'=>$status]);

        }



        public function chatSelect(){
            $friend = new Friend;
            $chatSelect = $friend->chatSelect($_POST['friend_id'],$_SESSION['user_id'], $_POST['last_id']);

            echo json_encode($chatSelect);


        }


        public function messagesCount(){
             $to_id = $_SESSION['user_id'];
            
            $friend = new Friend;
            $chatSelectCount = $friend->messagesCounts($to_id);
            echo json_encode($chatSelectCount);
        }


        public function userUpdate(){
            $to_id = $_SESSION['user_id'];
            
            $friend = new Friend;
            $chatSelectCount = $friend->userUpdateCount($to_id);


        }


        public function updateCount(){
            $to_id = $_SESSION['user_id'];
            $friend = new Friend;
            $del =    $friend->chatCountDel($to_id);
            
            





        }








    }