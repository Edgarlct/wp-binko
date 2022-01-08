<?php
/**
 * The header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Understrap
 */
global $wpdb;
$link = $wpdb->get_results("SELECT guid FROM {$wpdb->prefix}posts WHERE post_title LIKE '%validate%' AND post_name = 'donation-form'", OBJECT);
$link = $link[0]->guid;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$bootstrap_version = get_theme_mod( 'understrap_bootstrap_version', 'bootstrap4' );
$navbar_type       = get_theme_mod( 'understrap_navbar_type', 'collapse' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> <?php understrap_body_attributes(); ?>>
<?php do_action( 'wp_body_open' ); ?>
<div class="site" id="page">

    <nav id="nav" class="navbar navbar-expand-md navbar-light bg-primary fixed-top">
        <div class="container-xl">

            <?php
            the_custom_logo();
            ?>
            <div class="d-flex align-items-center nav-menu" id="menu-item">
            <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'nav-menu',
                    'menu_id' => 'primary-menu',
                )
            );
            ?>
                <div class="btn btn-secondary px-4 rounded">
                    <a href="<?= $link ?>" class="text-white">INVESTIR</a>
                </div>
            </div>
            <button id="btnBurger" class="navbar-toggler buttonBurger" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>
</div>