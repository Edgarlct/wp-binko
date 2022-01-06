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
$date = date_create();
$paiment = get_page_by_path('paiment');
$end_date = get_field('date_fin', $paiment->ID);
$end_date = date_create($end_date);
$end_date = date_diff($date, $end_date);
$end_date = $end_date->format('%d');
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
                <a href="<?= get_permalink( get_page_by_path( 'paiment' ) ) ?>" class="text-uppercase my-1 font-weight-bold btn-invest fs-7 ff-ssp">Investir</a>
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
<section id="projet" class="wrapper container-fluid bg-primary">
    <div class="mt-5 container bg-white rounded mx-auto px-5 py-3">
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
                <h4 class="fs-5 font-weight-medium mb-5 text-center">Poubelle classique</h4>
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
                <h4 class="fs-5 font-weight-medium mb-5 text-center">La solution Binko</h4>
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
    <section class="rounded bg-gradient-primary mb-5">
        <h2 class="col-10 fs-8 font-weight-bold mx-auto text-center py-6 text-white">Et ensuite ?</h2>
        <div class="d-flex flex-column align-content-between col-11 mx-auto pb-5">
            <span class="bg-line"></span>
            <div class="fs-5 text-white font-weight-light d-flex justify-content-center align-items-center mb-5">
                <p class="col-4 text-center">Novembre 2021</p>
                <div class="circle-icon">
                    <img src="https://localhost/wordpress/wp-content/uploads/2022/01/piggy-bank-1-1.png"
                         alt="" class="mx-auto d-block">
                </div>
                <p class="col-4 text-center">Crowdfounding</p>
            </div>
            <div class="fs-5 text-white font-weight-light d-flex justify-content-center align-items-center mb-5">
                <p class="col-4 text-center">janvier 2022</p>
                <div class="circle-icon">
                    <img src="https://localhost/wordpress/wp-content/uploads/2022/01/production-1.png"
                         alt="" class="mx-auto d-block">
                </div>
                <p class="col-4 text-center">Pré-industrilsation Bureau d’étude</p>
            </div>
            <div class="fs-5 text-white font-weight-light d-flex justify-content-center align-items-center mb-5">
                <p class="col-4 text-center">Mai 2022</p>
                <div class="circle-icon">
                    <img src="https://localhost/wordpress/wp-content/uploads/2022/01/search-1.png"
                         alt="" class="mx-auto d-block">
                </div>
                <p class="col-4 text-center">Phase de test (6 mois) Yvelines</p>
            </div>
            <div class="fs-5 text-white font-weight-light d-flex justify-content-center align-items-center">
                <p class="col-4 text-center">Octobre 2022</p>
                <div class="circle-icon">
                    <img src="https://localhost/wordpress/wp-content/uploads/2022/01/flag-1.png"
                         alt="" class="mx-auto d-block">
                </div>
                <p class="col-4 text-center">Première commune cliente</p>
            </div>
        </div>
    </section>
    <section class="bg-gradient-primary mb-5 rounded">
        <h2 class="col-10 fs-8 font-weight-bold mx-auto text-center pt-4 pb-2 text-white">Ils nous soutiennent déjà</h2>
        <img src="https://localhost/wordpress/wp-content/uploads/2022/01/cfzefzerfzef-1.png" alt="" class="d-block mx-auto">
    </section>
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
<?php
get_footer();