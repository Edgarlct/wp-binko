<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

$container = get_theme_mod('understrap_container_type');
?>

<?php get_template_part('sidebar-templates/sidebar', 'footerfull'); ?>

<div class="wrapper bg-primary" id="wrapper-footer">
    <footer class="site-footer" id="colophon">

        <div class="site-info container-xl d-flex justify-content-between row text-white ff-ssp mx-auto">
            <?php the_custom_logo(); ?>
            <div>
                <p class="font-weight-light">Pour nous suivre </p>
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'reseaux-footer',
                        'menu_id' => 'primary-menu',
                    )
                );
                ?>
            </div>
            <div>
                <p class="font-weight-light">Pages</p>
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'menu-footer',
                        'menu_id' => 'primary-menu',
                    )
                );
                ?>
            </div>
        </div><!-- .site-info -->

    </footer><!-- #colophon -->
</div><!-- wrapper end -->

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>

