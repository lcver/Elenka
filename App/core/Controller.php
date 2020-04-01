<?php

namespace App\Core;
/**
 * 
 * 
 */
class Controller
{
    public function view($view, $data=[])
    {
        /**
         * 
         * Set Template
         */
        $template = [
            'Template/header',
            'Template/navbar',
            'Template/sidebar',
            'Template/contentHeader',
            $view,
            'Template/contentFooter',
            'Template/footer'
        ];
        $count = count($template);        

        /**
         * 
         * running page
         */
        $i=0;
        while ($i < $count) {
            require_once '../app/views/'.$template[$i].'.php';
            $i++;}
    }

    public function model($model)
    {
        require_once '../app/models/' . $model . '.php';
        return new $model;
    }
}
