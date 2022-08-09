<?php

namespace App\Controllers;

use Library\Core\AbstractController;

class HomeController extends AbstractController
{
    public function show(): void
    {

        $this->display('homepage', [
            'title' => 'Entretien Technique Wild Code School - Belarbi Samy',
            'script' => 'homepage'
        ]);

    }
}