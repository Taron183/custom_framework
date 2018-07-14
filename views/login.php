<div class="container">

    <form class="form-horizontal" method="POST" >
        <div class="form-group">
            <label class="control-label col-sm-2" for="email">Email:</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="pwd">Password:</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pass">
            </div>
        </div>

        <div class="form-group" style='text-align:right'>
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" name="submit" class="btn btn-default">Log In</button>
            </div>
        </div>

        <h3><?php echo $this->eror;?><h3>
    </form>
</div>