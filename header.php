<?php
/**
 * The header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Understrap
 */

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

    <nav class="navbar navbar-expand-md navbar-light bg-primary">
        <div class="container-xl">
            <a class="navbar-brand" href="#">
                <img src="" alt="logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse d-flex justify-content-end ff-roboto mt-2" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item mr-4">
                        <a href="#" class="nav-link active text-white" aria-current="page">Projet</a>
                    </li>
                    <li class="nav-item mx-4">
                        <a href="#" class="nav-link text-white">Investissement</a>
                    </li>
                    <li class="nav-item mx-4">
                        <a href="#" class="nav-link text-white">Actualités</a>
                    </li>
                    <li class="nav-item mx-4">
                        <a href="#" class="nav-link text-white">Commentaires</a>
                    </li>
                    <li class="nav-item ml-4">
                        <a href="#" class="btn btn-outline-secondary text-white px-4 py-2 rounded">Partager</a>
                    </li>
                    <li class="nav-item ml-4">
                        <a href="#" class="nav-link btn btn-secondary text-uppercase text-white px-4 py-2 rounded font-weight-medium">Investir</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>