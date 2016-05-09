<?php

/**
 * Created by IntelliJ IDEA.
 * User: nhancao
 * Date: 5/9/16
 * Time: 12:45 PM
 */
class Session_helper
{

    function set($key, $val)
    {
        $_SESSION["$key"] = $val;
    }

    function get($key)
    {
        return $_SESSION["$key"];
    }

    function destroy()
    {
        session_destroy();
    }

}
