<?php

namespace MVCApp\Controller;

use MVCApp\Entity\Message;
use MVCApp\Entity\User;
use MVCApp\Repository\MessageRepository;

class MessageController extends BaseController
{
    /**
     * MessageController constructor.
     */
    public function __construct()
    {
        $this->repository = new MessageRepository();
    }

    /**
     * sen new message
     */
    public function new()
    {
        $messageText = $_REQUEST['message'];
        $userId = $_SESSION['id'];
        $message = new Message();
        $message->setMessage($messageText);
        $user = new User();
        $user->setId($userId);
        $message->setUser($user);
        $this->repository->add($message);
        $this->list();
    }

    /**
     * get all messages
     */
    public function list()
    {
        $messages = $this->repository->getAllMessage();
        $this->view("Message/index", ['messages' => $messages]);
    }
}