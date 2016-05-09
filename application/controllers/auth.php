<?php

/**
 * Created by IntelliJ IDEA.
 * User: nhancao
 * Date: 5/9/16
 * Time: 5:36 PM
 */
class Auth extends Controller
{

    function index()
    {
        $template = $this->loadView('main_view');
        $template->render();
    }

    function login()
    {
        echo 'Hello World!';
    }

}
