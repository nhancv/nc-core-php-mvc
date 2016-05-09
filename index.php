<?php
/**
 * Created by IntelliJ IDEA.
 * User: nhancao
 * Date: 5/9/16
 * Time: 12:45 PM
 */

//Start the Session
session_start();

// Defines
define('ROOT_DIR', realpath(dirname(__FILE__)) . '/');
define('APP_DIR', ROOT_DIR . 'application/');

// Includes
require(APP_DIR . 'config/config.php');
require(ROOT_DIR . 'system/model.php');
require(ROOT_DIR . 'system/view.php');
require(ROOT_DIR . 'system/controller.php');
require(ROOT_DIR . 'system/wrapper.php');

// Define base URL
global $config;
define('BASE_URL', $config['base_url']);

Wrapper();

