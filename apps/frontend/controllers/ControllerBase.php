<?php

namespace Modules\Frontend\Controllers;

use Phalcon\Mvc\Controller;
use Modules\BusinessLogic\Frontend as Frontend;

class ControllerBase extends Controller
{
    public function initialize()
    {
        $this->view->menu = Frontend\MenuBar::createMenu();
    }
}
