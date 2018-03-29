<?php

namespace MVCApp\Repository;

use MVCApp\Entity\Message;
use MVCApp\Entity\User;


/**
 * Message class
 */
class MessageRepository
{
    private $_db = null;

    /**
     * MessageRepository constructor.
     */
    public function __construct()
    {
        $this->_db = \Database::getInstance();
    }

    /**
     * @param $message
     * @return bool
     */
    public function add($message)
    {
        $conn = $this->_db->getConnection();
        $userId = $message->getUser()->getId();
        $textMessage = $message->getMessage();
        $date = $message->getDate()->format('Y-m-d H:i:s');
        $sql = "INSERT INTO message (id, message,user_id, date) VALUES (null, '$textMessage', '$userId', '$date')";
        if ($conn->query($sql) === TRUE) {
            return true;
        } else {
            die("Error: " . $sql . "<br>" . $conn->error);
        }
    }

    /**
     * get all messages
     * @return array
     */
    public function getAllMessage()
    {
        $conn = $this->_db->getConnection();
        $sql = "SELECT * FROM message m INNER JOIN user u where m.user_id = u.id ORDER by m.date DESC";
        $result = $conn->query($sql);
        $messages = [];
        if ($result->num_rows > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $message = new Message();
                $message->setId($row["id"]);
                $message->setDate($row["date"]);
                $message->setMessage($row["message"]);
                $user = new User();
                $user->setId($row["user_id"]);
                $user->setUsername($row["login"]);
                $user->setConnected($row["connected"]);
                $message->setUser($user);
                $messages[] = $message;
            }
        }
        return $messages;
    }
}
