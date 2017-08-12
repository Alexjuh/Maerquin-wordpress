<?php
/**
 * The template for displaying search results pages
 *
 * @package Maerquin_Alexandra
 */

get_header();
get_sidebar(); ?>

<div class="col-xs-12 col-sm-6 col-sm-offset-1 col-md-5 col-md-offset-1">
	<div id="main">
    <h1>Zoekresultaten</h1>
    <?php
      $s=get_search_query();
      $args = array(
        's' =>$s
      );
      // The Query
      $the_query = new WP_Query( $args );
      if ( $the_query->have_posts() ) {
        _e("<h2>Zoekresultaten voor: ".get_query_var('s')."</h2>");
        while ( $the_query->have_posts() ) {
          $the_query->the_post();
            ?>
            <li>
              <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
              <p><?php the_excerpt(); ?></p>
              <hr>
            </li>
            <?php
        }
      }else{
      ?>
        <h2>Niks gevonden</h2>
          <div class="alert alert-info">
            <p>Sorry, we hebben jouw zoekvraag niet kunnen vinden. Probeer nogmaals met andere woorden.</p>
          </div>
      <?php } ?>

	   </div> <!-- row from sidebar -->
  </div> <!-- class main -->
</div> <!-- wrapper -->

 <?php get_footer(); ?>
