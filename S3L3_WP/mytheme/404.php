<?php get_header(); // hook di WP per elaborare ed includere il file header.php ?>

<div class="container text-center">
        <div class="row">
            <div class="col-8">
                <h1 class="text-center">Page: <?php bloginfo( 'name' ); ?></h1>

                
                <div class="page-wrapper">
				<div class="page-content">
					<h2><?php _e( 'This is somewhat embarrassing, isn’t it?', 'twentythirteen' ); ?></h2>
					<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'twentythirteen' ); ?></p>

					<?php get_search_form(); ?>
				</div><!-- .page-content -->
			</div><!-- .page-wrapper -->

            </div>
            <div class="col-4">
                <?php get_sidebar(); ?>
            </div>
        </div>
</div>


<?php get_footer(); // hook di WP per elaborare ed includere il file footer.php ?>