<?php

function console_log($output)
    {
        $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . ');';
        $js_code = '<script>' . $js_code . '</script>';
        echo $js_code;
    }

    function generateRandomString($lengthN = 2, $lengthC = 3)
    {
        $numbers = '0123456789';
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        $randomString = '';
        for ($i = 0; $i < $lengthN; $i++)
        {
            $randomString .= $numbers[rand(0, strlen($numbers) - 1)];
        }
        for ($i = 0; $i < $lengthC; $i++)
        {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }

        return $randomString;
    }

    ?>