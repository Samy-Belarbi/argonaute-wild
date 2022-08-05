<?php

namespace App\Controllers;

use Library\Core\AbstractController;
use App\Models\ArgonautManager;

class GetArgonautsController extends AbstractController
{
    public function get(): void
    {
        $argonautManager = new ArgonautManager();
        $data = $argonautManager->findAllArgonauts();
        echo json_encode($data);
    }
}