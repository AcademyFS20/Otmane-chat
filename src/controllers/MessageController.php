<?php

namespace Chat;

use Provider\Renderer;
use Provider\Session;

class MessageController
{
    private $connected;

    public function __construct()
    {

        $this->connected = new UserController();
    }

    public function index()
    {

        if (Session::isSession('email')) {
            Renderer::render('chat', 'dashboard');
            printArray(Session::getFlash('email'));

        } else {

            echo 'can not access the data';
        }

        // debug($this->connected->getUserConnected('test@test.ma'));

    }
}