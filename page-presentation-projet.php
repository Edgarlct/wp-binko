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

?>

    <div class="wrapper container-fluid bg-primary" id="page-wrapper">

        <div class="<?php echo esc_attr($container); ?>" id="content" tabindex="-1">

            <div class="row">

                <main class="site-main" id="main">
                    <section class="mt-5 container-fluid bg-white rounded mx-auto px-5 py-3">
                        <h2 class="text-center fs-10">Présentation</h2>
                        <section class="bg-gradient-secondary rounded overflow-hidden">
                            <h2 class="text-center col-7 mx-auto font-weight-bold py-6 text-white fs-8">La poubelle qui reconnaît, broie et trie les déchets automatiquement</h2>
                            <div class="d-flex align-items-center justify-content-around mb-8">
                                <img src="https://localhost/wordpress/wp-content/uploads/2022/01/Group-105.png" alt="">
                                <div class="d-flex flex-column col-4 pr-4">
                                    <div class="d-flex align-items-center pb-4">
                                        <img src="https://localhost/wordpress/wp-content/uploads/2022/01/leaf-1.png"
                                             alt="" class="mr-4">
                                        <p class="mb-0 font-weight-medium text-center text-white fs-5">Totalement éco-conçue</p>
                                    </div>
                                    <div class="d-flex align-items-center pb-4">
                                        <img src="https://localhost/wordpress/wp-content/uploads/2022/01/lightbulb-1.png"
                                             alt="" class="mr-4">
                                        <p class="mb-0 font-weight-medium text-center text-white fs-5">Innovante et ludique</p>
                                    </div>
                                    <div class="d-flex align-items-center pb-4">
                                        <img src="https://localhost/wordpress/wp-content/uploads/2022/01/france-2-1.png"
                                             alt="" class="mr-4">
                                        <p class="mb-0 font-weight-medium text-center text-white fs-5">Fabriqué en France</p>
                                    </div>
                                    <div class="d-flex align-items-center pb-4">
                                        <img src="https://localhost/wordpress/wp-content/uploads/2022/01/piggy-bank-1.png"
                                             alt="" class="mr-4">
                                        <p class="mb-0 font-weight-medium text-center text-white fs-5">Financé par les communes</p>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <section class="bg-gradient-primary rounded mt-5">
                            <h2 class="text-center col-7 mx-auto font-weight-bold py-6 text-white fs-8">Du coup, on fais quoi ?</h2>
                            <div class="d-flex justify-content-between align-items-center">
                                <img src="https://localhost/wordpress/wp-content/uploads/2022/01/RB-WEITWINKELKAMERA-2-1.png"
                                     alt="">
                                <p class="w-50 fs-5 text-white font-weight-medium pr-6 text-right">On développe une caméra BREVETABLE qui reconnaît les déchets que vous lui montrez
                                    !</p>
                            </div>
                            <img src="https://localhost/wordpress/wp-content/uploads/2022/01/Group-119.png" alt="" class="d-block mx-auto">
                            <p class="w-75 font-weight-medium fs-5 text-white text-center mx-auto mt-6 pb-5">Elle reconnaît, broie et trie automatiquement les déchets, avant qu’ils soient
                                revalorisés</p>
                        </section>
                        <section>
                            <h2 class="text-center col-7 mx-auto font-weight-bold pt-5 pb-3 fs-8">Et ça change quoi ?</h2>
                            <img src="https://localhost/wordpress/wp-content/uploads/2022/01/Diapo-French-Tech-1.gif"
                                 alt="" class="rounded w-75 d-block mx-auto">
                            <p class="w-75 fs-5 mx-auto text-center mt-3">Binko réduit jusqu’à 12 fois la taille des déchets, dis stop aux erreurs de tri. <strong>Binko
                                    Divise tes coûts de recyclage par 6 !</strong></p>
                        </section>
                        <section class="bg-gradient-primary rounded mt-5">
                            <h2 class="text-center col-7 mx-auto font-weight-bold py-6 text-white fs-8">Concrètement, comment ça fonctionne ?</h2>
                            <p class="text-center col-7 mx-auto font-weight-medium text-white fs-5">Prenons l’exemple de Mathilde, qui souhaite jeter son paquet de gateau préfère</p>
                            <div class="d-flex flex-row col-11 mx-auto justify-content-center">
                                <img src="https://localhost/wordpress/wp-content/uploads/2022/01/C3-sans-fond-1.png"
                                     alt="" class="mx-auto">
                                <div class="col-7 d-flex flex-column justify-content-evenly">
                                    <div class="d-flex align-items-center text-white">
                                        <div class="circle mr-3">
                                            <p class="fs-8 font-weight-bold mb-0">1</p>
                                        </div>
                                        <p class="fs-4 mb-0 font-weight-medium">La caméra reconnaît l’emballage</p>
                                    </div>
                                    <div class="d-flex align-items-center text-white">
                                        <div class="circle mr-3">
                                            <p class="fs-8 font-weight-bold mb-0">2</p>
                                        </div>
                                        <p class="fs-4 mb-0 font-weight-medium">Binko catégorise le produit</p>
                                    </div>
                                    <div class="d-flex align-items-center text-white">
                                        <div class="circle mr-3">
                                            <p class="fs-8 font-weight-bold mb-0">3</p>
                                        </div>
                                        <p class="fs-4 mb-0 font-weight-medium">Le paquet de gâteau est broyé</p>
                                    </div>
                                    <div class="d-flex align-items-center text-white">
                                        <div class="circle mr-3">
                                            <p class="fs-8 font-weight-bold mb-0">4</p>
                                        </div>
                                        <p class="fs-4 mb-0 font-weight-medium">Le carton est trié vers le bon bac</p>
                                    </div>
                                    <div class="d-flex align-items-center text-white">
                                        <div class="circle mr-3">
                                            <p class="fs-8 font-weight-bold mb-0">5</p>
                                        </div>
                                        <p class="fs-4 mb-0 font-weight-medium">Nous collections le bac quand il est plein</p>
                                    </div>
                                    <div class="d-flex align-items-center text-white">
                                        <div class="circle mr-3">
                                            <p class="fs-8 font-weight-bold mb-0">6</p>
                                        </div>
                                        <p class="fs-4 mb-0 font-weight-medium">Il est envoyé au centre de recyclage</p>
                                    </div>
                                    <div class="d-flex align-items-center text-white">
                                        <div class="circle mr-3">
                                            <p class="fs-8 font-weight-bold mb-0">7</p>
                                        </div>
                                        <p class="fs-4 mb-0 font-weight-medium">Le paquet de gâteau est revalorisé</p>
                                    </div>
                                </div>
                            </div>
                            <p class="w-75 fs-5 font-weight-medium text-center text-white mx-auto mt-4 pb-5">Globalement, ça ne change presque rien pour toi, il te suffit juste de scanner et de
                                sortir trois fois moins tes poubelles...</p>
                        </section>
                        <section class="bg-gradient-primary rounded mt-5">
                            <h2 class="text-center col-7 mx-auto font-weight-bold py-6 text-white fs-8">Ce que ça change réellement</h2>
                            <img src="https://localhost/wordpress/wp-content/uploads/2022/01/uykuyki-1.png" alt="" class="mx-auto d-block mb-6">
                            <div class="d-flex flex-row justify-content-between col-11 mx-auto pb-4">
                                <div class="text-white col-5">
                                    <h4 class="fs-5 font-weight-medium mb-5">Poubelle classique</h4>
                                    <div class="d-flex align-items-center mb-4">
                                        <img src="https://localhost/wordpress/wp-content/uploads/2022/01/Group-120.png"
                                             alt="" class="mr-3">
                                        <p class="mb-0 fs-4 font-weight-light">recycle 26% des déchets</p>
                                    </div>
                                    <div class="d-flex align-items-center mb-4">
                                        <img src="https://localhost/wordpress/wp-content/uploads/2022/01/Group-120.png"
                                             alt="" class="mr-3">
                                        <p class="mb-0 fs-4 font-weight-light">revalorise 1 / 10 des emballages plastique</p>
                                    </div>
                                    <div class="d-flex align-items-center mb-4">
                                        <img src="https://localhost/wordpress/wp-content/uploads/2022/01/Group-120.png"
                                             alt="" class="mr-3">
                                        <p class="mb-0 fs-4 font-weight-light">coûte 766 millions d’euros mensuel</p>
                                    </div>
                                    <div class="d-flex align-items-center mb-4">
                                        <img src="https://localhost/wordpress/wp-content/uploads/2022/01/Group-120.png"
                                             alt="" class="mr-3">
                                        <p class="mb-0 fs-4 font-weight-light">represent 5 % des émissions de CO2</p>
                                    </div>
                                    <div class="d-flex align-items-center mb-4">
                                        <img src="https://localhost/wordpress/wp-content/uploads/2022/01/Group-120.png"
                                             alt="" class="mr-3">
                                        <p class="mb-0 fs-4 font-weight-light">des sacs-poubelles fragiles et odorants</p>
                                    </div>
                                    <div class="d-flex align-items-center mb-4">
                                        <img src="https://localhost/wordpress/wp-content/uploads/2022/01/Group-120.png"
                                             alt="" class="mr-3">
                                        <p class="mb-0 fs-4 font-weight-light">à sortir deux fois par semaines</p>
                                    </div>
                                    <div class="d-flex align-items-center mb-4">
                                        <img src="https://localhost/wordpress/wp-content/uploads/2022/01/Group-103.png"
                                             alt="" class="mr-3">
                                        <p class="mb-0 fs-4 font-weight-ligh font-weight-lightt">financée par nos impôts : la TEOM</p>
                                    </div>
                                </div>
                                <div class="text-white col-5">
                                    <h4 class="fs-5 font-weight-medium mb-5">La solution Binko</h4>
                                    <div class="d-flex align-items-center flex-row-reverse mb-4">
                                        <img src="https://localhost/wordpress/wp-content/uploads/2022/01/Group-96.png"
                                             alt="" class="ml-3">
                                        <p class="mb-0 fs-4 font-weight-light text-right">recycle 71% des déchets</p>
                                    </div>
                                    <div class="d-flex align-items-center flex-row-reverse mb-4">
                                        <img src="https://localhost/wordpress/wp-content/uploads/2022/01/Group-96.png"
                                             alt="" class="ml-3">
                                        <p class="mb-0 fs-4 font-weight-light text-right">emballages plastiques : revalorisés à 89%</p>
                                    </div>
                                    <div class="d-flex align-items-center flex-row-reverse mb-4">
                                        <img src="https://localhost/wordpress/wp-content/uploads/2022/01/Group-96.png"
                                             alt="" class="ml-3">
                                        <p class="mb-0 fs-4 font-weight-light text-right">divise par 6 le coût du recyclage du déchet</p>
                                    </div>
                                    <div class="d-flex align-items-center flex-row-reverse mb-4">
                                        <img src="https://localhost/wordpress/wp-content/uploads/2022/01/Group-96.png"
                                             alt="" class="ml-3">
                                        <p class="mb-0 fs-4 font-weight-light text-right">représente 40% d’émissions en moins</p>
                                    </div>
                                    <div class="d-flex align-items-center flex-row-reverse mb-4">
                                        <img src="https://localhost/wordpress/wp-content/uploads/2022/01/Group-96.png"
                                             alt="" class="ml-3">
                                        <p class="mb-0 fs-4 font-weight-light text-right">des bacs hermétiques, inodores et solide</p>
                                    </div>
                                    <div class="d-flex align-items-center flex-row-reverse mb-4">
                                        <img src="https://localhost/wordpress/wp-content/uploads/2022/01/Group-96.png"
                                             alt="" class="ml-3">
                                        <p class="mb-0 fs-4 font-weight-light text-right">à sortir une à deux fois par mois</p>
                                    </div>
                                    <div class="d-flex align-items-center flex-row-reverse mb-4">
                                        <img src="https://localhost/wordpress/wp-content/uploads/2022/01/Group-103.png"
                                             alt="" class="ml-3">
                                        <p class="mb-0 fs-4 font-weight-light text-right">financée par nos impôts : la TEOM</p>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <section>
                            <h2 class="col-10 fs-8 font-weight-bold mx-auto text-center py-6">Et cette caméra, comment elle peut détécter tout ça ?</h2>
                            <div class="d-flex align-items-center justify-content-around mb-5">
                                <div class="col-6 fs-5">
                                    <p class="mb-4">Notre technologies est basée sur une intelligence artificielle de reconnaissance
                                        de forme, de texte, de code barre et de QR code, que nous avons développée avec
                                        notre <strong>partenaire Google France</strong></p>
                                    <p>Nous avons constitué une base de données de <strong>819 120</strong> produits
                                        pour identifier un maximum de déchets</p>
                                </div>
                                <img src="https://localhost/wordpress/wp-content/uploads/2022/01/image-2.png" alt="">
                            </div>
                        </section>
                        <section class="rounded bg-gradient-mixed-primary-secondary mb-5">
                            <h2 class="col-10 fs-8 font-weight-bold mx-auto text-center py-6 text-white">Et combien ça va coûter ?</h2>
                            <div class="d-flex col-11 align-items-center justify-content-around pb-5 mx-auto">
                                <img src="https://localhost/wordpress/wp-content/uploads/2022/01/4-copie-2-1-1.png"
                                     alt="">
                                <div class="text-white col-6 fs-5">
                                    <p class="mb-4">Bah rien en fait...</p>
                                    <p>Nos clients sont les communes. Elles achètent nos Binkos et les installent
                                        gratuitement, réduisant ainsi le nombre de camions poubelles et le besoin en
                                        centre de tri. Cerise sur le gâteau, la solution est entièrement fiancée avec la
                                        taxe d’enlèvement des ordures ménagères !</p>
                                </div>
                            </div>
                        </section>
                        <section>
                            <h2>Et ensuite ?</h2>
                            <div>
                                <div>
                                    <p>Novembre 2021</p>
                                    <div>
                                        <img src="https://localhost/wordpress/wp-content/uploads/2022/01/piggy-bank-1-1.png"
                                             alt="">
                                    </div>
                                    <p>Crowdfounding</p>
                                </div>
                                <div>
                                    <p>janvier 2022</p>
                                    <div>
                                        <img src="https://localhost/wordpress/wp-content/uploads/2022/01/production-1.png"
                                             alt="">
                                    </div>
                                    <p>Pré-industrilsation Bureau d’étude</p>
                                </div>
                                <div>
                                    <p>Mai 2022</p>
                                    <div>
                                        <img src="https://localhost/wordpress/wp-content/uploads/2022/01/search-1.png"
                                             alt="">
                                    </div>
                                    <p>Phase de test (6 mois) Yvelines</p>
                                </div>
                                <div>
                                    <p>Octobre 2022</p>
                                    <div>
                                        <img src="https://localhost/wordpress/wp-content/uploads/2022/01/flag-1.png"
                                             alt="">
                                    </div>
                                    <p>Première commune cliente</p>
                                </div>
                            </div>
                        </section>
                        <section class="bg-gradient-primary mb-5 rounded">
                            <h2 class="col-10 fs-8 font-weight-bold mx-auto text-center pt-4 pb-2 text-white">Ils nous soutiennent déjà</h2>
                            <img src="https://localhost/wordpress/wp-content/uploads/2022/01/cfzefzerfzef-1.png" alt="" class="d-block mx-auto">
                        </section>
                    </section>
                </main><!-- #main -->

            </div><!-- .row -->

        </div><!-- #content -->

    </div><!-- #page-wrapper -->

<?php
get_footer();
