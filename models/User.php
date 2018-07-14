<?php

namespace models;
use system\Model;


class User extends Model{


    public function NumRows($email){
        $res = $this->db->select("SELECT * FROM users WHERE  email= '$email'",1);
        return $res;
    }


    public function reg_user($firstname, $lastname, $email,$gender, $pass){
        $inp_val = [

            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email,
            'gender' => $gender,
            'password' => $pass


        ];

        return $this->db->insert('users', $inp_val);
    }

    public function  login($email,$pass ){
		
        $res = $this->db->select("SELECT id FROM users WHERE email = '$email' AND password = '$pass'",1);
        return $res;
    }
	
	

    public  function  getbayId($id){
        $res = $this->db->select("SELECT id,firstname,lastname,gender,avatar FROM users WHERE id = '$id'",1 );
        return $res;
    }


    public function searchUser($search){

        $search = preg_replace("/\s{2,}/", " ", $search);

        if(str_word_count($search) == 1){
            $res = $this->db->select("SELECT id,firstname,lastname,gender,avatar FROM users WHERE firstname  LIKE '$search%' or lastname  LIKE  '$search%'");

            return $res;


        }elseif(str_word_count($search) == 2){
            $search_keys = explode(" ", $search);
            $key1 =   $search_keys[0];
            $key2 =  $search_keys[1];

            $res = $this->db->select("SELECT id,firstname,lastname,gender,avatar FROM users WHERE (firstname  LIKE '%$key1%' AND lastname  LIKE  '%$key2%') OR (firstname LIKE '%$key2%'  AND  lastname LIKE '%$key1%')");

            return $res;

        }
    }


    public function getSearchId($id_search){
        $res = $this->db->select("SELECT id,firstname,lastname,gender,avatar FROM users WHERE id = '$id_search'",1 );
        return $res;
    }


    public  function  avatarUpdate($md5_img, $user_id ){

        $update_val = [

            'avatar' => $md5_img
        ];

       $res = $this->db->update("users",$update_val, "id=$user_id");
       return $res;
    }




}