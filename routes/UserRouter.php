<?php

namespace routes;

use core\Auth;
use core\exceptions\ConstraintViolationException;
use core\http\Request;
use core\http\Response;
use core\http\Router;
use models\User;

class UserRouter
{
    static function get_router()
    {
        $router = new Router();

        $router->get("/login", function (Request $req, Response $res) {
            $res->render('user/login');
        });
        $router->get("/signup", function (Request $req, Response $res) {
            $res->render('user/signup');
        });
        $router->get("/profile", function (Request $req, Response $res) {
            Auth::check_role([User::ROLE_CUSTOMER, User::ROLE_MANAGER, User::ROLE_DRIVER, User::ROLE_ADMIN, User::ROLE_STOCKMANGER]);

            $user = Auth::get_user('userId,email,role,name,phoneNumber,address');
            $res->render('user/profile', compact('user'));
        });
        $router->get("/logout", function (Request $req, Response $res) {
            Auth::logout();
            $res->redirect('/user/login');
        });

        $router->post("/api/login", function (Request $req, Response $res) {
            $email = $req->body['email'];
            $password = $req->body['password'];

            $user = User::find_one(compact('email'), "userId,role,password");

            if ($user == null || !$user->verify_password($password)) {
                $res->redirect('/user/login', [
                    "error" => "Incorrect email or password"
                ]);
            } else {
                Auth::login($user);
                $res->redirect('/user/profile');
            }
        });
        $router->post("/api/signup", function (Request $req, Response $res) {
            $email = $req->body['email'];
            $password = $req->body['password'];

            try {
                $role = User::ROLE_CUSTOMER;
                $user = new User(compact('email', 'role'));
                $user->set_password($password);
                $user = User::create($user, "userId,role");
            } catch (ConstraintViolationException) {
                $res->redirect('/user/signup', [
                    "error" => "An account with this email already exists"
                ]);
                return;
            }
            Auth::login($user);
            $res->redirect('/user/profile');
        });
        $router->post("/api/profile", function (Request $req, Response $res) {
            Auth::check_role([User::ROLE_CUSTOMER, User::ROLE_MANAGER, User::ROLE_DRIVER, User::ROLE_ADMIN, User::ROLE_STOCKMANGER]);

            $user = Auth::get_user();

            if ($req->body["password"])
                $user->set_password($req->body["password"]);

            $user->name = $req->body["name"];
            $user->address = $req->body["address"];
            $user->phoneNumber = $req->body["phoneNumber"];

            User::update($user);

            $res->redirect("/user/profile", [
                "msg" => "Your profile has been updated"
            ]);
        });
        return $router;
    }
}
