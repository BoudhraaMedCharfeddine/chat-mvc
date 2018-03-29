<?php

namespace MVCApp\Controller;

use MVCApp\Repository\UserRepository;

class UserController extends BaseController
{
    /**
     * UserController constructor.
     */
    public function __construct()
    {
        $this->repository = new UserRepository();
    }

    /**
     *the login page
     */
    public function index()
    {
        $this->view("User/index");
    }

    /**
     * the login action
     */
    public function login()
    {
        $result = $this->repository->authentification($_REQUEST['username'], $_REQUEST['password']);
        if ($result) {
            $this->redirect("/message/list");
        } else {
            $this->redirect("/");
        }
    }

    /**
     * the logout action
     */
    public function logout()
    {
        session_unset();
        header('Location: ' . strtok($_SERVER['REQUEST_URI'], '?'));
        exit;
    }
}