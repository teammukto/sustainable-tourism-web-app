<?php include(src("layouts/header.php"));?>
    <div class="row">
        <div class="container">
            <div class="grid-12">
                <?php 
                    if(!empty($errors)){
                        echo $errors;
                    }
                 ?>
                <form action="create" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="text" name="title" id="title" class="input-control" placeholder="Enter place name here">
                    </div>
                    <div class="form-group">
                        <textarea name="description" id="description" cols="30" rows="5" class="input-control" placeholder="Write your review here"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="file" name="image" id="" class="input-control">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn-primary">Submit Place Information</button>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- /row -->
<?php include(src("layouts/footer.php"));?>