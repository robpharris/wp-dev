<?php /* Template Name: Videos Page */ ?>
<?php get_header(); ?>
    <div id="content" class="container-fluid inner-page">
    	<div id="inner-content">
        	<?php while ( have_posts() ) : the_post(); ?>
            	<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
				<div class="flex_center"><?php the_content(); ?></div>
			<?php endwhile; // end of the loop. ?>
        </div>
</div>
<?php get_footer(); ?>