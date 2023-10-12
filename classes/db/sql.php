<?php


class sql
{

    // database: rest_api_demo
    // user: rest_api_demo_user
    // password: rest_api_demo_password

    private $host = "localhost";
    private $db_name = "rest_api_demo";
    private $username = "rest_api_demo_user";
    private $password = "rest_api_demo_password";

    private static $conn=null;

    public function __construct()
    {
       $this->connect();
    }

    private function connect()
    {
        try {
            if(self::$conn == null) {
                self::$conn = new \PDO("mysql:host=$this->host;dbname=$this->db_name", $this->username, $this->password);
                self::$conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            }
            return self::$conn;
        } catch (\PDOException $e) {
            echo "Connection error: " . $e->getMessage();
        }
    }


    public function query($sql, $params = null)
    {
        $retval = ["data"=>null,"error"=>null];
        try {
            $stmt = self::$conn->prepare($sql);
            $stmt->execute($params);
            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            $retval["data"] = $result;
        } catch (\PDOException $e) {
            $retval["error"] = $e->getMessage();
        } finally {
            return $retval;
        }
    }


}