<?php

namespace App\Controllers;

use Library\Core\AbstractController;
use App\Models\ArgonautModel;
use App\Models\ArgonautManager;

class AddArgonautController extends AbstractController
{
    public function add(): void
    {
        $stringArgonaute = $_POST['Argonaute'];
        $arrayArgonaute = json_decode($stringArgonaute, true);

        $argonaut = new ArgonautModel();
        $argonaut->setFirstName($arrayArgonaute['name']);
        $argonaut->setAdjective($arrayArgonaute['adjective']);

        $argonautManager = new ArgonautManager();
        $argonautManager->createArgonaut($argonaut);
    }
}