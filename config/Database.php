<?php
/**
 * Created by PhpStorm.
 * User: ahmedsalim
 * Date: 20/11/18
 * Time: 01:01 م
 */

class Database
{
    private $host = 'localhost';
    private $db_name  = 'api_php';
    private $username = 'ahmed';
    private $password = '';


    private $conn;


    public function connect()
    {
        $this->conn = null;

        try{
            $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name,
                $this->username,$this->password);

            $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }catch (PDOException $e){
            echo 'Connection Error' . $e->getMessage();
        }

        return $this->conn;
    }


}