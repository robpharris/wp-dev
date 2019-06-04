<?php /* Template Name: No Automatic Title */ ?>
<?php get_header(); ?>
    <div id="content" class="container-fluid interior-pg">
    	<div id="inner-content" class="container-fluid">
        	<?php while ( have_posts() ) : the_post(); ?>
            	<!--h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2-->
				<?php the_content(); ?>
			<?php endwhile; // end of the loop. ?>
        </div> 
    </div>
<?php get_footer(); ?>