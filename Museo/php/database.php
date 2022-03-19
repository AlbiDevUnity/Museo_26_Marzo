<?php

    include 'extensions.php';

    function Get($query, $host, $dbname, $username = "root", $password = "")
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
        }
    }

    function Post($query, $host, $dbname, $bindParameters = array(), $username = "root", $password = "")
    {
        try 
        {
            $connection = new PDO('mysql:host=' . $host . ';dbname=' . $dbname, $username, $password);
            $result = $connection->prepare($query);
            
            foreach($bindParameters as $parameter)
            {
                $result->bindParam($parameter, $_POST[$parameter]);
            }

            $result->execute();

            $result = null;
            $connection = null;
        } 
        catch (PDOException $e) 
        {
            console_log(($e->getMessage()));
            die();
        }
    }
