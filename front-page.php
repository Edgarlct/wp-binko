<?php

$results = $wpdb->get_results("SELECT meta_key, meta_value, p.guid FROM {$wpdb->prefix}give_formmeta f 
    JOIN {$wpdb->prefix}posts p  on f.form_id = p.ID 
WHERE (meta_key IN ('_give_set_goal', '_give_form_goal_progress', '_give_form_earnings', '_give_form_sales') 
           AND p.post_name = 'donation-form' AND p.post_title LIKE '%validate%')", OBJECT);

$url = get_site_url();

// cut in array value for get only int
$amount = explode('.', $results[3]->meta_value);
// cut amount with space
$amount = strrev(chunk_split(strrev($amount[0]), 3, ' '));

$pseudo = htmlspecialchars($_POST['pseudo']);
$comment = htmlspecialchars($_POST['comment']);

if (strlen($pseudo) > 1 and strlen($comment) > 1) {
    $data = array(
        'comment_post_ID' => 1,
        'comment_author' => $pseudo,
        'comment_content' => $comment
    );

    wp_insert_comment($data);
    wp_redirect($url . '/#commentaire');
    exit;
}
$date = date_create();
$data = get_page_by_path('parametre-date-et-donne-financiere');
$data = get_fields($data->ID);
$end_date = date_create($data['date_fin']);
$end_date = date_diff($date, $end_date);
$end_date = $end_date->days;
defined('ABSPATH') || exit;

get_header();

$post = get_page_by_path('presentation-projet');
$fileds = get_fields($post->ID);

function displayImg($imgSrc = false, $imgSrcMobile = false, $displayImgMobile = false)
{
    $img = $imgSrc;
    $imgMobile = $imgSrcMobile;
    $hiddenImgMobile = $displayImgMobile;

    if ($hiddenImgMobile == false) {
        if ($imgMobile == false) {
            echo '<img src="' . $img['url'] . '" alt="' . $img['alt'] . '">';
        }
        if (is_array($imgMobile)) {
            echo '<img src="' . $img['url'] . '" alt="' . $img['alt'] . '" class="d-lg-block d-none">';
            echo '<img src="' . $imgMobile['url'] . '" alt="' . $img['alt'] . '"class="d-lg-none d-block">';
        }

    }
    if ($hiddenImgMobile == true) {
        echo '<img src="' . $img['url'] . '" alt="' . $img['alt'] . '" class="d-lg-block d-none">';
    }

}

?>

    <body>
<script>
    const multiplierA1 = <?= $data['multiplication_investissement_annee']['a1'] ?>;
    const multiplierA2 = <?= $data['multiplication_investissement_annee']['a2'] ?>;
    const multiplierA3 = <?= $data['multiplication_investissement_annee']['a3'] ?>;
    const multiplierA4 = <?= $data['multiplication_investissement_annee']['a4'] ?>;
    const multiplierA5 = <?= $data['multiplication_investissement_annee']['a5'] ?>;
</script>
<header class="bg-primary px-3 py-6 mt-5">
    <div class="container-xl d-flex justify-content-between align-items-center text-white">
        <div class="col-7 px-0">
            <h1 class="font-weight-bold mt-0 test">Binko, la poubelle intelligente</h1>
            <p class="ff-roboto fs-4 font-italic mb-4">La poubelle qui changera votre vie</p>
            <iframe class="video" src="https://www.youtube.com/embed/k5IyKIN10yU"
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
        </div>
        <div class="border border-secondary rounded d-flex flex-column align-items-center my-3 px-4">
            <h3 class="mt-5 font-weight-bold fs-7">Merci de votre soutien !</h3>
            <div class="w-75 mt-5">
                <div class="w-100 h-16px bg-white rounded overflow-hidden">
                    <div class="h-100 rounded bg-secondary" style="width: <?= $results[1]->meta_value ?>%"></div>
                </div>
                <div class="d-flex justify-content-between mt-2">
                    <p class="fs-4"><?= $results[0]->meta_value ?> €</p>
                    <p class="fs-4"><?= $results[1]->meta_value ?> %</p>
                </div>
            </div>
            <div class="d-flex flex-row w-75 mt-4 d-flex justify-content-between">
                <div class="d-flex align-items-center flex-column">
                    <p class="mb-0 font-weight-bold fs-4 ff-ssp"><?= $results[2]->meta_value ?></p>
                    <p class="fs-2">Investissements</p>
                </div>
                <div class="d-flex align-items-center flex-column">
                    <p class="mb-0 font-weight-bold fs-4 ff-ssp"><?= $amount ?> €</p>
                    <p class="fs-2">Objectif</p>
                </div>
                <div class="d-flex align-items-center flex-column">
                    <p class="mb-0 font-weight-bold fs-4 ff-ssp"><?= $end_date ?> jours</p>
                    <p class="fs-2">Restants</p>
                </div>
            </div>
            <div class="btn btn-secondary w-75 mb-5 mt-4 py-2">
                <a href="<?= $results[0]->guid ?>" class="text-uppercase my-1 font-weight-bold btn-invest fs-7 ff-ssp">Investir</a>
            </div>
        </div>
    </div>
</header>
<section class="container-fluid d-flex flex-column justify-content-center w-fit mx-auto" id="investissement">
    <div class="d-flex justify-content-center flex-column align-items-center mt-6">
        <p class="fs-7 font-weight-bold text-center">Multipliez par <span class="color-secondary fs-10">3</span> votre
            investissement initial</p>
        <p class="ff-ssp fs-6">Simulez votre investissement</p>
        <from class="w-75">
            <label for="amount" class="ff-roboto">Montant investit :</label>
            <div class="d-flex position-relative mb-3">
                <input id="amount" class="w-100 border-primary rounded pl-1 py-2" type="text" name="amount"
                       placeholder="0" oninput="calculInvest()">
                <span class="position-absolute p-right mt-2">€</span>
            </div>
            <span id="errorMessage" class="hiden mb-1 text-danger">Veuillez entrez un chiffre valable</span>
        </from>
        <div class="w-75">
            <a href="<?= $data['contrat'] ?>" target="_blank" class="btn btn-outline-primary w-100">CONTRAT INVESTISSEUR
                (PDF)</a>
        </div>
    </div>
    <div class="ff-ssp w-75 mx-auto mb-6 mt-4">
        <p>Je recevrais tous les trimestres :</p>
        <p><span class="fs-5 color-secondary font-weight-bold">0%</span> du chiffre d’affaires pendant 5 ans </p>
        <p>Total sur 5 ans de : <span id="totalAmount" class="fs-5 color-secondary font-weight-bold">0€</span></p>
        <canvas id="myChart" width="400" height="200"></canvas>
    </div>
</section>
<section id="projet" class="container-fluid bg-primary py-6">
    <div class="mt-5 container bg-white rounded mx-auto px-2 px-sm-5 py-3">
        <h2 class="text-center fs-10">Présentation</h2>
        <section class="bg-gradient-secondary rounded overflow-hidden">
            <h2 class="text-center col-12 col-lg-7 mx-sm-auto font-weight-bold py-6 text-white fs-md-8 fs-5"><?= $fileds['titre_part1'] ?></h2>
            <div class="d-flex align-items-center justify-content-around mb-5 mb-lg-8 flex-lg-row flex-column">
                <?php displayImg($fileds['image_part1']['image_presentation'], $fileds['image_part1']['image_presentation_mobile'], $fileds['image_part1']['cacher_image_part1']); ?>
                <div class="d-flex flex-column col-lg-4 col-md-5 col-sm-7 col-11 pr-4 mt-5 mt-lg-0">
                    <?php
                    for ($i = 0; $i < count($fileds['liste_point_important']); $i++) {
                        ?>
                        <div class="d-flex align-items-center pb-4">
                            <?php displayImg($fileds['liste_point_important'][$i]['img_point_important']); ?>
                            <p class="mb-0 ml-4 font-weight-medium text-center text-white fs-5"><?= $fileds['liste_point_important'][$i]['text_point_important'] ?></p>
                        </div>
                        <?php
                    }

                    ?>
                </div>
            </div>
        </section>
        <section class="bg-gradient-primary rounded mt-5">
            <h2 class="text-center col-md-8 col-10 mx-auto font-weight-bold py-6 text-white fs-md-8 fs-5"><?= $fileds['titre_part2'] ?></h2>
            <div class="d-flex justify-content-between align-items-center">
                <div class="col-5 col-md-7 p-0">
                <?php displayImg($fileds['element_explication']['image_explication'], $fileds['element_explication']['image_explication_mobile'], $fileds['element_explication']['cacher_image_part2_1']); ?>
                </div>
                <div class="w-50 fs-md-5 fs-3 text-white font-weight-medium pr-md-6 pr-3 text-right"><?= $fileds['element_explication']['text_eplication'] ?></div>
            </div>
            <div class="mx-auto w-fit"><?php displayImg($fileds['image_explication_groupe']['image_explication_part2'], $fileds['image_explication_groupe']['image_explication_part2_mobile'], $fileds['image_explication_groupe']['cacher_image_part2_2']); ?></div>
            <div class="w-75 font-weight-medium fs-md-5 fs-4 text-white text-center mx-auto mt-6 pb-5"><?= $fileds['texte_explication_2'] ?></div>
        </section>
        <section>
            <h2 class="text-center col-7 mx-auto font-weight-bold pt-5 pb-3 fs-md-8 fs-5"><?= $fileds['titre_part3'] ?></h2>
            <div class="rounded-gif col-md-9 mx-auto">
                <?php displayImg($fileds['image_explication']['image_explication'], $fileds['image_explication']['image_explication_mobile'], $fileds['image_explication']['cacher_image_part3']); ?>
            </div>
            <div class="w-75 fs-5 mx-auto text-center mt-3"><?= $fileds['texte_part3'] ?></div>
        </section>
        <section class="bg-gradient-primary rounded mt-5">
            <h2 class="text-center col-lg-7 col-12 mx-auto font-weight-bold py-6 text-white fs-md-8 fs-5"><?= $fileds['titre_part4'] ?></h2>
            <div class="text-center col-lg-7 col-12 mx-auto font-weight-medium text-white fs-5"><?= $fileds['texte_part4'] ?></div>
            <div class="d-flex flex-row col-11 mx-auto justify-content-center">
                <div class="mx-auto w-fit">
                    <?php displayImg($fileds['comment_fonctionne']['img_fonctionnement'], $fileds['comment_fonctionne']['img_fonctionnement_mobile'], $fileds['comment_fonctionne']['cacher_image_part4']); ?>
                </div>
                <div class="col-lg-7 col-md-11 col-12 d-flex flex-column justify-content-evenly">
                    <?php
                    for ($i = 0; $i < count($fileds['comment_fonctionne']['liste_etape']); $i++) {
                        ?>
                        <div class="d-flex align-items-center text-white flex-wrap justify-content-sm-start justify-content-center flex-sm-row flex-column mb-lg-0 mb-3">
                            <div class="circle mr-3">
                                <p class="fs-md-8 fs-4 font-weight-bold mb-0"><?= $i + 1 ?></p>
                            </div>
                            <p class="fs-md-4 fs-3 mb-0 font-weight-medium text-center"><?= $fileds['comment_fonctionne']['liste_etape'][$i]['description_etape'] ?></p>
                        </div>
                        <?php
                    }

                    ?>
                </div>
            </div>
            <div class="w-75 fs-5 font-weight-medium text-center text-white mx-auto mt-4 pb-5"><?= $fileds['texte_part4_2'] ?></div>
        </section>
        <section class="bg-gradient-primary rounded mt-5">
            <h2 class="text-center col-md-7 col-10 mx-auto font-weight-bold py-6 text-white fs-md-8 fs-5"><?= $fileds['titre_part5'] ?></h2>
            <div class="mx-auto w-fit mb-6">
                <?php displayImg($fileds['image_part5']['image_comparaison'], $fileds['image_part5']['image_comparaison_mobile'], $fileds['image_part5']['cacher_image_part5']); ?>
            </div>
            <div class="d-flex flex-row justify-content-between col-11 mx-auto pb-4">
                <div class="text-white col-5">
                    <h4 class="fs-md-5 fs-4 font-weight-medium mb-5 text-center"><?= $fileds['moin_comparaison']['nom_moin'] ?></h4>
                    <?php
                    for ($i = 0; $i < count($fileds['moin_comparaison']['liste_moin']); $i++) {
                        ?>
                        <div class="d-flex align-items-center mb-4 flex-md-row flex-column">
                            <?php displayImg($fileds['moin_comparaison']['icon_moin']); ?>
                            <p class="mb-0 ml-md-3 fs-4 font-weight-light text-md-left text-center"><?= $fileds['moin_comparaison']['liste_moin'][$i]['moin_element'] ?></p>
                        </div>
                        <?php
                    }

                    ?>
                </div>
                <div class="text-white col-5">
                    <h4 class="fs-md-5 fs4 font-weight-medium mb-5 text-center"><?= $fileds['meilleur_comparaison']['nom_mieux'] ?></h4>
                    <?php
                    for ($i = 0; $i < count($fileds['meilleur_comparaison']['liste_mieux']); $i++) {
                        ?>
                        <div class="d-flex align-items-center flex-md-row-reverse mb-4 flex-column">
                            <?php displayImg($fileds['meilleur_comparaison']['icon_mieux']); ?>
                            <p class="mr-md-3 mb-0 fs-4 font-weight-light text-md-right text-center"><?= $fileds['meilleur_comparaison']['liste_mieux'][$i]['mieux_element'] ?></p>
                        </div>
                        <?php
                    }

                    ?>
                </div>
            </div>
            <?php
            for ($i = 0; $i < count($fileds['egale_comparaison']['liste_egale']); $i++) {
                ?>
                <div class="d-flex align-items-center flex-row pb-4 w-fit mx-auto text-white">
                    <?php displayImg($fileds['egale_comparaison']['icon_egale']); ?>
                    <p class="mx-3 mb-0 fs-4 font-weight-light text-center"><?= $fileds['egale_comparaison']['liste_egale'][$i]['egale_element'] ?></p>
                    <?php displayImg($fileds['egale_comparaison']['icon_egale']); ?>
                </div>
                <?php
            }

            ?>
        </section>
        <section>
            <h2 class="col-10 fs-md-8 fs-4 font-weight-bold mx-auto text-center py-6"><?= $fileds['titre_part6'] ?></h2>
            <div class="d-flex align-items-center justify-content-around mb-5">
                <div class="col-md-6 col-7 fs-md-5 fs-3">
                    <div class="mb-4"><?= $fileds['texte_part6'] ?></div>
                </div>
                <div class="col-md-6 col-5 d-flex justify-content-center">
                    <?php displayImg($fileds['image_part6']['image_part6_web'], $fileds['image_part6']['image_part6_mobile'], $fileds['image_part6']['cacher_image_part6']); ?>
                </div>
            </div>
        </section>
        <section class="rounded bg-gradient-mixed-primary-secondary mb-5">
            <h2 class="col-10 fs-md-8 fs-5 font-weight-bold mx-auto text-center py-6 text-white"><?= $fileds['titre_part7'] ?></h2>
            <div class="d-flex col-11 align-items-center justify-content-around pb-5 mx-auto">
                <?php displayImg($fileds['image_part7']['image_part7_web'], $fileds['image_part7']['image_part7_mobile'], $fileds['image_part7']['cacher_image_part7']); ?>
                <div class="text-white col-lg-6 col-11 fs-5">
                    <?= $fileds['texte_part7'] ?>
                </div>
            </div>
        </section>
        <section class="rounded bg-gradient-primary mb-5">
            <h2 class="col-10 fs-md-8 fs-5 font-weight-bold mx-auto text-center py-6 text-white"><?= $fileds['titre_part8'] ?></h2>
            <div class="d-flex flex-column align-content-between col-12 mx-auto pb-5">
                <span class="bg-line"></span>
                <?php
                for ($i = 0; $i < count($fileds['list_future']); $i++) {
                    ?>
                    <div class="fs-md-5 fs-3 text-white font-weight-light d-flex justify-content-center align-items-center mb-sm-5 mb-3">
                        <p class="col-4 px-0 text-center"><?= $fileds['list_future'][$i]['date_suite'] ?></p>
                        <div class="circle-icon">
                            <?php displayImg($fileds['list_future'][$i]['icon_illustration_future']); ?>
                        </div>
                        <p class="col-4 px-0 text-center"><?= $fileds['list_future'][$i]['nom_suite'] ?></p>
                    </div>
                    <?php
                }

                ?>
            </div>
        </section>
        <section class="bg-gradient-primary mb-5 rounded">
            <h2 class="col-10 fs-md-8 fs-5 font-weight-bold mx-auto text-center pt-4 pb-2 text-white"><?= $fileds['titre_part9'] ?></h2>
            <div class="mx-auto w-fit">
                <?php displayImg($fileds['image_part9']['image_part9_web'], $fileds['image_part9']['image_part9_mobile']); ?>
            </div>

        </section>
    </div>
</section>
<section class="d-flex container-fluid bg-primary" id="faq">
    <div class="my-6 bg-white rounded container">
        <p class="ff-ssp fs-6 mt-4">FAQ</p>
        <?php
        show_post('faq');
        function show_post($path)
        {
            $post = get_page_by_path($path);
            $content = apply_filters('the_content', $post->post_content);
            echo $content;
        }

        ?>
    </div>
</section>
<section class="container-fluid d-flex flex-column justify-content-center bg-primary" id="commentaire">
    <div class="mt-6 bg-white rounded d-flex flex-column container">
        <div class="w-75 mx-auto mt-5">
            <p class="ff-ssp fs-6">Écrivez un commentaire</p>
            <form action="" method="POST" class="d-flex flex-column">
                <input type="text" name="pseudo" placeholder="Pseudo"
                       class="w-100 border-primary rounded pl-1 py-2 mb-3">
                <textarea name="comment" placeholder="Votre commentaire"
                          class="w-100 border-primary rounded pl-1 py-2 mb-4"></textarea>
                <input type="submit" value="Publier"
                       class="btn btn-primary text-white px-4 py-2 rounded font-weight-medium mb-5 w-fit">
            </form>


        </div>
        <div class="w-75 mx-auto">
            <!-- commentraire -->

            <?php
            $args = array(
                'parent' => 0
            );
            $com = get_comments($args);
            foreach ($com as $comment) :
                $comDate = $comment->comment_date;
                $comDate = date_create($comDate);
                $comDate = date_diff($comDate, $date);
                $id = $comment->comment_ID;
                $argsChild = array(
                    'parent' => $id
                );
                $replys = get_comments($argsChild);
                if (count($replys) > 0) {
                    foreach ($replys as $reply) :

                        $replyDate = $comment->comment_date;
                        $replyDate = date_create($replyDate);
                        $replyDate = date_diff($replyDate, $date);

                    endforeach;
                }

                ?>

                <div class="d-flex flex-column border-top pt-3">
                    <div class="d-flex">
                        <div class="bg-secondary rounded-circle h-24px w-24px mr-1"></div>
                        <div class="w-90 ff-ssp">
                            <p class="font-weight-medium mb-2"><?= $comment->comment_author ?></p>
                            <p class="fs-2"><?= $comment->comment_content ?></p>
                            <p class="fs-2 text-black-50 mb-3"><?= $comDate->days ?> jours</p>
                        </div>
                    </div>
                    <?php if (count($replys) > 0) { ?>
                        <div class="ml-5 d-flex">
                            <div class="bg-secondary rounded-circle h-24px w-24px mr-1"></div>
                            <div class="w-90 ff-ssp">
                                <p class="font-weight-medium mb-2"><?= $reply->comment_author ?></p>
                                <p class="fs-2"><?= $reply->comment_content ?></p>
                                <p class="fs-2 text-black-50 mb-3"><?= $replyDate->days ?> jours</p>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            <?php
            endforeach;
            ?>
        </div>
    </div>
</section>
<?php
get_footer();