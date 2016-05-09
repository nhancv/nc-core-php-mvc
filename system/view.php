<?php

/**
 * Created by IntelliJ IDEA.
 * User: nhancao
 * Date: 5/9/16
 * Time: 12:45 PM
 */
class View
{

    private $pageVars = array();
    private $template;

    public function __construct($template)
    {
        $this->template = APP_DIR . 'views/' . $template . '.php';
    }

    public function set($var, $val)
    {
        $this->pageVars[$var] = $val;
    }

    public function render()
    {
        extract($this->pageVars);

        ob_start();
        require($this->template);
        echo ob_get_clean();
    }

}
