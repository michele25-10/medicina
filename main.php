<?php
$page = $_GET['page'];

switch ($page) {
    case 0:
        echo "login";
        break;

    case 1:
        echo "attività formativa";
        break;

    case 2:
        echo "unità formativa";
        break;

    case 3:
        echo "edit_unità";
        break;

    default:
        include("content-404.php");
        break;
}
?>