<?php
session_start();
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Università</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>

    <?php require_once(__DIR__ . '\header.php'); ?>

    <div class="container mt-5 mb-3" id="content">
        <h2>Aggiunta utente:</h2>
    </div>

    <div class="container mt-4">
        <form method="post">
            <div class="mb-3">
                <label for="name" class="form-label"><b>Email</b></label>
                <input type="email" class="form-control" placeholder="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label"><b>Password</b></label>
                <input type="password" class="form-control" placeholder="password" name="password" required>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label"><b>Ruolo</b></label>
                <select class="form-select" name="ruolo" aria-label="Default select example">
                    <option selected disabled>Scegli</option>
                    <option value="1">Amministrazione</option>
                    <option value="2">Utente</option>
                </select>
            </div>
            <button class="btn btn-outline-success" type="submit">Invia</button>
        </form>

        <?php
        include_once dirname(__FILE__) . '\api.php';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['ruolo'])) { //se la variabile mail o password che devono essere inviate non sono vuote all'ora si invia
        
                $res = addUser($_POST['email'], $_POST['password'], $_POST['ruolo']);

                if ($res == false) {
                    echo ('<p class=text-danger>Email o password errata</p>');
                } else {
                    echo ('<p class=text-success>Utente inserito con successo</p>');
                }
            }
        }
        ?>

    </div>

    <?php require_once(__DIR__ . '\footer.php'); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
</body>

</html>