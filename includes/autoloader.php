<?php

spl_autoload_register(function ($class_name) {
    //class directories

    $source = $_SERVER['DOCUMENT_ROOT'];
    $dirs = [
        $source.'/classes/',
        $source.'/classes/db/',
        $source.'/classes/helpers/',
        $source.'/classes/objects/',
        $source.'/classes/objects/models/',
        $source.'/classes/objects/viewmodels/',
        $source.'/classes/objects/controllers/'

    ];
    foreach($dirs as $directory)
    {

        //see if the file exsists
        if(file_exists($directory.$class_name . '.php'))
        {
            //echo $directory.$class_name . '.php<br>';
            require($directory.$class_name . '.php');
        }
    }
});