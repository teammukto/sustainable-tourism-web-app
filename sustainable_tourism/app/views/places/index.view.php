<?php include(src("layouts/header.php")); ?>
<section class="section-content">
    <div class="container">
        <h1>Top Visiting Places</h1>
        <hr>
        <div class="row">

        <?php foreach ($places as $place): ?> 
            <div class="grid-4">
                <object data="<?php echo $place->getImage() ?>"></object>
                <h4>
                    <a href="<?php echo url('places/' . $place->getId()); ?>"><?php echo $place->getTitle(); ?></a>
                </h4>
            </div>
        <?php endforeach; ?>
            
            
        </div>
    </div><!-- /container-fluid -->
</section>
<?php include(src("layouts/footer.php")); ?>