<?php

class Autoloader{

    /**
     * Enregistre notre autoloader
     */
    static function register(){
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

    /**
     * Inclue le fichier correspondant à notre classe
     * @param $class string Le nom de la classe à charger
     */
    static function autoload($class_name){
        $class_name = str_replace("P3\\", "",$class_name);
        $class_name = str_replace("\\", "/",$class_name);

        require($class_name . '.php');
    }

}