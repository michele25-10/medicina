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

?>