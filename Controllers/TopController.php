<?php
namespace Controllers;

require_once(ROOT_PATH.'Views/ViewBase.php');
use Views\ViewBase;

class TopController
{
    public function index()
    {
        ViewBase::render('/index.php');
    }
}

