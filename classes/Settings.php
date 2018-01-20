<?php
/**
 * Created by PhpStorm.
 * User: Marc
 * Date: 26-09-2017
 * Time: 08:42
 */

class Settings extends \PDO {

    private $db = null;

    /**
     * Settings constructor.
     */
    public function __construct($db)
    {
        $this->db = $db;
    }

    /**
     * Menu & Admin Menu
     * @return mixed
     */

    public function getAllMenu()
    {
        return $this->db->toList("SELECT * FROM `menu`");
    }

    public function getAllAdminMenu()
    {
        return $this->db->toList("SELECT * FROM `admin_menu`");
    }

    /**
     * Settings
     * @return mixed
     */

    public function getAllSettings()
    {
        return $this->db->toList("SELECT * FROM `settings`");
    }

}
