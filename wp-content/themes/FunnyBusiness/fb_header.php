<?php
function fb_header() {
?>

<div id="preload">
	<div id="fb_hover"></div>
	<div id="tw_hover"></div>
	<div id="rss_hover"></div>
</div>

<header id="headBG">

    <section id="logo">
        <a href="<?php echo home_url(); ?>"> 
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/_img/FBLogo94x150.png" width="94" height="150" alt="logo" />
            <h1>Funny Business</h1>
        </a>
    </section>
    
    <article id="social">
        <div id="fb">&nbsp;</div>
        <div id="tw">&nbsp;</div>
        <div id="rss">&nbsp;</div>
    </article>
    
	<!--
	We're going to let WordPress create the nav...
	
    <nav>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="http://gallaty.com/fb/wp-login.php">Sign-in</a></li>
            <li><a href="">My Account</a></li>
            <li><a href="#">Clown Search</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Blog</a></li>
            <li><a href="#">FAQ</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
    </nav>
    -->
	
	<?php
		wp_nav_menu( 
			array(
				'container' => 'nav', /* Wrap the menu with a <nav> tag */
				'theme_location' => fb_get_menu(), /* Tells WP which menu to use, as selected in Dashboard->Appearance->Menus */
				'fallback_cb' => false /* No fallback. If we don't have a menu selected, don't display one */
			) 
		);
	?>
	
</header><!-- end #headBG -->
    
<div class="hr"></div>


    
<?php 
}

function fb_before_header() {
?>
<?php
}
?>
