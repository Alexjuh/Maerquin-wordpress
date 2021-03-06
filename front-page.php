<?php
/**
 * The template for displaying front page (home)
 *
 * @package Maerquin_Alexandra
 */

get_header();
get_sidebar(); ?>

    <?php
    	if (have_posts()) :
    		while (have_posts()) : the_post(); ?>
    		<div class="col-xs-12 col-sm-6 col-sm-offset-1 col-md-5 col-md-offset-1">
    			<div id="main">
            <h1><?php the_title();?></h1>
    				<p><?= the_content('post_content', $post->ID) ?></p>
    			</div>
    		</div>
    		<?php endwhile;
    			else: echo '<p>no content fount</p>';
    				endif;
        ?>

	 </div><!-- row from sidebar -->
 </div> <!-- class main -->
</div> <!-- wrapper -->

 <?php get_footer(); ?>
