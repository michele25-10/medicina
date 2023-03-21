<?php
//finito
class Database
{
    public $conn;

    public function connect()
    {
        try {
            $this->conn = new mysqli("localhost", "root", "", "medicina", "3306");
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
            die();
        }
        return $this->conn;
    }

}

?>