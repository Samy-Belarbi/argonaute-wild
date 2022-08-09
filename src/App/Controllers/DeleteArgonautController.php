<?php

namespace App\Controllers;

use Library\Core\AbstractController;
use App\Models\ArgonautManager;

class DeleteArgonautController extends AbstractController
{
    public function delete(): void
    {
        $argonautManager = new ArgonautManager();
        $argonautManager->deleteArgonaut($_POST['ID']);
    }
}