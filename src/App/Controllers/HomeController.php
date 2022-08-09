<?php

namespace App\Controllers;

use Library\Core\AbstractController;

class HomeController extends AbstractController
{
    public function show(): void
    {

        $this->display('homepage', [
            'title' => 'Entretien Wild - Belarbi Samy',
            'script' => 'homepage'
        ]);

    }
}