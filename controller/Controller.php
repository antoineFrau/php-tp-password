<?php
namespace tp4_password;

//header('Access-Control-Allow-Origin: *');
ini_set('display_errors', 1	); // 0 No show errors, 1

// User Controller
require_once './UserController.php';
require_once '../model/JsonResult.php';

$route = filter_input(INPUT_POST, "route");
if ($route == NULL) {
    $route = filter_input(INPUT_GET, "route");
}

switch ($route){
    /*                                  USER ROUTE                           */
    case 'create_user';
            $user = new UserController();
            $name = filter_input(INPUT_POST, "name");
            $password = filter_input(INPUT_POST, "password");
            if($name == NULL){
                echo json_encode(JsonResult::failledReturn("Missing parametters"));
                return;
            }
            $user->create($name, $password);
        break;
    case 'users';
            $user = new UserController();
            $user->get_users();
        break;
    default:
        break;
}