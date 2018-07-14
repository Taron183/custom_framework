<div class="container photo">
    <div class="tabbable">
        <ul class="nav nav-tabs" tabindex="0" style="overflow: hidden; outline: none;">
            <li class="active"><a href="#home" data-toggle="tab"><i class="fa fa-fw fa-picture-o"></i> Add avatar Photo</a></li>
            <li class=""><a href="#profile" data-toggle="tab"><i class="fa fa-fw fa-folder"></i> Albums</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade active in" id="home">
                <div>
                    <img src="<?php echo $src; ?>" width="128" heigth="120" alt="image" class="avatar_src">
                </div>
                <div>
                    <label for="file" class="button-file-upload">
                        <span class="fake-upload-button">Choose File</span>
                        <span class="js-button-file-upload-text button-file-upload-text"></span>
                        <input type="file" id="file" name="file" class="js-button-file-upload-input sortpicture">
                    </label>
                    <div class="form-group">
                        <button type="button" class="btn btn-success upload">Add photo</button>
                    </div>
                    <p id="eror"></p>
                </div>
            </div>

            <div class="tab-pane fade" id="profile">
                <form action="" method="post" enctype="multipart/form-data">
                    <div>
                        <div class="form-group">
                            <input type="file" name="files[]" multiple/>
                        </div>

                        <div class="form-group">
                            <button type="submit"  name="btnSubmit" class="btn btn-success">Add foto</button>
                        </div>
                        <p id="eror"></p>
                    </div>
                </form>




            </div>
            <div class="marg">

            </div>


        </div>
    </div>


</div>