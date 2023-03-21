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
    <form class="form-signin" method="post">
        <div class="row">
            <div class="col-7 mx-auto">
                <img class="mb-4" src="logo.png" alt="logo" width=" 100%" height="">
            </div>
        </div>
        <h1 class="h3 mb-3 fw-bold">Inserisci le credenziali</h1>
        <label for="inputEmail" class="sr-only mb-2">Indirizzo Email</label>
        <input type="email" id="inputEmail" class="form-control mb-4" placeholder="Indirizzo Email" name="email"
            required autofocus>
        <label for="inputPassword" class="sr-only mb-2">Password</label>
        <input type="password" id="inputPassword" class="form-control mb-4" placeholder="Password" name="password"
            required>
        <div class="row">
            <button class="btn btn-lg btn-primary btn-block mx-auto" type="submit">Accedi</button>
        </div>

    </form>

    <?php
    session_start();

    include_once dirname(__FILE__) . '\api.php';


    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (!empty($_POST['email']) && !empty($_POST['password'])) { //se la variabile mail o password che devono essere inviate non sono vuote all'ora si invia
    
            $res = login($_POST['email'], $_POST['password']);

            if ($res == -1) {
                echo ('<p class=text-danger>Email o password errata</p>');
            } else {
                $_SESSION['user_id'] = $res;
                header('Location: homepage.php');
            }
        }
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
</body>

</html>