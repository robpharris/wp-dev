<?php /* Template Name: No Auto Title - Widgets */ ?>
<?php get_header(); ?>
    <div id="content">
    	<div id="inner-content" class="flex-box">
        	<?php while ( have_posts() ) : the_post(); ?>
            	<div class="threeWide"><!--h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2-->
				<?php the_content(); ?>
			<?php endwhile; // end of the loop. ?>
            </div>
            
            <?php if ( is_active_sidebar( 'page_widgets' ) ) : ?>    
            <div class="oneWide"><ul id="page-sb">
                <?php if ( dynamic_sidebar('page_widgets') ) : else : endif; ?>
            </ul></div>
            <?php endif; ?>
        </div> 
    </div>
<?php get_footer(); ?>