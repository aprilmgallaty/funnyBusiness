<?php
function fb_before_footer() {
?>
<?php
}

function fb_footer() {
    /* Put your header HTML just below this line */ ?>
<footer>

<div class="hr"></div>

	<section id="foot1">
		<div id="designedBy">
			<a href="http://www.gallaty.com/" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/_img/GallatyLogo50x50.png" width="50" height="50" alt="logo" /></a>
		</div>
	</section>
	
	<section id="foot2"><div id="copyright"><h5>&copy; 2013 Funny Business</h5></div></section>

	<section id="foot3">

		<!--
		We're going to let WordPress create the nav...
	
		<div id="secNav">
			<ul>
				<li><a href="http://gallaty.com/fb">Home</a></li>
				<li><a href="http://gallaty.com/fb/wp-login.php">Sign-in</a></li>
				<li><a href="">My Account</a></li>
				<li><a href="http://gallaty.com/fb/clown-search">Clown Search</a></li>
				<li><a href="http://gallaty.com/fb/about">About</a></li>
				<li><a href="http://gallaty.com/fb/blog">Blog</a></li>
				<li><a href="http://gallaty.com/fb/f-a-q">FAQ</a></li>
				<li><a href="http://gallaty.com/fb/contact">Contact</a></li>
			</ul>
		</div>
		
		-->

		<?php
			wp_nav_menu( 
				array(
					'container' => 'div', /* Wrap the menu with a <div> tag */
					'container_id' => 'secNav', /* Sets the <div id='secNav'> */
					'theme_location' => fb_get_menu(), /* Tells WP which menu to use, as selected in Dashboard->Appearance->Menus */
					'fallback_cb' => false /* No fallback. If we don't have a menu selected, don't display one */
				) 
			);
		?>
		
	</section>
		
</footer>     
    
    
<?php /* End your header HTML just above this line */
}
function fb_after_footer() {
?>
<?php
}

?>

