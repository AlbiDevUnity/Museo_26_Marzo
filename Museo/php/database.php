<?php

    include 'extensions.php';

    class Obj
    {
        public $parameter;
        public $value;

        public function  __construct($parameter, $value) {
            $this->parameter = $parameter;
            $this->value = $value;
          }
    }

    function Get($query, $dbname, $host = "localhost", $username = "root", $password = "")
    {
        try 
        {
            $connection = new PDO('mysql:host=' . $host . ';dbname=' . $dbname, $username, $password);
            $result = $connection->prepare($query);
            $result->execute();

            $array = array();
            foreach ($result as $row)
            {
                array_push($array, $row);
            }

            $result = null;
            $connection = null;

            return $array;
        } 
        catch (PDOException $e) 
        {
            console_log(($e->getMessage()));
            die();
            return null;
        }
    }

    function Post($query, $dbname, $host = "localhost", $username = "root", $password = "", $bindParameters = array())
    {
        try 
        {
            $connection = new PDO('mysql:host=' . $host . ';dbname=' . $dbname, $username, $password);
            $result = $connection->prepare($query);
            
            foreach($bindParameters as $obj)
            {
                $result->bindParam( ":" . $obj->parameter, $obj->value);
            }

            $result->execute();

            $result = null;
            $connection = null;

            return true;
        } 
        catch (PDOException $e) 
        {
            console_log(($e->getMessage()));
            die();
            return false;
        }

        return false;
    }
