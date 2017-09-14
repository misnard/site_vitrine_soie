<?php

    class Autoload
    {

        function __construct()
        {
            spl_autoload_register(array(__CLASS__, 'autoload'));
        }

        static function autoload($class)
        {
            require 'class/' . $class . '.php';
        }
    }

?>