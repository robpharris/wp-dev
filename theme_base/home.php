<?php /* Main Template Page */ ?>
<?php get_header(); ?>
    <div id="content" class="main_body">
    	<div id="inner-content">
        	<?php while ( have_posts() ) : the_post(); ?>
            	<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
				<?php the_content(); ?>
			<?php endwhile; // end of the loop. ?>
        </div> 
    </div>
		
		
	<h2>Loop?</h2>
	<?php
		$children = get_children( array('post_parent' => get_the_ID()) );
		foreach ( $children as $children_id => $child ) {
			echo '<div>';
			echo $child->post_title;
			echo str_replace( ']]>', ']]&gt;',apply_filters( 'the_content', $child->post_content )); //mimic the_content() filters
			//echo $child->post_content; // if you do not need to filter the content;
			echo '</div>';
		}
	?>
</div>
home.php
<?php get_footer(); ?>