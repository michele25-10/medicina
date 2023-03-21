<?php
session_start();

include_once dirname(__FILE__) . '\api.php';

$array = getUser();

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
        <h2>Elenco Utenti:</h2>
    </div>

    <div class="container mt-4" style="max-height:100%;">
        <table class="table" style="margin-left: auto;
  margin-right: auto; text-align:center;">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Email</th>
                    <th scope="col">Tipo</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($array as $row): ?>
                    <tr>
                        <td>
                            <?php echo $row['id'] ?>
                        </td>
                        <td>
                            <?php echo $row['email'] ?>
                        </td>
                        <td>
                            <?php echo $row['ruolo'] ?>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>

        <?php require_once(__DIR__ . '\footer.php'); ?>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
            crossorigin="anonymous"></script>
</body>

</html>