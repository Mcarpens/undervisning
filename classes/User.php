<?php
/**
 * Copyright (c) 2017
 * Author: Marc Carpens
 * Pers.ID: 4030638
 * School: Roskilde Technical School
 * License: Closed
 */

class User {

    /**
     * @var
     */
    private $username;

    /**
     * @var
     */
    private $password;

    /**
     * @var null
     */
    private $db = null;

    /**
     * User constructor.
     * @param $db
     */
    public function __construct($db) {
        $this->db = $db;
    }

    # Only accept the $_POST inputs and not $_GET inputs.

    /**
     * Tjekker request method
     *
     * @param string $method
     * @return boolean
     */
    public function secCheckMethod($method) {
        return (filter_input(INPUT_SERVER, 'REQUEST_METHOD', FILTER_SANITIZE_SPECIAL_CHARS) === strtoupper($method)) ? true : false;
    }

    #Sanitize the users input from forms

    /**
     * Returnér filtreret superglobal
     *
     * @param string $input
     * @return string
     */
    public function secGetInputArray($input) {
        return filter_input_array(strtoupper($input), FILTER_SANITIZE_SPECIAL_CHARS);
    }

    ## TJEK OM BRUGER EKSISTERE, return true, hvis ja

    /**
     * @param $username
     * @return bool
     */
    private function userExists($username) {
        $this->username = $username;
        if ($stmt = $this->db->prepare("SELECT id FROM users WHERE username = :username")) {
            $stmt->bindParam(':username', $this->username);
            if ($stmt->execute()) {
                if ($stmt->rowCount() > 0) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return true;
            }
        } else {
            return true;
        }
    }

    ## Opret ny bruger

