<?php /**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 *
 * @package Maerquin_Alexandra
 */

get_header();
get_sidebar(); ?>

  <div class="col-xs-12 col-sm-6 col-sm-offset-1 col-md-5 col-md-offset-1">
  	<div id="main">
  		 <h1>Nieuws</h1>
  			<?php if (have_posts()) :
  			while (have_posts()) : the_post(); ?>
  				<h2><?php echo get_the_title( $post_id ); ?></h2>
  				<p><?= get_post_field('post_content', $post->ID) ?></p>
  			<?php endwhile;
  			else: echo '<p>no content fount</p>';
  			endif;
  			?>
  	</div> <!-- id main -->
  </div> <!-- class col -->

</div> <!-- row from sidebar -->

<?php get_footer(); ?>
