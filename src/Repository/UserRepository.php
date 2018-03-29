<?php

namespace MVCApp\Repository;



class UserRepository {

    private $_db = null;

    /**
     * UserRepository constructor.
     */
    public function __construct() {
         $this->_db = \Database::getInstance();
    }

    /**
     * @param $login
     * @param $password
     * @return bool
     */
    public  function authentification($login, $password) {
        $password=md5($password);
        $conn = $this->_db->getConnection();
        $sql = "SELECT * FROM user where login = '$login' and password = '$password'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                $_SESSION["id"]  = $row["id"];
                $_SESSION["username"] = $row["login"];
            }
            return true;
        }else{
            return false;
        }
    }

}
