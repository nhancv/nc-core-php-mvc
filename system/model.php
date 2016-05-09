<?php

/**
 * Created by IntelliJ IDEA.
 * User: nhancao
 * Date: 5/9/16
 * Time: 12:45 PM
 */
class Model
{

    private $connection;

    public function __construct()
    {
        global $config;
        $this->connection = mysqli_connect($config['db_host'], $config['db_username'], $config['db_password']) or die($this->getConnectionError());
        mysqli_select_db($this->connection, $config['db_name']);
    }

    public function getConnectionError()
    {
        return 'MySQL Error: ' . $this->connection->connect_error;
    }

    public function escapeString($string)
    {
        return $this->connection->real_escape_string($string);
    }

    public function escapeArray($array)
    {
        array_walk_recursive($array, create_function('&$v', '$v = mysql_real_escape_string($v);'));
        return $array;
    }

    public function to_bool($val)
    {
        return !!$val;
    }

    public function to_date($val)
    {
        return date('Y-m-d', $val);
    }

    public function to_time($val)
    {
        return date('H:i:s', $val);
    }

    public function to_datetime($val)
    {
        return date('Y-m-d H:i:s', $val);
    }

    public function query($qry)
    {
        $this->queryUtf8();
        $result = $this->connection->query($qry) or die($this->getConnectionError());
        $resultObjects = array();
        while ($row = $result->fetch_assoc()) $resultObjects[] = $row;
        mysqli_free_result($result);
        return $resultObjects;
    }

    public function queryUtf8()
    {
        $this->connection->query("set names 'utf8'");
    }

    public function execute($qry)
    {
        $this->queryUtf8();
        $exec = $this->connection->query($qry) or die($this->getConnectionError());
        return $exec;
    }

}
