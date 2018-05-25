<?php
/**
 * Copyright (c) 2017
 * Author: Marc Carpens
 * Pers.ID: 4030638
 * School: Roskilde Technical School
 * License: Closed
 */

class User extends \PDO
{

    /**
     * Gør brug af en variabel som er privat. Bruges kun i dette objekt
     * @var
     */
    private $username;

    /**
     * Gør brug af en variabel som er privat. Bruges kun i dette objekt
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
        $_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
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
        $_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
        return filter_input_array(strtoupper($input), FILTER_SANITIZE_SPECIAL_CHARS);
    }

    ## Login Method Filter Function

    /**
     * Tjekker hvilken input metoder der er angivet i url'en. (POST eller GET)
     * @param $method
     * @return bool
     */
    public function methodCheck($method) {
        $_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
        $requestMethod = filter_input(INPUT_SERVER, 'REQUEST_METHOD', FILTER_SANITIZE_SPECIAL_CHARS);
        if ($requestMethod === $method) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    ## Token Generator

    /**
     *  Generere vi en tilfældig token til vores user logind og opret.
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
     * Er en session staret
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
        $_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
        return $this->db->toList("SELECT * FROM `users`");
    }


    # Get one users data

    /**
     * @param $id
     * @return mixed
     */
    public function getOne($id)
    {
        $_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
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
        $stmt = $this->db->prepare("SELECT userrole.niveau FROM `users`
								INNER JOIN `userrole` ON `userrole`.`id` = `users`.`fk_userrole`
								WHERE `users`.`id` = :id");
        $stmt->bindParam(':id', $_SESSION['user_id'], PDO::PARAM_STR);
        $stmt->execute();
        if($stmt->rowCount() === 1){
            $result = $stmt->fetch(PDO::FETCH_OBJ);
            return $result->niveau;
        } else {
            return 0;
        }
    }

    /**
     * @param $username
     * @return mixed
     */
    public function checkUsername($username) {
        return $this->db->single("SELECT username FROM users WHERE username=:uname",
            [':uname' => $username]);
    }

    /**
     * @param $username
     * @param $firstname
     * @param $lastname
     * @param $password
     * @return mixed
     */
    public function register($firstname, $lastname, $username, $password)
    {
        try
        {
            // Krypter adgangskoden med BCrypt på en cost af 12. (12 er højt sat)
            $new_password = password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);

            // 3 er vores userrole niveau. som er i vores tilfælde en alm. bruger (50)
            $this->db->query("INSERT INTO users (firstname, lastname, username, password, fk_userrole) 
                                VALUES (:fname, :lname, :uname, :upass, 3)",
                                [
                                    ':fname' => $firstname,
                                    ':lname' => $lastname,
                                    ':uname' => $username,
                                    ':upass' => $new_password
                                ]);


            return true;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
            return false;
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
            $stmt = $this->db->single("SELECT id, username, password FROM users WHERE username = :uname", [':uname' => $username]);
            if($stmt == true)
            {
                // Validere adgangskoden ved logind med den i db.
                if(password_verify($password, $stmt->password))
                {
                    $_SESSION['user_id'] = $stmt->id;
                    $_SESSION['username'] = $stmt->username;
                    $_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
                    $this->db->query("UPDATE `users` SET `is_loggedin`=:is_loggedin WHERE id = :id",
                        [
                            ':id' => $_SESSION['user_id'],
                            ':is_loggedin' => 1
                        ]
                    );
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
        if(isset($_SESSION['user_id']))
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
        $_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
        header("Location: index.php?side=".$url."");
    }

    /**
     * @return bool
     */
    public function doLogout()
    {
        $this->db->query("UPDATE `users` SET `is_loggedin`=:is_loggedin WHERE id = :id",
            [
                ':id' => $_SESSION['user_id'],
                ':is_loggedin' => 0
            ]
        );
        session_destroy();
        unset($_SESSION['user_id']);
        header('Location: ./index.php?side=forside');
        return true;
    }

    public function sessionTimeout()
    {
        if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
            // last request was more than 30 minutes ago
            $this->doLogout();
        }
        return true;
    }

    public function deleteUser($id)
    {
        return $this->db->query("DELETE FROM users WHERE id = :id", [':id' => $id]);
    }

    public function editUser($post, $files)
    {
        $_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
        $newfile = $files;
        // Tjekker om både password og eller billede er sat.
        if(empty($newfile)) {
            $this->db->query("UPDATE `users` SET `firstname`=:firstname,`lastname`=:lastname,`username`=:username, `email`=:email, `address`=:address, `phone`=:phone
                          WHERE id = :id",
                [
                    ':id' => $post['id'],
                    ':firstname' => $post['firstname'],
                    ':lastname' => $post['lastname'],
                    ':username' => $post['username'],
                    ':email' => $post['email'],
                    ':address' => $post['address'],
                    ':phone' => $post['phone']
                ]);
        } else if(empty($post['password']) && empty($newfile)) {
            $this->db->query("UPDATE `users` SET `firstname`=:firstname,`lastname`=:lastname,`username`=:username, `email`=:email, `address`=:address, `phone`=:phone
                          WHERE id = :id",
                [
                    ':id' => $post['id'],
                    ':firstname' => $post['firstname'],
                    ':lastname' => $post['lastname'],
                    ':username' => $post['username'],
                    ':email' => $post['email'],
                    ':address' => $post['address'],
                    ':phone' => $post['phone']
                ]);
        } else if(empty($post['password'])) {
            $this->db->query("UPDATE `users` SET `firstname`=:firstname,`lastname`=:lastname,`username`=:username, `email`=:email, `address`=:address, `phone`=:phone, `avatar`=:avatar
                          WHERE id = :id",
                [
                    ':id' => $post['id'],
                    ':firstname' => $post['firstname'],
                    ':lastname' => $post['lastname'],
                    ':username' => $post['username'],
                    ':email' => $post['email'],
                    ':address' => $post['address'],
                    ':avatar' => $newfile,
                    ':phone' => $post['phone']
                ]);
        } else if(!empty($newfile)) {
            $this->db->query("UPDATE `users` SET `firstname`=:firstname,`lastname`=:lastname,`username`=:username, `email`=:email, `address`=:address, `phone`=:phone, `avatar`=:avatar
                          WHERE id = :id",
                [
                    ':id' => $post['id'],
                    ':firstname' => $post['firstname'],
                    ':lastname' => $post['lastname'],
                    ':username' => $post['username'],
                    ':email' => $post['email'],
                    ':address' => $post['address'],
                    ':avatar' => $newfile,
                    ':phone' => $post['phone']
                ]);
        } else if(!empty($post['password']) && !empty($newfile)) {
            $new_password = password_hash($post['password'], PASSWORD_BCRYPT, ['cost' => 12]);

            $this->db->query("UPDATE `users` SET `firstname`=:firstname,`lastname`=:lastname,`username`=:username, `email`=:email, `address`=:address, `phone`=:phone, `avatar` = :avatar, `password` = :password
                          WHERE id = :id",
                [
                    ':id' => $post['id'],
                    ':firstname' => $post['firstname'],
                    ':lastname' => $post['lastname'],
                    ':username' => $post['username'],
                    ':email' => $post['email'],
                    ':address' => $post['address'],
                    ':phone' => $post['phone'],
                     ':avatar' => $newfile,
                    ':password' => $new_password
                ]);
        }

        if(!empty($post['password'])) {
        $new_password = password_hash($post['password'], PASSWORD_BCRYPT, ['cost' => 12]);

        $this->db->query("UPDATE `users` SET `firstname`=:firstname,`lastname`=:lastname,`username`=:username, `email`=:email, `address`=:address, `phone`=:phone, `avatar` = :avatar, `password` = :password 
                          WHERE id = :id",
            [
                ':id' => $post['id'],
                ':firstname' => $post['firstname'],
                ':lastname' => $post['lastname'],
                ':username' => $post['username'],
                ':email' => $post['email'],
                ':address' => $post['address'],
                ':phone' => $post['phone'],
                ':avatar' => $newfile,
                ':password' => $new_password
            ]);
    }

        return true;
    }

}