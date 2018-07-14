

$(document).ready(function () {



    $(".search").click(function () {
        $(".search").css("background-color", "#26a69a");
        $(".search").css("border-color", "#1E857B");
        search = $.trim($(".search_val").val());

        $.ajax({
            url:'/account/search',
            method:'POST',
            data:{search: search},
            dataType:'json',
            success:function(x){

                if(x == null){
                    alert("Please fill out this field")
                }else{
                    $(".photo").remove();
                    $("#timeline").remove();
                    $(".st-container").empty();


                    var myObj= x;
                    var count = Object.keys(myObj).length;
                    console.log(x);
                    for(var i =0; i<count; i++){
                        console.log(i);

                        $(".st-container").append("<div class='col-md-12 col-lg-4 item  item_"+i+"'> </div>")
                        $(".item_"+i+"").append("<div class='panel panel-default def_"+i+" '> </div>")
                        $(".def_"+i+"").append("<div class='panel-heading head_"+i+" '> </div>")
                        $(".head_"+i+"").append("<div class='media med_"+i+" '> </div>")
                        $(".med_"+i+"").append("<div class='pull-left lef_"+i+" '> </div>")
                        $(".lef_"+i+"").append("<img src='images/guy-5.jpg' class='media-object img-circle img-search_"+i+"' width='120' height='120'>")

                        $(".med_"+i+"").append("<div class='media-body bod_"+i+" '> </div>")
                        $(".bod_"+i+"").append("<h4 class='media-heading margin-v-5  h4_"+i+" '> </h4>")
                        $(".h4_"+i+"").append("<a href='/account/profil/"+x[""+i+""]['id']+"'> "+x[""+i+""]['firstname']+"  "+x[""+i+""]['lastname']+" </a>")
                        $(".bod_"+i+"").append("<div class='profile-icons  ico_"+i+" '> </div>")
                        $(".ico_"+i+"").append("<span class='sp_"+i+" '> </span>")
                       // $(".sp_"+i+"").append("<button class='friend'> Add Friend</button>")


                        if(x[""+i+""]['avatar']== null){
                                console.log(x[""+i+""]['gender'])
                            if(x[""+i+""]['gender']== "male"){
                                $(".img-search_"+i+"").attr("src","/public/images/default_avatar/male.jpg")
                            }else if(x[""+i+""]['gender']== "female"){
                                $(".img-search_"+i+"").attr("src","/public/images/default_avatar/female.jpg")
                            }


                        }else{

                            $(".img-search_"+i+"").attr("src","/public/images/"+x[""+i+""]['id']+"/"+x[""+i+""]['avatar']+"")


                        }





                    }





                }




            }


        })
    })



    $('.upload').click(function(){
        var file_data = $('.sortpicture').prop('files')[0];
        var form_data = new FormData();
        form_data.append('file', file_data);



        $.ajax({
            url: '/account/photo',
            dataType: 'text',
            cache: false,
            contentType: false,
            processData: false,
            dataType:"json",

            data: form_data,
            type: 'post',

            success: function(x){

                console.log(x);

                if(x == "no"){
                    $("#eror").text("The field is empty")
                }
                else if(x == "eror"){
                    $("#eror").text("The format of the image should be jpg, jpeg.")

                }



                $(".avatar_src").attr("src","/public/images/"+x['id']+"/"+x['avatar']+"")

            }
        });
    });



      $('.add-friend').click(function () {
          var user_id = $(this).attr("user_id");
          var friend_id = $(this).attr("friend_id");
          var status = "0";


          $.ajax({
              url:'/account/friendRequest',
              method:'POST',
              data:{user_id:user_id,friend_id:friend_id, status:status,},
              success:function(x){


                  $(".add-friend").text("Friend Request Sent")




              }


          })


    })


    $(".friend_requests").click(function (e) {
      e.stopPropagation()
        $(".sidebar-friend").toggle()
        $(".sidebar_chat ").hide()

        var user_id = $(this).attr("user_id");

        if($(".friend-req").empty()){
            $.ajax({
                url:'/account/requestBox',
                method:'POST',
                data:{user_id:user_id,},
                dataType:'json',
                success:function(z){


                    var myObj= z
                    var count = Object.keys(myObj).length;

                    
                    for(i=0; i< count; i++){

                        user_ids =  z[""+i+""]['user_id']
                        friend_ids =  z[""+i+""]['friend_id']

                        $(".friend-req").append("<li class='online away chat_box chat_window_b chat_block_"+i+"' friend_id='"+z[""+i+""]['id']+"' user_id='"+z['user_id']+"'>  </li>")

                        $(".chat_block_"+i+"").append("<a  href='#'  class='as_block_"+i+"'> </a>")

                        $(".as_block_"+i+"").append("<div class='media media_block_"+i+"'> </div>")


                        $(".media_block_"+i+"").append("<div class='pull-left pull_block"+i+"'> </div>")
                        $(".pull_block"+i+"").append("<img src='images/default_avatar/male.jpg' width='40' height='40' class='img-circle img_block_"+i+"'>")
                        $(".media_block_"+i+"").append("<div class='media-body body_block_"+i+"'> </div>")
                        $(".body_block_"+i+"").append("<div class='contact-name'>"+z[""+i+""]['firstname']+" "+z[""+i+""]['lastname']+"  </div>")
                        $(".body_block_"+i+"").append("<div class='button-gr_"+i+"'> </div>")
                        $(".button-gr_"+i+"").append("<button class='confirm' user_id='"+user_ids+"'  friend_id='"+friend_ids+"'>Confirm </button>")
                        $(".button-gr_"+i+"").append("<button class='ignore'  user_id='"+user_ids+"'  friend_id='"+friend_ids+"'>Ignore</button>")

                        

                         if(z[""+i+""]['avatar']== null){

                             if(z[""+i+""]['gender']== "male"){
                               $(".img_block_"+i+"").attr("src","/public/images/default_avatar/male.jpg")
                            
                             }
                             else if(z[""+i+""]['gender']== "female"){
                            
                                $(".img_block_"+i+"").attr("src","/public/images/default_avatar/female.jpg")
                             }


                        }else{

                             $(".img_block_"+i+"").attr("src","/public/images/"+z[""+i+""]['id']+"/"+z[""+i+""]['avatar']+"")


                          }








                    }






                }


            })
        }










    })



    $("header").click(function(){

        $(".sidebar-friend").hide()
        $(".sidebar_chat").hide()

    })




    $(document).on("click",  "button.confirm", function(){
        var user_id = $(this).attr("user_id");
        var friend_id = $(this).attr("friend_id");
        var status = "1";




        $.ajax({
            url:'/account/friendsConfirm',
            method:'POST',
            data:{user_id:user_id,friend_id:friend_id, status:status},
            success:function(x){









            }


        })

        $(this).parent().parent().parent().parent().remove()



    })





    $(document).on("click",  "button.ignore", function(){
        var user_id = $(this).attr("user_id");
        var friend_id = $(this).attr("friend_id");

        $.ajax({
            url:'/account/ignoreFriend',
            method:'POST',
            data:{user_id:user_id,friend_id:friend_id,},
            success:function(x){









            }


        })

        $(this).parent().parent().parent().parent().remove()

    })





    $(document).on("click",  "button.unfriend", function(){
        var user_id = $(this).attr("user_id");
        var friend_id = $(this).attr("friend_id");

        $.ajax({
            url:'/account/ignoreFriend',
            method:'POST',
            data:{user_id:user_id,friend_id:friend_id,},
            success:function(x){









            }


        })

        $(this).remove()

        $(".add-friend").text("Add Friend")
    })


    $(".message_request").click(function(e){
        $(".sidebar_chat").toggle()
        $(".sidebar-friend").hide()
        e.stopPropagation()
        if($(".send_mg").empty()){
            $.ajax({
                url:'/account/messageRequest',
                method:'POST',
                data:{get:true},
                dataType:'json',
                success:function(z){

                    console.log(z);
                    

                    var myObj= z
                    var count = Object.keys(myObj).length;

                    for(i=0; i< count; i++){

                        $(".send_mg").append("<li class='online away chat_box chat_window_b chat_block_"+i+"' friend_id='"+z[""+i+""]['id']+"'>  </li>")

                        $(".chat_block_"+i+"").append("<a  href='#'  class='as_block_"+i+"'> </a>")
                        $(".chat_block_"+i+"").append("<input type='hidden' class='inputid' friend_id='"+z[""+i+""]['id']+"'>")

                        $(".as_block_"+i+"").append("<div class='media media_block_"+i+"'> </div>")


                        $(".media_block_"+i+"").append("<div class='pull-left pull_block"+i+"'> </div>")
                        $(".pull_block"+i+"").append("<img src='images/default_avatar/male.jpg' width='40' height='40' class='img-circle img_block_"+i+"'>")
                        $(".media_block_"+i+"").append("<div class='media-body body_block_"+i+"'> </div>")
                        $(".body_block_"+i+"").append("<div class='contact-name'>"+z[""+i+""]['firstname']+" "+z[""+i+""]['lastname']+"  </div>")
                        $(".body_block_"+i+"").append("<div class='button-gr_"+i+"'> </div>")

                         if(z[""+i+""]['avatar']== null){

                             if(z[""+i+""]['gender']== "male"){
                               $(".img_block_"+i+"").attr("src","/public/images/default_avatar/male.jpg")
                            
                             }
                             else if(z[""+i+""]['gender']== "female"){
                            
                                $(".img_block_"+i+"").attr("src","/public/images/default_avatar/female.jpg")
                             }


                        }else{

                             $(".img_block_"+i+"").attr("src","/public/images/"+z[""+i+""]['id']+"/"+z[""+i+""]['avatar']+"")


                          }








                    }






                }


            })

            
        }


    })

    

    $(document).on("click",  "li.chat_box", function(){
        $(".md").remove()
        $(".chat_window").css({"display":"block"})
        friend_id = $(this).attr("friend_id");
        

        
        
        
        $.ajax({
            url:'/account/friendsMessages',
            method:'POST',
            data:{friend_id: friend_id},
            dataType:"json",
            success:function(resp){

                var f = resp.friend;

                if(f['avatar']==null){

                    if(f['gender']== "male"){
                        $(".chat_img").attr("src","/public/images/default_avatar/male.jpg")
                    }else if(f['gender']== "female"){
                        $(".chat_img").attr("src","/public/images/default_avatar/female.jpg")
                    }


                }else{
                    $(".chat_img").attr("src","/public/images/"+f['id']+"/"+f['avatar']+"")
                }



                $(".chat_name").text(""+f['firstname']+" "+f['lastname']+"")
                $(".chat_enter").attr("to_id",""+f['id']+"")



               
                    
                            
                            
            
                            
                    
                
                
                      
                        
                        
                        
                        


                    
                
                
            
            
            
            }
        
        
        })
    
    })



    $('.chat_enter').keypress(function (e) {
         var key = e.which;
        
        if(key == 13){  
        
        
            inp_val = $('.chat_enter').val()
            to_id = $('.chat_enter').attr("to_id")
            
            
            
            
            
                
                $.ajax({
                url:'/account/insertMessages',
                method:'POST',
                data:{to_id: to_id, inp_val: inp_val},
                dataType: "json",
                success:function(response){
                    if(response.status){

                    }else{

                    }
                }
        
            })
                
                
                
            
            
            
            $('.chat_enter').val("")
            
        }
    
    
    });


    


    last_id = 0; 
    $(document).on("click",  "li.chat_window_b", function(){
          var  friend_id = $(this).attr("friend_id");

          $('.pan_bod').empty()
          
          myVar = setInterval(SelectMessages, 100);
            
            

           

    })



    





    function  SelectMessages(){
         $.ajax({
            url:'/account/chatSelect',
            method:'POST',
            data:{friend_id:friend_id,last_id:last_id},
            dataType:'json',
            success:function(response){

     
               
                
                    
          $.each(response, function(key,value) {


            if(friend_id == value['from_id'] ){

                
                $('.pan_bod').append('<div style="overflow: hidden; padding-bottom: 10px;">'+
                    '<div style="float: left;">'+
                        '<img src="/public/images/default_avatar/male.jpg" class="img-circle box_imgs" width="25">'+
                    '</div>'+
                    
                    '<div style="display: table-cell; vertical-align: top;">'+
                        
                        '<div class="message mg" style="background: rgb(38, 166, 154);">'+value['text']+'</div>'+
                        '<span class="time_data">'+value['data']+'</span>'+     
                    
                    '</div>'+

                    '</div>');

                    if(value['avatar']== null){
        
                        if(value['gender']== "male"){
                            $(".box_imgs").attr("src","/public/images/default_avatar/male.jpg")
                        }else if(value['gender']== "female"){
                            $(".box_imgs").attr("src","/public/images/default_avatar/female.jpg")
                        }
                        
                        
                    }else{
                                    
                        $(".box_imgs").attr("src","/public/images/"+value['from_id']+"/"+value['avatar']+"")
                                    
                                    
                    }

            }else{

                $('.pan_bod').append('<div style="overflow: hidden; padding-bottom: 10px;">'+
                    '<div style="float: right;">'+
                        '<img src="/public/images/default_avatar/male.jpg" class="img-circle bo_imgs" width="25">'+
                    '</div>'+
                    
                    '<div style="display: table-cell; vertical-align: top; float: right;">'+
                        
                        '<div class="message mg_dr">'+value['text']+'</div>'+
                        '<span class="time_data">'+value['data']+'</span>'+     
                    
                    '</div>'+

                    '</div>');

                    if(value['avatar']== null){
        
                        if(value['gender']== "male"){
                            $(".bo_imgs").attr("src","/public/images/default_avatar/male.jpg")
                        }else if(value['gender']== "female"){
                            $(".bo_imgs").attr("src","/public/images/default_avatar/female.jpg")
                        }
                        
                        
                    }else{
                                    
                        $(".bo_imgs").attr("src","/public/images/"+value['from_id']+"/"+value['avatar']+"")
                                    
                                    
                    }

            }

            last_id = value['id']
           
            
          });

          

            }


        })

    }


    $(".close").click(function(){
        clearInterval(myVar);
        
        $(".chat_window").hide()

    })


    $(".message_request").click(function(){
        
        $.ajax({
              url:'/account/updateCount',
              method:'POST',
              data:{get:true},
              success:function(response){


                  



            }


        


        })
        


    })


    
    
    
 
    

// function vremia(){
//     var d = new Date();
//     h = d.getHours();
//     m = d.getMinutes();
//     s = d.getSeconds();
//     z=   h+':'+m+':'+s
//      if(z == 22+':'+38+':'+30){
//         alert()
//     }
//     console.log(z);
// }


// myVar = setInterval(vremia, 10);




})