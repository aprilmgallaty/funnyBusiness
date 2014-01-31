<?php
/*
 * Template Name: FunnyBusiness Contact
 *
 * @package FunnyBusiness
 * @subpackage BuddyPress
 * @since 1.0
 */

get_header(); ?>

<section id="contactPage">

    <article id="contactPageLeft">
        
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/_img/balloonPop400x287.jpg" width="250" height="185" alt="Balloons" />
        
        <h3>Send us your message or the balloon gets it!</h3>
    
    </article>
    
    <article id="contactPageRight">
        <form id="contact" method="post" action="">
            
            <div class="form-title">Name<span class="required">&nbsp;*</span></div>
                <input class="form-field" type="text" name="name" placeholder="Your Name" /><br />
    
            <div class="form-title">Email<span class="required">&nbsp;*</span></div>
                    <input class="form-field" type="text" name="email" placeholder="name@host.com" /><br />
            
            <div class="form-title">Phone Number<span class="required">&nbsp;*</span></div>
                    <input class="form-field" type="text" name="phone" placeholder="123-456-7890" /><br />
                    
            <div class="form-title">Message<span for="comments" class="required">&nbsp;*</span></div>
                    <textarea id="comments" rows="5" cols="25" placeholder="Your Message"></textarea>
            
            <div class="submit-container">
                    <input class="submit-button" type="submit" value="Submit" />
            </div>
            
            <p><span class="required">&nbsp;*</span> are required fields</p>
    </article>    
    
    
    
</form>

    
</section>

<?php get_footer(); ?>