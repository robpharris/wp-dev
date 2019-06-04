<?php 
/*
Theme Header
*/
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" type="image/png" href="<?php echo get_bloginfo('template_url'); ?>/favicon.png" />
<title><?php if(is_home()){ echo "Home"; }else{the_title();} ?> | <?php echo get_bloginfo('name') ?></title>
<?php wp_head(); ?>
</head>

<body>
<header>
	<nav class="navbar navbar-expand-lg" id="pg_top">
		<a class="navbar-brand" href="<?php echo get_bloginfo('url') ?>">
			<img src="<?php echo get_template_directory_uri(); ?>/images/Smile_Logo.svg" alt="Smile Pediatrics" />
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"><i class="fa fa-bars"></i></span>
		  </button>
		<div class="collapse navbar-collapse amatic" id="navbarSupportedContent">
			<?php
				wp_nav_menu( array(
				  'theme_location' => 'navbar',
				  'container'      => false,
				  'menu_class'     => 'nav navbar-nav',
				  'fallback_cb'    => '__return_false',
				  'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
				  'depth'          => 2,
				  'walker'         => new bootstrap_4_walker_nav_menu()
			   ) );
			?>
		</div>
		<div class="contact amatic">
			<ul class="locations_contact">
				<li><button type="button" class="contact_btn dd_init"><i class="fa fa-phone"></i> <span>Contact Us</span> <i class="fa fa-angle-down badge"></i></button>
					<ul>
						<li><i class="fa fa-angle-right"></i> El Dorado Hills <a href="tel:9165763387">(916) 573-3387</a></li>
						<li><i class="fa fa-angle-right"></i> Placerville <a href="tel:5307483186">(530) 748-3186</a></li>
                        <li><a href="sms:9165763387" style="float: none;"><i class="fa fa-file-text-o"></i> Text Us</a> <a href="#contact_holder" class="contact_show" ><i class="fa fa-envelope"></i> Email Us</a> </li>
					</ul>
				</li>
			</ul>
			<div class="appointment_holder">
				<a href="#appoint-form" class="appt_btn modal-opener amatic"><span>Schedule</span><span>Your Appointment</span></a>
			</div>
		</div>
	</nav>	
</header>