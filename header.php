<?php

include_once dirname(__FILE__) . '\api.php';

$check = checkAdmin($_SESSION['user_id']);

?>
<nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="homepage.php  ">Università</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="homepage.php">homepage</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Utenti
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="getUser.php">Visualizza utenti</a></li>
                        <?php if ($check == true): ?>
                            <li><a class="dropdown-item" href="#">Aggiungi utente</a></li>
                        <?php endif ?>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Piano di studi
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="getUnitàDidattica.php">Visualizza piano di studi</a></li>
                        <?php if ($check == true): ?>
                            <li><a class="dropdown-item" href="#">Aggiungi piano di studi</a></li>
                        <?php endif ?>

                    </ul>
                </li>
            </ul>
            <form class="d-flex" role="search">
                <a href="logout.php">
                    <button class="btn btn-outline-danger" type="button">Exit</button>
                </a>
            </form>
        </div>
    </div>
</nav>