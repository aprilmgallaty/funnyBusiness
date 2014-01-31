<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Funny_Business
 * @since 1.0
 */

get_header(); ?>

<div class="clear">&nbsp;</div>

<section id="mainContent">
    <?php include "_include/homePage/featuredClown.php"; ?>
    <?php include "_include/homePage/clownType.php"; ?>
    <?php include "_include/homePage/blogPostSamp.php"; ?>    
</section><!-- end mainContent -->

<?php get_footer(); ?>