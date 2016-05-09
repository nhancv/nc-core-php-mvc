<?php

/**
 * Created by IntelliJ IDEA.
 * User: nhancao
 * Date: 5/9/16
 * Time: 12:45 PM
 */
class Main extends Controller
{
    function index()
    {
        $template = $this->loadView('main_view');
        $template->render();
    }

}
