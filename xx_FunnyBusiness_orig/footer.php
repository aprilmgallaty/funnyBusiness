<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the
 * #main and #page div elements.
 *
 * @package Funny_Business
 * @since 1.0
 */
?>

<footer>

<div class="hr"></div>

	<section id="foot1"><div id="designedBy"><img src="<?php echo get_template_directory_uri(); ?>/_img/GallatyLogo50x50.png" width="50" height="50" alt="April Gallaty Designs" /></div></section>
	
		<section id="foot2"><div id="copyright"><p>&copy; 2013 Funny Business</p></div></section>

	<section id="foot3">
		<div id="secNav">
			<ul>
				<li><a href="http://gallaty.com/fb">Home</a></li>
				<li><a href="http://gallaty.com/fb/wp-login.php">Sign-in</a></li>
				<li><a href="<?php bp_displayed_user_link(); ?>">My Account</a></li>
				<li><a href="http://gallaty.com/fb/clown-search">Clown Search</a></li>
				<li><a href="http://gallaty.com/fb/about">About</a></li>
				<li><a href="http://gallaty.com/fb/blog">Blog</a></li>
				<li><a href="http://gallaty.com/fb/f-a-q">FAQ</a></li>
				<li><a href="http://gallaty.com/fb/contact">Contact</a></li>
			</ul>
		</div>
	</section>
		
</footer>

<?php wp_footer(); ?>

</body>

</html>