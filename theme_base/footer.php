<?php /* Theme Footer */ ?> 
<?php if ( is_active_sidebar( 'foot_widgets' ) ) : ?>
<div class="locations-foot"> 
		<h1 class="loc-header text-center">Our Locations</h1>
    	<ul id="footer-inner">
        	<?php if ( dynamic_sidebar('foot_widgets') ) : else : endif; ?>
        </ul>
</div>
<?php endif; ?>

<?php if (is_active_sidebar('appt_widget')) : ?>
	<div id="appointment-form">
		<button type="button" class="appt_close"><i class="fa fa-close"></i></button>
		<ul><?php if (dynamic_sidebar('appt_widget')) : else : endif; ?></ul>
	</div>
<?php endif; ?>
<?php if (is_active_sidebar('contact_widget')) : ?>
        <ul id="contact_holder"><button type="button" class="contact_close"><i class="fa fa-close"></i></button><?php if (dynamic_sidebar('contact_widget')) : else : endif; ?></ul>
<?php endif; ?>
    <footer>
		<div>
			<div class="copy-right">&copy; <?php echo date(Y); ?> Smile Pediatrics</div>
			<div class="credits">
				<a href="http://www.robharrisdesign.com" target="_blank" style="color: #0071bc;">
					<img src="<?php echo get_template_directory_uri(); ?>/images/rhd-hex-logo.png" alt="Rob Harris Design">
					<p>
						Site Design and<br>Development by<br>Rob Harris Design
					</p>
				</a>
			</div>
		</div>
    </footer>
<div class="smooth-scroll"><a href="#pg_top" id="btn_back_top" ></a></div>
    <?php wp_footer(); ?>
</body>
</html>
