<?php

    if($this->user['avatar'] == NULL){
        if($this->user['gender']=='male'){
            $src="/public/images/default_avatar/male.jpg";

        }

        else if($this->user['gender']=='female'){
            $src="/public/images/default_avatar/female.jpg";
        }

    }else{
        $src='/public/images/'.$this->user['id'].'/'.$this->user['avatar'];
    }

?>


<html>

<head>
    <link rel="stylesheet" href="/public/css/bootstrap.min.css">
    <link rel="stylesheet" href="/public/css/style.css">
    <link rel="stylesheet" href="/public/css/styles.css">
    <link rel="stylesheet" href="/public/css/vendor/all.css">
    <link rel="stylesheet" href="/public/css/app/app.css">
    <script  src="/public/js/jquery-3.2.1.min.js"> </script>
    <script  src="/public/js/bootstrap.min.js"> </script>
    <script  src="/public/js/main.js"> </script>
    <link rel="stylesheet" href="/public/css/font-awesome.min.css">



</head>

    <body>
        <header>
            <!-- Fixed navbar -->
            <div class="navbar navbar-main navbar-primary navbar-fixed-top" role="navigation">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-nav">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>


                        <a href="#sidebar-chat" data-toggle="sidebar-menu" id="com_p" class="toggle pull-right visible-xs message_request"><strong class="chat_count chat_count_res" >1</strong><i class="fa fa-comments"></i></a>


                        <a href="#sidebar-chat" data-toggle="sidebar-menu" id="com_p" class="toggle pull-right visible-xs friend_requests"><strong class="friend_count fr_count_phone" ></strong> <i class="fa fa-fw fa-users"></i></a>

                        <a class="navbar-brand" href="/account">Armface</a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="main-nav">
                        <ul class="nav navbar-nav">
                            <li>

                                <div id="users-filter-trigger" class="search_form">

                                    <div class="search-name">
                                        <div class="searche">
                                            <input type="text" class="form-control  search_val" name="search_user" placeholder="First Last Name" id="search" required>
                                        </div>

                                        <div class="searche">
                                            <button class="btn btn-default search"   type="button" id="user-search-name "><i class="fa fa-search"></i> Search</button>
                                        </div>
                                    </div>


                                </div>


                            </li>
                        </ul>
                        <ul class="nav navbar-nav  navbar-right ">
                            <li class="hidden-xs friend_requests" user_id="<?php echo  $_SESSION['user_id'] ?>">
                                <a href="#" id="com_t" data-toggle="sidebar-menu " >
                                    <i class="fa fa-fw fa-users"></i>

                                </a>
                                <strong class="friend_count" ></strong>
                            </li>

                            <li class="hidden-xs message_request" user_id="<?php echo  $_SESSION['user_id'] ?>">
                                <a href="#" id="com_t" data-toggle="sidebar-menu ">
                                    <i class="fa fa-comments"></i>
                                </a>
                                <strong class="chat_count" ></strong>
                            </li>

                            <!-- User -->
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle user" data-toggle="dropdown">
                                    <img src='<?php echo $src; ?>' alt="Bill" class="img-circle avatar_src" width="40"> <span class="firstnames"><?php echo $this->user['firstname']; ?></span> <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">

                                    <li><a href="/home/logout">Logout</a></li>

                                </ul>
                            </li>

                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
                </div>
            </div>

            <div  class ="nav_f">
            </div>
      <div class="sidebar sidebar-chat  sidebar-friend right sidebar-size-2 sidebar-offset-0 chat-skin-dark sidebar-visible-mobile st-effect-1" id="sidebar-chat sidebar-friend" style="display: none;">
    <div class="split-vertical">
        <div class="chat-search">
            <input type="text" class="form-control" placeholder="Search">
        </div>

        <ul class="chat-filter nav nav-pills ">
            <li><a href="#" data-target=".online">Friend Requests</a></li>
        </ul>
        <div class="split-vertical-body">
            <div class="split-vertical-cell">
                <div data-scrollable="" style="overflow-y: hidden; outline: none;" tabindex="0">
                    <ul class="chat-contacts friend-req">

                    </ul>
                </div>
            </div>
        </div>
    </div>
<div id="ascrail2000" class="nicescroll-rails" style="width: 5px; z-index: 2; cursor: default; position: absolute; top: 86px; left: 195px; height: 154px; display: block; opacity: 0;"><div style="position: relative; top: 0px; float: right; width: 5px; height: 301px; background-color: rgb(22, 174, 159); border: 0px; background-clip: padding-box; border-radius: 5px;"></div></div></div>

<div class="sidebar sidebar-chat sidebar_chat right sidebar-size-2 sidebar-offset-0 chat-skin-dark sidebar-visible-mobile st-effect-1" id="chat-box" style="display:none;">
                  <div class="split-vertical">
                    <div class="chat-search">
                      <input type="text" class="form-control" placeholder="Search">
                    </div>

                    <ul class="chat-filter nav nav-pills ">
                        <li><a href="#" data-target=".online">Message request</a></li>
                      
                     
                    </ul>
                    <div class="split-vertical-body">
                      <div class="split-vertical-cell">
                        <div data-scrollable="" style="overflow-y: hidden; outline: none;" tabindex="0">
                            <ul class="chat-contacts send_mg">
                                                                
                                
                                                                                                                
                             
                                            
                            </ul>
                        </div>
                      </div>
                    </div>
                  </div>
<div id="ascrail2000" class="nicescroll-rails" style="width: 5px; z-index: 2; cursor: default; position: absolute; top: 86px; left: 195px; height: 222px; display: block; opacity: 0;"><div style="position: relative; top: 0px; float: right; width: 5px; height: 301px; background-color: rgb(22, 174, 159); border: 0px; background-clip: padding-box; border-radius: 5px;"></div></div></div>


<div class="chat-window-container chat_window" style="display: none;">
    
        <div class="panel panel-default" data-user-id="3" id="chs" style="display: block;">
            <div class="panel-heading" data-toggle="chat-collapse" data-target="#chat-bill">
              <a href="#" class="close"><i class="fa fa-times"></i></a>
              <a href="#">
                <span class="pull-left">
                        <img src="images/default_avatar/male.jpg" class="chat_img" width="40" height="40">
                    </span>
                <span class="contact-name chat_name">Aram Mirzoyan</span>
              </a>
            </div>
            <div class="panel-body pan_bod" id="chat-bill chat01">
                

              
              
             
            </div>
            <div class="form-group ">
                <input type="text" class="form-control chat_enter" id="formsd"  to_id=""placeholder="Type message..." >
            </div>  
        </div>
    </div>


