<div class="container">
    <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
        	<div class="panel panel-default">
        		<div class="panel-heading">
			    		<h3 class="panel-title">Sign up </small></h3>
			 	</div>
				<div class="panel-body">
					<form  method="POST">
						<div class="row">
							<div class="col-xs-6 col-sm-6 col-md-6">
								<div class="form-group">
									<input type="text" name="first_name" id="first_name" class="form-control input-sm" placeholder="First Name">
								</div>
							</div>
							<div class="col-xs-6 col-sm-6 col-md-6">
								<div class="form-group">
									<input type="text" name="last_name" id="last_name" class="form-control input-sm" placeholder="Last Name">
								</div>
							</div>
						</div>

						<div class="form-group">
							<input type="email" name="email" id="email" class="form-control input-sm" placeholder="Email Address">
						</div>

						<div class="row">
							<div class="col-xs-6 col-sm-6 col-md-6">
								<div class="form-group">
									<input type="password" name="password" id="password" class="form-control input-sm" placeholder="Password">
								</div>
							</div>
							<div class="col-xs-6 col-sm-6 col-md-6">
								<div class="form-group">
									<input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-sm" placeholder="Confirm Password">
								</div>
							</div>
						</div>
                        <label class="radio-inline">
                            <input type="radio" name="gender" value="male" checked="">

                            Male
                        </label>

                        <label class="radio-inline">
                            <input type="radio" name="gender" value="female">
                            Female
                        </label>
						
						<input type="submit" name="reg" value="Register" class="btn btn-info btn-block">
					
					</form>
					
					<h3> <?php echo $this->empty_error; ?> </h3>
				</div>
	    	</div>
		</div>
	</div>
</div>