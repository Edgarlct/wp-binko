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
<nav class="navbar navbar-expand-md navbar-light bg-light">
    <div class="container-xl">
        <a class="navbar-brand" href="#">
            <img src="" alt="logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item mr-4">
                    <a class="nav-link active" aria-current="page" href="#">Projet</a>
                </li>
                <li class="nav-item mx-4">
                    <a class="nav-link" href="#">Investissement</a>
                </li>
                <li class="nav-item mx-4">
                    <a class="nav-link" href="#">Actualités</a>
                </li>
                <li class="nav-item mx-4">
                    <a class="nav-link">Commentaires</a>
                </li>
                <li class="nav-item ml-4">
                    <a class="nav-link btn btn-info text-uppercase px-4 py-2 rounded">Investir</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="bg-secondary px-3">
    <div class="container-xl d-flex justify-content-between align-items-center text-white">
        <div class="col-7 px-0 bg-secondary">
            <h1 class="font-weight-bold mt-0 test">Binko, la poubelle intelligente</h1>
            <p>La poubelle qui changera votre vie</p>
            <iframe width="560" height="315" src="https://www.youtube.com/embed/k5IyKIN10yU"
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
        </div>
        <div class="col-4 border border-info rounded d-flex flex-column align-items-center my-3">
            <h3 class="mt-5 font-weight-bold">Merci de votre soutien</h3>
            <a href="" class="btn btn-outline-info text-white my-4">Partager</a>
            <div class="w-75">
                <div class="w-100 h-16px bg-white rounded">
                    <div class="w-25 h-100 rounded bg-info"></div>
                </div>
                <div class="d-flex justify-content-between">
                    <p class="">8 500 €</p>
                    <p class="">25%</p>
                </div>
            </div>
            <div class="d-flex flex-row w-75 mt-5 d-flex justify-content-between">
                <div class="d-flex align-items-center flex-column">
                    <p class="mb-0 font-weight-bold">36</p>
                    <p>Investiseur</p>
                </div>
                <div class="d-flex align-items-center flex-column">
                    <p class="mb-0 font-weight-bold">37 000 €</p>
                    <p>Objectif</p>
                </div>
                <div class="d-flex align-items-center flex-column">
                    <p class="mb-0 font-weight-bold">36 jours</p>
                    <p>Restants</p>
                </div>
            </div>
            <div class="btn btn-info w-75 mb-5">
                <h3 class="text-uppercase my-1 font-weight-bold fs">Investir</h3>
            </div>
        </div>
    </div>
</div>
</body>
</html>