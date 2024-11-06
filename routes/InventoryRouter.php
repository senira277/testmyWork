<?php

namespace routes;

use core\Auth;
use core\exceptions\ConstraintViolationException;
use core\http\Request;
use core\http\Response;
use core\http\Router;
use models\Ingredient;
use models\User;
use core\Database;


class InventoryRouter
{
    static function get_router()
    {
        $router = new Router();

        $router->get("/overview", function (Request $req, Response $res) {
            Auth::check_role([User::ROLE_MANAGER, User::ROLE_ADMIN, User::ROLE_STOCKMANGER]);
            $inventory = Ingredient::get_stock_levels();
            $res->render('stock/overview',compact('inventory'));
        });
        $router->get("/restock", function (Request $req, Response $res) {
            Auth::check_role([User::ROLE_MANAGER, User::ROLE_ADMIN, User::ROLE_STOCKMANGER]);
            $res->render('stock/restock');
        });
        $router->get("/release-items", function (Request $req, Response $res) {
            Auth::check_role([User::ROLE_MANAGER, User::ROLE_ADMIN, User::ROLE_STOCKMANGER]);
            $res->render('stock/release');
        });
        $router->get("/controlls", function (Request $req, Response $res) {
            Auth::check_role([User::ROLE_MANAGER, User::ROLE_ADMIN, User::ROLE_STOCKMANGER]);
            $res->render('stock/stockcontrolls');
        });
        $router->post("/add-item", function (Request $req, Response $res) {
            Auth::check_role([User::ROLE_MANAGER, User::ROLE_ADMIN, User::ROLE_STOCKMANGER]);
            try {
                if(!$req->body["itemName"] || !$req->body["defaultLevel"] ){
                    $res->redirect('/stock/controlls', [
                        "error" => "Please provide the all required fields"
                    ]); 
                }
                $item = new Ingredient();
                $item->name = $req->body["itemName"];
                $item->type = $req->body["itemType"];
                $item->measureUnit = $req->body["measureUnit"];
                $item->supplier = $req->body["supplier"];
                $item->defaultLevel = $req->body["defaultLevel"];
                $item->alertLevel = $req->body["alertLevel"];

                $createdItem = Ingredient::create($item);
                $res->redirect("/stock/controlls", [
                    "msg" => "The Item has been added"
                ]);
                
            } catch (ConstraintViolationException) {
                $res->redirect('/stock/controlls', [
                    "error" => "An account with this email already exists"
                ]);
                return;
            }
            $res->redirect('/user/profile');
        });

        $router->post("/update-item", function (Request $req, Response $res) {
            Auth::check_role([User::ROLE_MANAGER, User::ROLE_ADMIN, User::ROLE_STOCKMANGER]);
            try {
                $item = new Ingredient();
                $item->name = $req->body["itemName"];
                $item->type = $req->body["itemType"];
                $item->measureUnit = $req->body["measureUnit"];
                $item->supplier = $req->body["supplier"];
                $item->defaultLevel = $req->body["defaultLevel"];
                $item->alertLevel = $req->body["alertLevel"];

                $createdItem = Ingredient::create($item);
                $res->redirect("/stock/controlls", [
                    "msg" => "The Item has been added"
                ]);
                
            } catch (ConstraintViolationException) {
                $res->redirect('/stock/controlls', [
                    "error" => "An account with this email already exists"
                ]);
                return;
            }
            $res->redirect('/user/profile');
        });
        
        return $router;
    }
}