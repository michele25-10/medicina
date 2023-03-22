<?php
session_start();

include_once dirname(__FILE__) . '\api.php';

$array = getUnitàDidattica();

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
        <h2>Unità didattiche:</h2>
    </div>

    <div class="container mb-5" style="max-height:100%; overflow:scroll;">
        <table class="table" style="margin-left: auto;
  margin-right: auto; text-align:center;">
            <thead>
                <tr>
                    <th scope="col">Codice</th>
                    <th scope="col">Nome</th>
                    <th scope="col">CFU</th>
                    <th scope="col">Ore lezione</th>
                    <th scope="col">Ore laboratorio</th>
                    <th scope="col">Ore tirocinio</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($array as $row): ?>
                    <tr>
                        <td>
                            <?php echo $row['codice'] ?>
                        </td>
                        <td>
                            <?php echo $row['nome'] ?>
                        </td>
                        <td>
                            <?php echo $row['CFU'] ?>
                        </td>
                        <td>
                            <?php echo $row['ore_lezione'] ?>
                        </td>
                        <td>
                            <?php echo $row['ore_laboratorio'] ?>
                        </td>
                        <td>
                            <?php echo $row['ore_tirocinio'] ?>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
            crossorigin="anonymous"></script>
</body>

</html>