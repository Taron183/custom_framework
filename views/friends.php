
<div class="container friend_all">

	<div class="row"> 

		<?php for ($i = 0; $i < count($this->friends); $i++) { ?>

			<?php


			    if($this->friends[''+$i+'']['avatar'] == NULL){
			        if($this->friends[''+$i+'']['gender']=='male'){
			            $src="/public/images/default_avatar/male.jpg";

			        }

			        else if($this->friends[''+$i+'']['gender']=='female'){
			            $src="/public/images/default_avatar/female.jpg";
			        }

			    }else{
			        $src='/public/images/'.$this->friends[''+$i+'']['id'].'/'.$this->friends[''+$i+'']['avatar'];
			    }

			?>
    			
			<div class="col-md-6 col-lg-4 item">
				<div class="panel panel-default">
					<div class="panel-heading">
						<div class="media">
							<div class="pull-left"> 
								<img src="<?php echo $src; ?>" width="40" height="40" alt="people" class="media-object img-circle">
							</div>
							<div class="media-body">
								<h4 class="media-heading margin-v-5"><a href="#"><?php echo $this->friends[''+$i+'']['firstname']; ?></a></h4>
								<div class="profile-icons">
								  <span><i class="fa fa-users"></i></span>
								  <span><i class="fa fa-photo"></i> </span>
								  <span><i class="fa fa-video-camera"></i></span>
								</div>
							</div>
						</div>
					</div>
					<div class="panel-body">
						<p class="common-friends">Common Friends</p>
						<div class="user-friend-list">
						 
						</div>
					</div>

				</div>
			</div>


		<?php } ?>
		
				
	</div>

</div>