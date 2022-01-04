<?php
global $wpdb;
$results = $wpdb->get_results("SELECT meta_key, meta_value FROM {$wpdb->prefix}give_formmeta f 
    JOIN {$wpdb->prefix}posts p  on f.form_id = p.ID 
WHERE (meta_key IN ('_give_set_goal', '_give_form_goal_progress', '_give_form_earnings', '_give_form_sales') 
           AND p.post_name = 'donation-form' AND p.post_title LIKE '%validate%')", OBJECT);

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
    wp_redirect('http://localhost/wordpress/');
    exit;
}

defined('ABSPATH') || exit;

get_header();

?>
    <body>
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
                    <p class="fs-2">Investiseur</p>
                </div>
                <div class="d-flex align-items-center flex-column">
                    <p class="mb-0 font-weight-bold fs-4 ff-ssp"><?= $amount ?> €</p>
                    <p class="fs-2">Objectif</p>
                </div>
                <div class="d-flex align-items-center flex-column">
                    <p class="mb-0 font-weight-bold fs-4 ff-ssp">36 jours</p>
                    <p class="fs-2">Restants</p>
                </div>
            </div>
            <div class="btn btn-secondary w-75 mb-5 mt-4 py-2">
                <a class="text-uppercase my-1 font-weight-bold btn-invest fs-7 ff-ssp">Investir</a>
            </div>
        </div>
    </div>
</header>
<section class="container-fluid d-flex flex-column justify-content-center w-fit mx-auto" id="investissement">
    <div class="d-flex justify-content-center flex-column align-items-center mt-6">
        <p class="fs-7 font-weight-bold">Multipliez par <span class="color-secondary fs-10">3</span> votre
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
            <a href="#" class="btn btn-outline-primary w-100">CONTRAT INVESTISSEUR (PDF)</a>
        </div>
    </div>
    <div class="ff-ssp w-75 mx-auto mb-6 mt-4">
        <p>Je recevrais tous les trimestres :</p>
        <p><span class="fs-5 color-secondary font-weight-bold">0%</span> du chiffre d’affaires pendant 5 ans </p>
        <p>Total sur 5 ans de : <span id="totalAmount" class="fs-5 color-secondary font-weight-bold">0€</span></p>
        <canvas id="myChart" width="400" height="200"></canvas>
    </div>
</section>
<section class="container-fluid d-flex flex-column justify-content-center bg-primary" id="commentaire">
    <div class="mt-6 bg-white rounded d-flex flex-column col-sm-6 mx-sm-auto">
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
            $date = date_create();
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
                            <p class="fs-2 text-black-50 mb-3"><?= $comDate->format('%d') ?> jours</p>
                        </div>
                    </div>
                    <?php if (count($replys) > 0) { ?>
                        <div class="ml-5 d-flex">
                            <div class="bg-secondary rounded-circle h-24px w-24px mr-1"></div>
                            <div class="w-90 ff-ssp">
                                <p class="font-weight-medium mb-2"><?= $reply->comment_author ?></p>
                                <p class="fs-2"><?= $reply->comment_content ?></p>
                                <p class="fs-2 text-black-50 mb-3"><?= $replyDate->format('%d') ?> jours</p>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            <?php
            endforeach;
            ?>
        </div>
        <a href="" class="btn btn-primary text-white px-4 py-2 rounded font-weight-medium my-5 w-fit mx-auto">Voir plus</a>
    </div>
</section>
<section class="d-flex container-fluid bg-primary" id="faq">
    <div class="my-6 bg-white rounded col-sm-6 mx-sm-auto">
        <p class="ff-ssp fs-6 mt-4">Écrivez un commentaire</p>
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
<div>
    <?php show_post('stripe'); ?>
</div>

<?php
get_footer();