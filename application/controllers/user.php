<?php

/**
 * Created by IntelliJ IDEA.
 * User: nhancao
 * Date: 5/9/16
 * Time: 5:36 PM
 */
class User extends Controller
{

    function index()
    {
        $template = $this->loadView('main_view');
        $template->render();
    }

    function getUser()
    {
        $json = $this->loadHelper('Json');
        $userModel = $this->loadModel('Example_model');
        $userList = $userModel->getAllUser();
        $response["user"] = array();
        foreach ($userList as &$user) {
            array_push($response["user"], $user);
        }
//        echo $json->json_encode_utf8($response);
        $m_user = new MUser($userList[0]);
        echo $m_user->getName();
    }
}
