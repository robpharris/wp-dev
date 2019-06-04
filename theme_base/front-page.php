<?php /* Front Page Template */ ?>
<?php get_header(); ?>
    <div id="content" class="container-fluid">

			<div class="container-fluid">
        	<?php while ( have_posts() ) : the_post(); ?>
			
			<?php
			$bgImg = '';
			if(has_post_thumbnail()){
				$bgImg='background-image: url('.get_the_post_thumbnail_url(get_the_ID(),'full').');';
			}
			?>
            <!--<div class="bg_img_fill" style="<?php echo $bgImg ?>" data-post-id="<?php echo get_the_ID(); ?>">-->
				<!--<h2 class="ctrBlock"><?php the_title(); ?></h2>-->
				<?php the_content(); ?>
			<!--</div>-->
			<?php endwhile; // end of the loop. ?>
        </div>

		<?php
			$children = get_children( array('post_parent' => get_the_ID()) );
			foreach ( $children as $children_id => $child ) {
				$ID_ = $child->ID;
				$imgCircle = '';
				if(get_post_type($ID_) == "page"){
					$divClass = "";
					$this_title = $child->post_title;
					/*if($this_title == 'Meet The Doctor'){
						$divClass = ' mtd_div slide-home';
						$docPic = get_the_post_thumbnail_url($ID_, 'full');
						if($docPic != ''){
							$caption = wp_kses_post(get_post(get_post_thumbnail_id($ID_))->post_excerpt);
							$imgCircle = '<div class="circle" style="background-image: url('.$docPic.');"><div class="caption amatic">'.$caption.'</div></div>';
						}
					}*/
					echo '<div class="content" data-post-type="'.get_post_type($ID_).'">';
					echo '<h2 class="ctrBlock">' . $this_title . '</h2><div class="page-content-div">';
					echo $imgCircle;
					echo str_replace( ']]>', ']]&gt;',apply_filters( 'the_content', $child->post_content )); //mimic the_content() filters
					//echo $child->post_content; // if you do not need to filter the content;
					echo '</div></div>';
					//if($this_title == 'Meet The Doctor'){ echo '</div>'; }
				}
			}
		?>

</div>
    	
<?php get_footer(); ?>