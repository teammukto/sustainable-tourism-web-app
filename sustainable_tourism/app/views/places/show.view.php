<?php include(src("layouts/header.php"));?>

<section class="section-content">
    <div class="container">
        <h1><?php echo $place->getTitle(); ?></h1>
        <hr>
        <div class="row">
            <div class="grid-4">
                <object data="<?php echo url($place->getImage()); ?>"></object>
            </div>
            <div class="grid-8">
                <p><?php echo $place->getDescription(); ?></p>
            </div>
        </div>

        <div class="row">
            <div class="grid-12">
                <h2>Reviews</h2>
                <hr>
                <?php foreach ($reviews as $review): ?>
                    <div class="row">
                        <div class="grid-2">
                            <div class="reviwer">
                                <p><?php echo $review->getUser()->name(); ?></p>
                                <p><?php echo $review->getDate(); ?></p>
                            </div>
                        </div>
                        <div class="grid-10">
                            <p><?php echo $review->getDescription(); ?></p>
                        </div>
                    </div><!-- /row -->
                <?php endforeach; ?>
                
                <form action="<?php echo url('places/' . $place->getId()); ?>" method="post">
                    <?php 
                        if(!empty($errors)){
                            echo $errors;
                        }
                     ?>
                    <div class="form-group">
                        <textarea name="description" id="description" cols="30" rows="5" class="input-control" placeholder="Write your review here"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn-primary">Submit your review</button>
                    </div>
                </form>
            </div>
        </div><!-- /row -->
    </div><!-- /container-fluid -->
</section>
<?php include(src("layouts/footer.php"));?>