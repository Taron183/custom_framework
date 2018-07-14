
<?php

$user_id  = $_SESSION['user_id'];
    if($this->user_search['avatar'] == NULL){
        if($this->user_search['gender']=='male'){
            $src="/public/images/default_avatar/male.jpg";

        }

        else if($this->user_search['gender']=='female'){
            $src="/public/images/default_avatar/female.jpg";
        }

    }else{
        $src='/public/images/'.$this->user_search['id'].'/'.$this->user_search['avatar'];
    }

?>


<div class="st-container">

    <div class="chat-window-container"></div>

    <!-- sidebar effects OUTSIDE of st-pusher: -->
    <!-- st-effect-1, st-effect-2, st-effect-4, st-effect-5, st-effect-9, st-effect-10, st-effect-11, st-effect-12, st-effect-13 -->

    <!-- content push wrapper -->
    <div class="st-pusher" id="content">

        <!-- sidebar effects INSIDE of st-pusher: -->
        <!-- st-effect-3, st-effect-6, st-effect-7, st-effect-8, st-effect-14 -->

        <!-- this is the wrapper for the content -->
        <div class="st-content">

            <!-- extra div for emulating position:fixed of the menu -->
            <div class="st-content-inner" id="st-content_he">



                <div class="container">

                    <div class="cover profile">
                        <div class="wrapper">
                            <div class="image" id="images_pading">
                                <img src="/public/images/profile-cover.jpg" alt="people">
                            </div>


                            <?php if($user_id != $this->user_search['id'] ){ ?>
                                <div class="profile-icons  ico_1  fiend-add">
                                    <span class="sp_1 ">
                                        <button class="friend add-friend" user_id="<?php echo $user_id; ?>" friend_id="<?php echo $this->user_search['id']; ?>">
                                            <?php if($this->statusCheck['status'] == "0" ){ ?>
                                                Friend Request Sent
                                            <?php }elseif($this->statusCheck['status'] == "1"){ ?>
                                                Friends
                                            <?php }else{ ?>
                                                Add Friend
                                            <?php } ?>


                                        </button>

                                    </span>
                                </div>


                                <?php var_dump($this->statusCheck['status']); ?>
                                <?php var_dump($this->user_search['id']); ?>


                            <?php }?>

                            <?php if($this->statusCheck['status'] == "1"){ ?>
                                <div class="profile-icons  ico_1">
                                    <span class="sp_1 ">
                                         <button class="unfriend" user_id="<?php echo $user_id; ?>" friend_id="<?php echo $this->user_search['id']; ?>"> Unfriend</button>;
                                    </span>
                                </div>
                            <?php } ?>




                        </div>
                        <div class="cover-info">
                            <div class="avatar">
                                <img src="<?php echo $src; ?>" class="avatar_src" alt="people">
                            </div>
                            <div class="name"><a href="#"><?php  echo  $this->user_search['firstname']  ?>  <span class="firstnames"><?php echo $this->user_search['lastname'] ?></span> </a></div>
                            <ul class="cover-nav">


                                <li><a href="#"><i class="fa fa-fw icon-ship-wheel"></i> Timeline</a></li>
                                <li><a href="#"><i class="fa fa-fw icon-user-1"></i> About</a></li>
                                <li><a href="#"><i class="fa fa-fw fa-users"></i> Friends</a></li>

                                <?php if($user_id == $this->user_search['id'] ){ ?>
                                    <li><a href="/account/photo"><i class="fa fa-photo"></i> Photos</a></li>
                               <?php }else{?>
                                    <li><a href=""><i class="fa fa-photo"></i> Photos</a></li>
                                <?php } ?>





                            </ul>
                        </div>
                    </div>



                </div>

            </div>
            <!-- /st-content-inner -->

        </div>
        <!-- /st-content -->

    </div>
    <!-- /st-pusher -->



</div>


