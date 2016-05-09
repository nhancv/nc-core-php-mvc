<?php

/**
 * Created by IntelliJ IDEA.
 * User: nhancao
 * Date: 5/9/16
 * Time: 12:45 PM
 */
class Example_model extends Model
{

    public function getSomething($id)
    {
        $id = $this->escapeString($id);
        $result = $this->query('SELECT * FROM something WHERE id="' . $id . '"');
        return $result;
    }

}

