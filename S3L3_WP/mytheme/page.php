<?php get_header(); // hook di WP per elaborare ed includere il file header.php ?>

<div class="container text-center">
        <div class="row">
            <div class="col-8">
                <h1 class="text-center">Page: <?php bloginfo( 'name' ); ?></h1>

                <?php
                    if ( is_user_logged_in() ) {
                        echo 'Welcome, registered user!';
                    } else {
                        echo 'Welcome, visitor!';
                    }
                ?>


            </div>
            <div class="col-4">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>


<?php get_footer(); // hook di WP per elaborare ed includere il file footer.php ?>