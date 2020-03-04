<?php
/**
 * Single Posts Template
 *
 *
 * @file           single.php
 * @package        Pixel-Linear
 * @author        Scepter Marketing
 * @copyright      2014 - 2019 Scepter Marketing Themes
 * @license        license.txt
 * @version        Release: 1.0.0
 * @link           http://codex.wordpress.org/Theme_Development#Single_Post_.28single.php.29
 * @since          available since Release 1.0
 */
?>
<?php get_header(); ?>

<div id="content">

  <?php if ( have_posts() ) : ?>

  <?php while ( have_posts() ) : the_post(); ?>

  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div id="white">
      <div class="container">
        <div class="row">
		<?php 
  	if( bi_get_data('custom_single_post_layout') == 'No Sidebar' ){
  		$colside = "0";
		$colmain = "12";
	}elseif(bi_get_data('custom_single_post_layout') == 'Left Sidebar'){
		$colside = "3";
		$colmain = "9";
	}elseif(bi_get_data('custom_single_post_layout') == 'Right Sidebar'){
		$colside = "3";
		$colmain = "9";
	}elseif(bi_get_data('custom_single_post_layout') == 'Left + Right Sidebar'){
		$colside = "3";
		$colmain = "6";
	}
  ?>
  

  <?php if ( bi_get_data('custom_single_post_layout') == 'Left Sidebar' || bi_get_data('custom_single_post_layout') == 'Left + Right Sidebar' ) { ?>
      <div class="col-sm-<?php echo $colside; ?>">
            <?php dynamic_sidebar('left-sidebar'); ?>
    </div><!-- col left -->
  <?php } ?>
          <div class="col-sm-<?php echo $colmain; ?>">

           <section class="post-meta">  
                  <a href="<?php echo get_permalink() ?>">
                   <header>
                     <h3 class="post-title"><?php the_title(); ?></h3>
                   </header>        
                   <p><i class="fa fa-user"></i> <?php the_author_meta( 'display_name' ); ?> / <i class="fa fa-calendar"></i> <time class="post-date"><?php the_date(); ?></time></p>                  </a>	
                  </section><!-- end of .post-meta -->


          <?php if ( has_post_thumbnail() ) : ?>

          <p><?php the_post_thumbnail(); ?></p>
        <?php endif; ?>

        <section class="post-entry">
          <?php the_content(); ?>

          <?php if ( get_the_author_meta( 'description' ) != '' ) : ?>

          <div id="author-meta">
            <?php if ( function_exists( 'get_avatar' ) ) { echo get_avatar( get_the_author_meta( 'email' ), '80' ); }?>
            <div class="about-author"><?php _e( 'About', 'azkaban_options' ); ?> <?php the_author_posts_link(); ?></div>
            <p><?php the_author_meta( 'description' ) ?></p>
          </div><!-- end of #author-meta -->

        <?php endif; // no description, no author's meta ?>


        <?php custom_link_pages( array(
    'before' => '<nav class="pagination"><ul>' ,
    'after' => '</ul></nav>',
    'next_or_number' => 'next_and_number', // activate parameter overloading
    'nextpagelink' => __( '&rarr;','' ),
    'previouspagelink' => __( '&larr;','' ),
    'pagelink' => '%',
    'echo' => 1 )
); ?>


                          </section><!-- end of .post-entry -->

                          <footer class="article-footer">
                            <?php if ( bi_get_data( 'enable_disable_tags', '1' ) == '1' ) {?>
                            <div class="post-data">
                              <?php the_tags( __( 'TAGS:', 'azkaban_options' ) . ' ', ' - ', '<br />' ); ?>
                            </div><!-- end of .post-data -->
                            <?php } ?>

                            <div class="post-edit"><?php edit_post_link( __( 'Edit', 'azkaban_options' ) ); ?></div>
                          </footer>


                        </div>
	<?php if ( bi_get_data('custom_single_post_layout') == 'Right Sidebar' || bi_get_data('custom_single_post_layout') == 'Left + Right Sidebar' ) { ?>
                <div class="col-sm-<?php echo $colside; ?>">
                        <?php dynamic_sidebar('right-sidebar'); ?>
                </div> <!-- col right -->
    <?php } ?>
                      </div>
                    </div>
                  </div>
                </article><!-- end of #post-<?php the_ID(); ?> -->

                <div class="container">
                  <div class="row">
                    <div class="col-sm-12">

                      <?php comments_template( '', true ); ?>

                    </div>
                  </div>
                </div>

              <?php endwhile; ?>

              <?php if (  $wp_query->max_num_pages > 1 ) : ?>

              <div class="container">
                <div class="row">
                  <div class="col-sm-12">

                    <nav class="navigation">
                     <div class="previous"><?php next_posts_link( __( '&#8249; Older posts', 'azkaban_options' ) ); ?></div>
                     <div class="next"><?php previous_posts_link( __( 'Newer posts &#8250;', 'azkaban_options' ) ); ?></div>
                   </nav><!-- end of .navigation -->

                 </div>
               </div>
             </div>
           <?php endif; ?>

         <?php else : ?>

         <article id="post-not-found" class="hentry clearfix">

           <div class="container">
            <div class="row">
              <div class="col-sm-12">
                <header>
                 <h1 class="title-404"><?php _e( '404 &#8212; Fancy meeting you here!', 'azkaban_options' ); ?></h1>
               </header>
               <section>
                 <p><?php _e( 'Don&#39;t panic, we&#39;ll get through this together. Let&#39;s explore our options here.', 'azkaban_options' ); ?></p>
               </section>
               <footer>
                 <h6><?php _e( 'You can return', 'azkaban_options' ); ?> <a href="<?php echo home_url(); ?>/" title="<?php esc_attr_e( 'Home', 'azkaban_options' ); ?>"><?php _e( '&#9166; Home', 'azkaban_options' ); ?></a> <?php _e( 'or search for the page you were looking for', 'azkaban_options' ); ?></h6>
                 <?php get_search_form(); ?>
               </footer>

             </div>
           </div>
         </div>

       </article>


     <?php endif; ?>

   </div><!-- end of #content -->



   <?php get_footer(); ?>
