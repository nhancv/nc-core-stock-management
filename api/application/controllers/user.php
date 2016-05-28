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
        try {
            $userModel = new UserModel();
            $userList = $userModel->getAllUser();
            $response["data"] = array();
            foreach ($userList as &$user) {
                array_push($response["data"], $user);
            }
            $response["status"] = 0;
            echo Json::json_encode_utf8($response);
        } catch (Exception $e) {
            $response["status"] = 1;
            $response["msg"] = $e;
            echo Json::json_encode_utf8($response);
        }
    }

    function insertUser()
    {
        try {
            $userModel = new UserModel();
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && empty($_POST))
                $_POST = Json::json_decode_nice(file_get_contents('php://input'), true);
            else throw new Exception ("check request method");
            if (MBase::checkNullField($_POST["pid"])) throw new Exception("object null");
            $user = Parsing::parsingNewUser($_POST);
            $res = $userModel->insertUser($user);
            $response["msg"] = $res;
            $response["status"] = 0;
            echo Json::json_encode_utf8($response);
        } catch (Exception $e) {
            $response["status"] = 1;
            $response["msg"] = $e->getMessage();
            echo Json::json_encode_utf8($response);
        }
    }

    function updateUser()
    {
        try {
            $userModel = new UserModel();
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && empty($_POST))
                $_POST = Json::json_decode_nice(file_get_contents('php://input'), true);
            else throw new Exception ("check request method");
            if (MBase::checkNull($_POST)) throw new Exception("object null");
            $user = Parsing::parsingEditUser($_POST);
            $res = $userModel->updateUser($user);
            $response["msg"] = $res;
            $response["status"] = 0;
            echo Json::json_encode_utf8($response);
        } catch (Exception $e) {
            $response["status"] = 1;
            $response["msg"] = $e->getMessage();
            echo Json::json_encode_utf8($response);
        }
    }

    function deleteUser()
    {
        try {
            $userModel = new UserModel();
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && empty($_POST))
                $_POST = Json::json_decode_nice(file_get_contents('php://input'), true);
            else throw new Exception ("check request method");
            if (MBase::checkNull($_POST)) throw new Exception("object null");
            $user = Parsing::parsingNewUser($_POST);
            $res = $userModel->deleteUser($user->getUid());
            $response["msg"] = $res;
            $response["status"] = 0;
            echo Json::json_encode_utf8($response);
        } catch (Exception $e) {
            $response["status"] = 1;
            $response["msg"] = $e->getMessage();
            echo Json::json_encode_utf8($response);
        }
    }

    function deleteMultiUser()
    {
        try {
            $userModel = new UserModel();
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && empty($_POST))
                $_POST = Json::json_decode_nice(file_get_contents('php://input'), true);
            else throw new Exception ("check request method");
            if (MBase::checkNullField($_POST["uid_arr"])) throw new Exception("object null");
            $res = $userModel->deleteMultiUser($_POST["uid_arr"]);
            $response["msg"] = $res;
            $response["status"] = 0;
            echo Json::json_encode_utf8($response);
        } catch (Exception $e) {
            $response["status"] = 1;
            $response["msg"] = $e->getMessage();
            echo Json::json_encode_utf8($response);
        }
    }



}
