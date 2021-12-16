<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php wp_head(); ?>
    <title>Document</title>
</head>
<body>
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
<div class="bg-primary px-3 py-6">
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
</div>
</body>
</html>