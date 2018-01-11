<?php
/**
 * Created by PhpStorm.
 * User: Marc
 * Date: 26-09-2017
 * Time: 08:42
 */

class Settings {

    private $db = null;

    /**
     * Settings constructor.
     */
    public function __construct($db)
    {
        $this->db = $db;
    }

    /**
     * @return mixed
     */
    public function getAllMenu()
    {
        return $this->db->toList("SELECT * FROM `menu`");
    }

    /**
     * @return mixed
     */
    public function getAllSettings()
    {
        return $this->db->toList("SELECT * FROM `settings`");
    }
}
