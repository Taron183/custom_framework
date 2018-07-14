<?php
namespace models;
use system\Model;

class Friend extends Model{
    public function  insertIds($user_id, $friend_id, $status){

        $inp_val = [

            'user_id' => $user_id,
            'friend_id' => $friend_id,
            'status' => $status



        ];

        return $this->db->insert('friend', $inp_val);

    }

    public  function  requestCheck($user_id, $friend_id){
        $res = $this->db->select("SELECT * FROM friend WHERE  (user_id = '$user_id' AND friend_id = '$friend_id') or (user_id = '$friend_id' AND friend_id = '$user_id')  ",1);
        return $res;
    }


    public  function  requestBoxs($user_id){
        $res = $this->db->select("SELECT users.id, users.firstname, users.lastname, users.gender, users.avatar,friend.user_id, friend.friend_id FROM friend  left JOIN users  
            ON (friend.user_id = users.id OR friend_id = users.id)
            WHERE (friend_id = '$user_id' )
            AND status = 0 and users.id != '$user_id'");
        return $res;
    }


    public function  friendConfirm($user_id,$friend_id,$status){

        $update_val = [

            'status' => $status
        ];

        $res = $this->db->update("friend",$update_val, "user_id = $user_id AND friend_id = $friend_id");

        return $res;
    }


    public  function ignoreFriend($user_id, $friend_id){
            $this->db->del("friend", "user_id = $user_id AND friend_id = $friend_id");
    }


    public  function  friendsSellect($user_id){

        $res = $this->db->select("SELECT u.id, u.firstname, u.lastname, u.gender,u.avatar
        FROM friend as f  left JOIN  users as u
        ON(f.user_id = u.id  OR f.friend_id = u.id)
        WHERE (user_id = '$user_id' OR  friend_id = '$user_id' )
        AND status = 1 and u.id != '$user_id'  ");
        return $res;

    }


    public function messageReq($user_id){
        $res = $this->db->select("SELECT users.id, users.firstname, users.lastname, users.gender, users.avatar FROM friend  left JOIN users  
            ON (friend.user_id = users.id OR friend.friend_id = users.id)
            WHERE (user_id = '$user_id'  OR friend_id = '$user_id')
            AND status = 1 and users.id != '$user_id'");
        return $res;

    }


    public function friendsMeSel($to_id){
        $res = $this->db->select("SELECT id,firstname,lastname,gender,avatar FROM users WHERE  id = '$to_id' ",1);
        return $res;

    }

   


   public function insertMessages($from_id,$to_id,$text){

        $inp_val = [

            'from_id' => $from_id,
            'to_id' => $to_id,
            'text' => $text


        ];

        return $this->db->insert('messages', $inp_val);

   }


   public function selectMessages($from_id,$to_id){
          $res = $this->db->select("SELECT users.id,users.firstname,users.lastname,users.gender,users.avatar,messages.text,messages.data 
            FROM messages LEFT JOIN users 
            ON(messages.from_id = users.id)
            WHERE(from_id = '$from_id' AND to_id = '$to_id' ) 
            ",1);
        return $res;

   }


   public function chatSelect($from_id,$to_id,$last_id){

        $res = $this->db->select("SELECT users.id,users.firstname,users.lastname,users.gender,users.avatar,messages.text,messages.data,messages.from_id,messages.id 
            FROM messages LEFT JOIN users 
            ON(messages.from_id = users.id )
            WHERE(from_id = '$from_id' and to_id = '$to_id' or from_id = '$to_id' and to_id = '$from_id'  )
            AND  messages.id > '$last_id'
            ORDER BY messages.data asc");
        return $res;




   }



   public function messagesCounts($user_id){

        $res = $this->db->select("SELECT * FROM  messages  WHERE to_id = $user_id and  new = '0'");
       
        $obj =  (object)$res;

        $total = count((array)$obj);


        return $total;
    }





    public function chatCountDel($to_id){

        $update_val = [

            'new' => '1'
        ];

       $res = $this->db->update("messages",$update_val, "to_id='$to_id'");
       return $res;
    }






    

}