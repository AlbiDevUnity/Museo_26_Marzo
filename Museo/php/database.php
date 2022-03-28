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

    function Get($query, $dbname, $host = "localhost", $username = "root", $password = "", $bindParameters = array())
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

    function Post($query, $dbname, $host = "localhost", $username = "root", $password = "", $bindParameters = array(), &$exc = "")
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
            $exc = $e;
            return false;
            die();
        }

        return false;
    }

    function CheckMaxPeople($orario, $nPersone)
    {
        $array = Get('SELECT SUM(nPersone) FROM prenotazioni WHERE YEAR(orario) = YEAR(:orario) AND MONTH(orario) = MONTH(:orario) 
        AND DAY(orario) = DAY(:orario) AND HOUR(orario) = HOUR(:orario)', "museo", bindParameters: array(new Obj("orario", $orario)));
        
        $dates = Get('SELECT orario FROM prenotazioni WHERE YEAR(orario) = YEAR(:orario) AND MONTH(orario) = MONTH(:orario) 
        AND DAY(orario) = DAY(:orario) AND HOUR(orario) = HOUR(:orario)', "museo", bindParameters: array(new Obj("orario", $orario)));

        if(count($array) <= 0 && !in_array($orario, $dates))
        {
            return true;
        }
        else
        {
            
            $sum = intval($array[0][0]);
            $nPersone = intval($nPersone);
            
            if(in_array($orario, $dates))
            {
                return false;
            }
            elseif(($sum + $nPersone) > 50)
            {
                return false;
            }
            else
            {
                return true;
            }
        }

    }
