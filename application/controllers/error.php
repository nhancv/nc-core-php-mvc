<?php

/**
 * Created by IntelliJ IDEA.
 * User: nhancao
 * Date: 5/9/16
 * Time: 12:45 PM
 */
class Error extends Controller
{

    function index()
    {
        $this->error404();
    }

    function error404()
    {
        echo '<h1>404 Error</h1>';
        echo '<p>Looks like this page doesn\'t exist</p>';
    }

}

