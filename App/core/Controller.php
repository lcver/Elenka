<?php

namespace App\Core;
/**
 * 
 * 
 */
class Controller
{
    public function view($view, $data=[], $category='user')
    {
        /**
         * 
         * Set Template
         */

        if($category==="admin")
        {
            $template = [
                'Template/admin/header',
                'Template/admin/navbar',
                'Template/admin/sidebar',
                'Template/admin/contentHeader',
                $view,
                'Template/admin/contentFooter',
                'Template/admin/footer'
            ];
        }
        elseif($category==="user"){
            $template = [
                'Template/siswa/header',
                'Template/siswa/navbar',
                'Template/siswa/sidebar',
                'Template/siswa/contentHeader',
                $view,
                'Template/siswa/contentFooter',
                'Template/siswa/footer'
            ];
        }
        elseif($category==="self")
        {
            $template=[$view];
        }
        $count = count($template);

        /**
         * 
         * running page
         */
        $i=0;
        while ($i < $count) {
            require_once '../App/views/'.$template[$i].'.php';
            $i++;}
    }

    public function model($model)
    {
        require_once '../App/models/' . $model . '.php';
        return new $model;
    }
}
