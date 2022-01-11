<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
if (!isset($_GET['id']) OR $_GET['id'] == ''){
    $url = get_site_url();
    wp_redirect($url);
    exit;
}
else{
    $id = $_GET['id'];
}

$data = $wpdb->get_results("SELECT meta_key, meta_value FROM {$wpdb->prefix}give_revenue gr
    JOIN {$wpdb->prefix}give_donationmeta gd on gr.donation_id = gd.donation_id
    WHERE gr.id = {$id};", OBJECT_K);

get_header();

$container = get_theme_mod( 'understrap_container_type' );

?>

    <div class="wrapper mt-5" id="page-wrapper">

        <div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

            <div class="row">

                <main class="site-main w-100" id="main">

                    <?php
                    while ( have_posts() ) {
                        the_post();
                        get_template_part( 'loop-templates/content', 'page' );

                        // If comments are open or we have at least one comment, load up the comment template.
                        if ( comments_open() || get_comments_number() ) {
                            comments_template();
                        }
                    }
                    ?>
                </main><!-- #main -->

            </div><!-- .row -->

        </div><!-- #content -->

    </div><!-- #page-wrapper -->

<script>
    document.getElementById('prenom').value = '<?= $data['_give_donor_billing_first_name']->meta_value ?>';
    document.getElementById('nom').value = '<?= $data['_give_donor_billing_last_name']->meta_value ?>';
    document.getElementById('mail').value = '<?= $data['_give_payment_donor_email']->meta_value ?>';
    document.getElementById('amount').value = parseFloat(<?= $data['_give_payment_total']->meta_value ?>).toFixed(2);
</script>

<?php
get_footer();
