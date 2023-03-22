<?php
require_once('./connect.php');

function login($email, $password)
{
    //echo $_SESSION['user_id']; 
    if (isset($email) || isset($password)) {
        echo ($email . $password);
        $db = new Database();
        $db_conn = $db->connect();

        $sql = 'SELECT id, email, passwd 
      FROM utente
      WHERE 1=1;';

        $result = $db_conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            if ($row['email'] == $email && $row['passwd'] == $password) {
                return $row['id'];
            } else {
                return -1;
            }
        }

    }
}

function info($id_user)
{
    if (isset($id_user)) {
        $db = new Database();
        $db_conn = $db->connect();

        $sql = "SELECT email 
                FROM utente
                WHERE id='" . $id_user . "';";

        $result = $db_conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            return $row['email'];
        }

    }
}

function checkAdmin($id_user)
{
    if (isset($id_user)) {
        $db = new Database();
        $db_conn = $db->connect();

        $sql = "SELECT u.id 
                FROM utente u
                INNER JOIN ruolo r ON r.id = u.ruolo
                WHERE u.id='" . $id_user . "';";

        $result = $db_conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            if ($row['id'] == $id_user) {
                return true;
            } else {
                return false;
            }
        }
    }
}

function getUnitàDidattica()
{
    $db = new Database();
    $db_conn = $db->connect();

    $sql = "SELECT DISTINCT pds.codice, pds.nome, pds.CFU, IF(pds.ore_lezione IS NOT NULL, pds.ore_lezione, 0) AS lezione, IF(pds.ore_laboratorio IS NOT NULL, pds.ore_laboratorio, 0) AS laboratorio, IF(pds.ore_tirocinio IS NOT NULL, pds.ore_tirocinio, 0) AS tirocinio
    FROM piano_di_studi pds
    WHERE pds.codice NOT IN (SELECT fd.didattica
                        FROM formativa_didattica fd);";

    $result = $db_conn->query($sql);

    if (mysqli_num_rows($result) > 0) {
        $pianos_arr = array();
        while ($row = $result->fetch_assoc()) {
            extract($row);
            $piano_arr = array(
                'codice' => $codice,
                'nome' => $nome,
                'CFU' => $CFU,
                'ore_lezione' => $lezione,
                'ore_laboratorio' => $laboratorio,
                'ore_tirocinio' => $tirocinio,
            );
            array_push($pianos_arr, $piano_arr);
        }
        return $pianos_arr;
    }
}

function getUser()
{
    $db = new Database();
    $db_conn = $db->connect();

    $sql = "SELECT u.id, u.email, r.descr
            FROM utente u
            INNER JOIN ruolo r ON r.id = u.ruolo
            WHERE 1=1;";

    $result = $db_conn->query($sql);

    if (mysqli_num_rows($result) > 0) {
        $users_arr = array();
        while ($row = $result->fetch_assoc()) {
            extract($row);
            $user_arr = array(
                'id' => $id,
                'email' => $email,
                'ruolo' => $descr,
            );
            array_push($users_arr, $user_arr);
        }
        return $users_arr;
    }
}

function addUser($email, $password, $ruolo)
{
    $db = new Database();
    $db_conn = $db->connect();

    $sql = "INSERT INTO utente(email, passwd, ruolo)
    VALUES ('" . $email . "', '" . $password . "', '" . $ruolo . "');";

    $result = $db_conn->query($sql);

    if ($result != false) {
        return true;
    } else {
        return false;
    }
}

?>