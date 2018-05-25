<?php
/**
 * Created by PhpStorm.
 * User: mcarp
 * Date: 09-03-2018
 * Time: 12:03
 */

class Pm extends \PDO
{
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

    public function newChat($post) {
         $data = $this->db->query("INSERT INTO `pm` (message, fk_user_first, fk_user_second) VALUES (:message, :fk_user_first, :fk_user_second)",
            [
                ':message' => $post['message'],
                ':fk_user_first' => $post['first_id'],
                ':fk_user_second' => $post['second_id']
            ]
        ) ; return $data;

    }

    public function getChat($first_id, $second_id) {
        $this->db->single("SELECT * FROM `pm` WHERE fk_user_first = :first_id",
            [
                'first_id' => $first_id,
                'second_id' => $second_id
            ]
        ); return true;
    }

    public function checkChat($id) {
        $this->db->single("SELECT * FROM `pm` WHERE fk_user_first = :first_id AND fk_user_second = :second_id",
            [
                'first_id' => $id
            ]
        ); return true;
    }

}