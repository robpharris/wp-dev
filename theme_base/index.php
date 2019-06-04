<?php /* Main Template Page */ ?>
<?php get_header(); ?>
    <div id="content" class="main_body">
		<?php /*
    	<div id="slider"><?php putRevSlider("home-slider","homepage") ?></div> 
        <?php if ( is_active_sidebar( 'home_main_widgets' ) ) : ?>
        <ul id="side-bar">
        	<!--div id="call"></div>
            <div id="bio"></div>
            <div id="appt"></div-->
            <?php if ( dynamic_sidebar('home_main_widgets') ) : else : endif; ?>
        </ul>
        <?php endif; ?>
    </div> 
	*/
		?>
				<h2>Loop</h2>
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
<?php get_footer(); ?>