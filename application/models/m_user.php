<?php

/**
 * Created by IntelliJ IDEA.
 * User: nhancao
 * Date: 5/9/16
 * Time: 5:03 PM
 */
class MUser
{
    private $uid;
    private $pid;
    private $password;
    private $name;
    private $phone;
    private $address;
    private $type;
    private $block;
    private $create_date;
    private $update_date;
    private $author;

    private $user_arr;
    /**
     * MUser constructor.
     * @param $user_arr
     */
    public function __construct($user_arr)
    {
        $this->user_arr = $user_arr;
        $this->mapping($this->user_arr);
    }

    private function mapping($user_arr){
        $this->uid = $user_arr["uid"];
        $this->pid = $user_arr["pid"];
        $this->password = $user_arr["password"];
        $this->name = $user_arr["name"];
        $this->phone = $user_arr["phone"];
        $this->address = $user_arr["address"];
        $this->type = $user_arr["type"];
        $this->block = $user_arr["block"];
        $this->create_date = $user_arr["create_date"];
        $this->update_date = $user_arr["update_date"];
        $this->author = $user_arr["author"];
    }
    /**
     * @return mixed
     */
    public function getUid()
    {
        return $this->uid;
    }

    /**
     * @param mixed $uid
     */
    public function setUid($uid)
    {
        $this->uid = $uid;
    }

    /**
     * @return mixed
     */
    public function getPid()
    {
        return $this->pid;
    }

    /**
     * @param mixed $pid
     */
    public function setPid($pid)
    {
        $this->pid = $pid;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getBlock()
    {
        return $this->block;
    }

    /**
     * @param mixed $block
     */
    public function setBlock($block)
    {
        $this->block = $block;
    }

    /**
     * @return mixed
     */
    public function getCreateDate()
    {
        return $this->create_date;
    }

    /**
     * @param mixed $create_date
     */
    public function setCreateDate($create_date)
    {
        $this->create_date = $create_date;
    }

    /**
     * @return mixed
     */
    public function getUpdateDate()
    {
        return $this->update_date;
    }

    /**
     * @param mixed $update_date
     */
    public function setUpdateDate($update_date)
    {
        $this->update_date = $update_date;
    }

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param mixed $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    /**
     * @return mixed
     */
    public function getUserArr()
    {
        return $this->user_arr;
    }

    /**
     * @param mixed $user_arr
     */
    public function setUserArr($user_arr)
    {
        $this->user_arr = $user_arr;
        $this->mapping($this->user_arr);
    }


}