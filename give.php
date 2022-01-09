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
    defined('ABSPATH') || exit;

    get_header();

    $container = get_theme_mod('understrap_container_type');

    $data = get_page_by_path('parametre-date-et-donne-financiere');
    $data = get_fields($data->ID);


    ?>
    <script>
        const multiplierA1 = <?= $data['multiplication_investissement_annee']['a1'] ?>;
        const multiplierA2 = <?= $data['multiplication_investissement_annee']['a2'] ?>;
        const multiplierA3 = <?= $data['multiplication_investissement_annee']['a3'] ?>;
        const multiplierA4 = <?= $data['multiplication_investissement_annee']['a4'] ?>;
        const multiplierA5 = <?= $data['multiplication_investissement_annee']['a5'] ?>;
    </script>

        <div class="wrapper" id="page-wrapper">

            <div class="<?php echo esc_attr($container); ?>" id="content" tabindex="-1">

                <div class="d-flex flex-lg-row flex-column-reverse">

                    <section class="container-fluid d-flex flex-column justify-content-start col-lg-6 mx-auto"
                             id="investissement">
                        <div class="d-flex justify-content-center flex-column align-items-center">
                            <p class="fs-7 font-weight-bold text-center">Multipliez par <span class="color-secondary fs-10">3</span>
                                votre
                                investissement initial</p>
                            <p class="ff-ssp fs-6">Simulez votre investissement</p>
                            <from class="w-75">
                                <label for="amount" class="ff-roboto">Montant investit :</label>
                                <div class="d-flex position-relative mb-3">
                                    <input id="amount" class="w-100 border-primary rounded pl-1 py-2" type="text"
                                           name="amount"
                                           placeholder="0" oninput="calculInvest()">
                                    <span class="position-absolute p-right mt-2">€</span>
                                </div>
                                <span id="errorMessage"
                                      class="hiden mb-1 text-danger">Veuillez entrez un chiffre valable</span>
                            </from>
                            <div class="w-75">
                                <a href="<?= $data['contrat'] ?>" class="btn btn-outline-primary w-100">CONTRAT INVESTISSEUR (PDF)</a>
                            </div>
                        </div>
                        <div class="ff-ssp w-75 mx-auto mb-6 mt-4">
                            <p>Je recevrais tous les trimestres :</p>
                            <p><span class="fs-5 color-secondary font-weight-bold">0%</span> du chiffre d’affaires pendant 5
                                ans </p>
                            <p>Total sur 5 ans de : <span id="totalAmount"
                                                          class="fs-5 color-secondary font-weight-bold">0€</span></p>
                            <canvas id="myChart" width="400" height="200"></canvas>
                        </div>
                    </section>
                    <section class="col-lg-6">
                        <?php
                        while (have_posts()) {
                            the_post();
                            give_get_template_part( 'single-give-form/content', 'single-give-form' );

                        }
                        ?>
                    </section>

                </div><!-- .row -->

            </div><!-- #content -->

        </div><!-- #page-wrapper -->

    <?php
    get_footer();
