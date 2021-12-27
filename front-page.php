<!--<!doctype html>-->
<!--<html lang="en">-->
<!--<head>-->
<!--    <meta charset="UTF-8">-->
<!--    <meta name="viewport"-->
<!--          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">-->
<!--    <meta http-equiv="X-UA-Compatible" content="ie=edge">-->
<!--    --><?php //wp_head(); ?>
<!--    <title>Document</title>-->
<!--</head>-->
<?php
defined( 'ABSPATH' ) || exit;

get_header(); ?>
<body>
<header class="bg-primary px-3 py-6">
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
                <div class="w-100 h-16px bg-white rounded">
                    <div class="w-25 h-100 rounded bg-secondary"></div>
                </div>
                <div class="d-flex justify-content-between mt-2">
                    <p class="fs-4">8 500 €</p>
                    <p class="fs-4">25%</p>
                </div>
            </div>
            <div class="d-flex flex-row w-75 mt-4 d-flex justify-content-between">
                <div class="d-flex align-items-center flex-column">
                    <p class="mb-0 font-weight-bold fs-4 ff-ssp">36</p>
                    <p class="fs-2">Investiseur</p>
                </div>
                <div class="d-flex align-items-center flex-column">
                    <p class="mb-0 font-weight-bold fs-4 ff-ssp">37 000 €</p>
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
<section class="d-flex flex-column justify-content-center w-fit mx-auto">
    <div class="d-flex justify-content-center flex-column align-items-center mt-6">
        <p class="fs-7 font-weight-bold">Multipliez par <span class="color-secondary fs-10">3</span> votre investissement initial</p>
        <p class="ff-ssp fs-6">Simulez votre investissement</p>
        <from class="w-75">
            <label for="amount" class="ff-roboto">Montant investit :</label>
            <div class="d-flex position-relative mb-3">
                <input class="w-100 border-primary rounded pl-1 py-2" type="text" name="amount" placeholder="0">
                <span class="position-absolute p-right mt-2">€</span>
            </div>
            <input class="w-100 btn btn-primary" type="submit" value="CALCULER">
        </from>
        <div class="w-75 mt-3">
            <a href="#" class="btn btn-outline-primary w-100">CONTRAT INVESTISSEUR (PDF)</a>
        </div>
    </div>
    <div class="ff-ssp w-75 mx-auto my-6">
        <p>Je recevrais tous les trimestres :</p>
        <p><span class="fs-5 color-secondary font-weight-bold">0%</span> du chiffre d’affaires pendant 5 ans </p>
        <p>Total sur 5 ans de : <span class="fs-5 color-secondary font-weight-bold">0€</span></p>
        <div class="graph bg-secondary">
            <p>Graph</p>
        </div>
    </div>
</section>
<section class="d-flex flex-column justify-content-center bg-primary">
    <div class="mx-auto mt-6 bg-white rounded d-flex flex-column">
        <div class="w-75 mx-auto mt-5">
            <p class="ff-ssp fs-6">Écrivez un commentaire</p>
            <form action="" class="d-flex flex-column">
                <input type="text" placeholder="Pseudo" class="w-100 border-primary rounded pl-1 py-2 mb-3">
                <textarea placeholder="Votre commentaire" class="w-100 border-primary rounded pl-1 py-2 mb-4"></textarea>
                <input type="submit" value="Publier" class="btn btn-primary text-white px-4 py-2 rounded font-weight-medium mb-5 w-fit">
            </form>
        </div>
        <div class="w-75 mx-auto">
<!--            commentraire -->
            <div class="d-flex border-top pt-3">
                <div class="bg-secondary rounded-circle h-24px w-24px mr-1"></div>
                <div class="w-90 ff-ssp">
                    <p class="font-weight-medium mb-2">Jean_michel</p>
                    <p class="fs-2">LE LOREM Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis, possimus?</p>
                    <p class="fs-2 text-black-50 mb-3">6 jours</p>
                </div>
            </div>
            <div class="d-flex border-top pt-3">
                <div class="bg-secondary rounded-circle h-24px w-24px mr-1"></div>
                <div class="w-90 ff-ssp">
                    <p class="font-weight-medium mb-2">Jean_michel</p>
                    <p class="fs-2">LE LOREM Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis, possimus?</p>
                    <p class="fs-2 text-black-50 mb-3">6 jours</p>
                </div>
            </div>
        </div>
        <a href="" class="btn btn-primary text-white px-4 py-2 rounded font-weight-medium my-5 w-fit mx-auto">Voir plus</a>
    </div>
</section>



<?php
get_footer();