    /**
     * @param $username
     * @param $password
     * @return bool
     */
    public function create($username, $password) {
        $this->username = $username;
        $this->password = $password;

        if (!$this->userExists($this->username)) {
            // Connect to database
            if ($stmt = $this->db->prepare("INSERT INTO users (username, password, fk_userrole) VALUES (:username, :password, '3')")) {
                $stmt->bindParam(':username', $this->username);
                $stmt->bindParam(':password', password_hash($this->password, PASSWORD_BCRYPT, ['cost' => 12]));
                if ($stmt->execute()) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    ## Get the latest userID

    /**
     * @return mixed
     */
    public function getLastUserId() {
        $result = $this->db->query("SELECT id FROM users ORDER BY id DESC LIMIT 1");
        $row = $result->fetch(PDO::FETCH_ASSOC);
        return $row['id'];
    }

    ## Verify users

    /**
     * @param $username
     * @param $password
     * @return bool
     */
    public function verifyUser($username, $password) {
        $this->username = $username;
        $this->password = $password;

        if ($stmt = $this->db->prepare("SELECT id, password FROM users WHERE username = :username")) {
            $stmt->bindParam(':username', $this->username, PDO::PARAM_STR);
            if ($stmt->execute()) {
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                if (password_verify($this->password, $result['password'])) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    ## Get userID from users

    /**
     * @param $username
     * @return bool
     */
    public function getUserId($username) {
        $this->username = $username;
        if ($stmt = $this->db->prepare("SELECT id FROM users WHERE username = :username")) {
            $stmt->bindParam(':username', $this->username, PDO::PARAM_STR);
            if ($stmt->execute()){
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                return $result['id'];
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    ## Login Method Filter Function

    /**
     * @param $method
     * @return bool
     */
    public function methodCheck($method) {
        $requestMethod = filter_input(INPUT_SERVER, 'REQUEST_METHOD', FILTER_SANITIZE_SPECIAL_CHARS);
        if ($requestMethod === $method) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    ## Token Generator

    /**
     *
     */
    private function generateToken() {
        if ($this->isSessionStarted() == false) {
            session_start();
        }
        $_SESSION['token'] = sha1(time()*rand(5,1000));
        $_SESSION['tokentime'] = time();
    }

    ## Get token

    /**
     * @return mixed
     */
    public function getToken() {
        if ($this->isSessionStarted() == false) {
            session_start();
        }
        if(isset($_SESSION['token'])) {
            return $_SESSION['token'];
        } else {
            $this->generateToken();
            return $_SESSION['token'];
        }
    }

    ## Validate Token

    /**
     * @param $token
     * @return bool
     */
    public function validateToken($token) {
        if ($this->isSessionStarted() == false) {
            session_start();
        }
        if ($token === $_SESSION['token']) {
            if ((time() - $_SESSION['tokentime']) > 120) {
                return FALSE;
            } else {
                return TRUE;
            }
        } else {
            return FALSE;
        }
    }

    ## Delete the token after use

    /**
     *
     */
    public function destroyToken(){
        if ($this->isSessionStarted() == false) {
            session_start();
        }
        if(isset($_SESSION['token']) && isset($_SESSION['tokentime'])) {
            unset($_SESSION['token']);
            unset($_SESSION['tokentime']);
        }
    }

    ## Is session started

    /**
     * @return bool
     */
    public function isSessionStarted() {
        if (php_sapi_name() !== 'cli') {
            if (version_compare(phpversion(), '5.4.0', '>=') ) {
                return session_status() === PHP_SESSION_ACTIVE ? true : false;
            } else {
                return session_id() === '' ? false : true;
            }
        }
        return true;
    }

    # Get all users data

    /**
     * @return mixed
     */
    public function getAll()
    {
        return $this->db->toList("SELECT * FROM `users`");
    }


    # Get one users data

    /**
     * @param $id
     * @return mixed
     */
    public function getOne($id)
    {
        return $this->db->single("SELECT * FROM `users` WHERE id = :id",
            [
                ':id' => $id,
            ]
        );
    }

    /**
     * Find brugerens niveau fra db
     *
     * @return integer
     */
    public function secCheckLevel(){
        $stmt = $this->db->prepare("SELECT userroles.niveau FROM `users`
								INNER JOIN `userroles` ON `userroles`.`id` = `users`.`fk_userrole`
								WHERE `users`.`id` = :id");
        $stmt->bindParam(':id', $_SESSION['user_session'], PDO::PARAM_STR);
        $stmt->execute();
        if($stmt->rowCount() === 1){
            $result = $stmt->fetch(PDO::FETCH_OBJ);
            return $result->niveau;
        } else {
            return 0;
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public function userGet($id) {
        $stmt = $this->db->prepare("SELECT userroles.niveau, users.username, users.firstname, users.lastname, users.id
                             FROM users 
                             INNER JOIN userroles
                             ON users.fk_userrole = userroles.id
                             WHERE users.id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        if($stmt->execute() && ($stmt->rowCount() === 1)) {
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
    }

    /**
     * @param $sql
     * @param $id
     * @return mixed
     */
    public function getFromDB($sql, $id) {
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        if($stmt->execute() && ($stmt->rowCount() === 1)) {
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
    }

    /**
     * @param $sql
     * @return mixed
     */
    public function runQuery($sql)
    {
        $stmt = $this->db->prepare($sql);
        return $stmt;
    }

    /**
     * @param $username
     * @param $firstname
     * @param $lastname
     * @param $password
     * @return mixed
     */
    public function register($username, $firstname, $lastname, $password)
    {
        try
        {
            $new_password = password_hash($username, PASSWORD_BCRYPT, ['cost' => 12]);

            $stmt = $this->db->prepare("INSERT INTO users (firstname, lastname, username, password, fk_userrole) SELECT (:fname, :lname, :uname, :upass, 1)");

            $stmt->bindparam(":fname", $firstname);
            $stmt->bindparam(":lname", $lastname);
            $stmt->bindparam(":uname", $username);
            $stmt->bindparam(":upass", $new_password);

            $stmt->execute();

            return $stmt;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }


    /**
     * @param $username
     * @param $password
     * @return bool
     */
    public function doLogin($username, $password)
    {
        try
        {
            $stmt = $this->db->prepare("SELECT id, username, password FROM users WHERE username=:uname");
            $stmt->execute(array(':uname'=>$username));
            $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
            if($stmt->rowCount() == 1)
            {
                if(password_verify($password, $userRow['password']))
                {
                    $_SESSION['user_session'] = $userRow['id'];
                    return true;
                }
                else
                {
                    return false;
                }
            } else {
                return false;
            }
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    /**
     * @return bool
     */
    public function is_loggedin()
    {
        if(isset($_SESSION['user_session']))
        {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param $url
     */
    public function redirect($url)
    {
        header("Location: $url");
    }

    /**
     * @return bool
     */
    public function doLogout()
    {
        session_start();
        session_destroy();
        unset($_SESSION['user_session']);
        return true;
    }

}