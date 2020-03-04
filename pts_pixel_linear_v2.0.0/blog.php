<?php
/**
 * Blog Template
 *  Template Name: Blog
 * @file           blog.php
 * @package        Pixel-Linear 
 * @author        Scepter Marketing 
 * @copyright      2014 - 2019 Scepter Marketing Themes
 * @license        license.txt
 * @version        Release: 1.0.0
 * @link           http://codex.wordpress.org/Templates
 * @since          available since Release 1.0
 */
 ?>
   
   
   
   <?php get_header(); ?>
   <?php global $more; $more = 0; ?>
   
   <?php
   global $wp_query;
   if ( get_query_var('paged') ) {
    $paged = get_query_var('paged');
  } elseif ( get_query_var('page') ) {
    $paged = get_query_var('page');
  } else {
    $paged = 1;
  }
  query_posts( array( 'post_type' => 'post', 'paged' => $paged ) );
  ?>   


  <?php if (have_posts()) : ?>
  
  <div class="container pt">	
  <div class="row">
  
  <?php 
  	if( bi_get_data('custom_blog_layout') == 'No Sidebar' ){
  		$colside = "0";
		$colmain = "12";
	}elseif(bi_get_data('custom_blog_layout') == 'Left Sidebar'){
		$colside = "3";
		$colmain = "9";
	}elseif(bi_get_data('custom_blog_layout') == 'Right Sidebar'){
		$colside = "3";
		$colmain = "9";
	}elseif(bi_get_data('custom_blog_layout') == 'Left + Right Sidebar'){
		$colside = "3";
		$colmain = "6";
	}
  ?>
  

  <?php if ( bi_get_data('custom_blog_layout') == 'Left Sidebar' || bi_get_data('custom_blog_layout') == 'Left + Right Sidebar' ) { ?>
    <div class="col-sm-<?php echo $colside; ?>">
            <?php dynamic_sidebar('left-sidebar'); ?>
    </div><!-- col left -->
  <?php } ?>
  
  <div class="col-sm-<?php echo $colmain; ?>">
  <?php while (have_posts()) : the_post(); ?>

          <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                  <section class="post-meta">  
                  <a href="<?php echo get_permalink() ?>">
                   <header>
                     <h3 class="post-title"><?php the_title(); ?></h3>
                   </header>        
                   <p><i class="fa fa-user"></i> <?php the_author_meta( 'display_name' ); ?> / <i class="fa fa-calendar"></i> <time class="post-date"><?php the_date(); ?></time></p>                  </a>	
                  </section><!-- end of .post-meta -->

                  <section class="post-entry">
                  <?php if ( has_post_thumbnail()){ ?>
                  <div class="col-sm-2 centered">
                        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
                          <?php the_post_thumbnail('thumbnail'); ?>
                        </a>
                  </div>
                  <div class="col-sm-10">
                  <?php  }else { ?>
                  <div class="col-sm-12">
                  <?php } ?>
    
                      <?php the_content(); ?>
                  </div>
                  <?php if(has_tag()) { ?>
                  <footer class="col-sm-12 post-footer">  
                    <bd>Tags :</bd> <?php ; echo the_tags("", " | ", ""); ?>
                  </footer>
                  <?php } ?>
                  <div class="clearfix"></div>

                  <?php custom_link_pages(array(
                    'before' => '<nav class="pagination"><ul>',
                    'after' => '</ul></nav>',
                            'next_or_number' => 'next_and_number', # activate parameter overloading
                            'nextpagelink' => __('&rarr;',''),
                            'previouspagelink' => __('&larr;',''),
                            'pagelink' => '%',
                            'echo' => 1 )
                            ); ?>

                          </section><!-- end of .post-entry -->  

                </article><!-- end of #post-<?php the_ID(); ?> -->



              <?php endwhile; ?> 
              </div> <!-- post col -->
              
              
              <?php if ( bi_get_data('custom_blog_layout') == 'Right Sidebar' || bi_get_data('custom_blog_layout') == 'Left + Right Sidebar' ) { ?>
                <div class="col-sm-<?php echo $colside; ?>">
                        <?php dynamic_sidebar('right-sidebar'); ?>
                </div> <!-- col right -->
              <?php } ?>
              
              
               </div> <!-- /row -->
                  </div> <!-- /container -->
              

              <?php if (  $wp_query->max_num_pages > 1 ) : ?>
              <div class="container">

              <div class="row">
                <div class="col-sm-12">
                  <hr>
              <nav>
                <ul class="pager">
                 <li class="previous"><?php next_posts_link( __( '&#8249; Older posts', 'azkaban_options' ) ); ?></li>
                 <li class="next"><?php previous_posts_link( __( 'Newer posts &#8250;', 'azkaban_options' ) ); ?></li>
               </ul><!-- end of .navigation -->
             </nav>
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
           <h1 class="title-404"><?php _e('404 &#8212; Fancy meeting you here!', 'azkaban_options'); ?></h1>
         </header>
         <section>
           <p><?php _e('Don&#39;t panic, we&#39;ll get through this together. Let&#39;s explore our options here.', 'azkaban_options'); ?></p>
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


   </div> <!-- /col-lg-8 -->

   <?php get_footer(); ?>