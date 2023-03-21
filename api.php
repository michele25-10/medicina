<?php
function login($email, $password)
{
    require_once('./connect.php');
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

?>