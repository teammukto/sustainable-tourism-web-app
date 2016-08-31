<?php include 'layouts/header.php'; ?>

<div class="container">
    <div class="row">
        <div class="grid-12">
            <h1>Profile</h1>
            <hr>

            <?php 
                if($user){
                    echo "<h3>Name: ". $user->name(). "</h3>" ;
                    echo "<h3>Email: ". $user->email() . "</h3>" ;
                }
            ?>
        </div>
    </div>
</div>


<?php include 'layouts/footer.php'; ?>