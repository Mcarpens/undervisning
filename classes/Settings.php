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


    /**
     * Notifikationer
     * @return mixed
     */

    public function  getAllNotifications()
    {
        return $this->db->toList("SELECT * FROM `notifications`");
    }

    public function getLastesNotifications()
    {
        return $this->db->toList("SELECT * FROM `notifications` ORDER BY `id` DESC LIMIT 3");
    }

    public function deleteNotification($id)
    {
        return $this->db->query("DELETE FROM `notifications` WHERE id = :id", [':id' => $id]);
    }

    public function setUpdateNotificationSuccess()
    {
        return $this->db->query("INSERT INTO `notifications`(`name`, `link`, `description`, `status`) VALUES ('Opdatering Succes', 'fa fa-check-circle', 'CMS er opdateret med succes. Alle filer er udpakket korrekt.', 'success')");
    }

    public function setUpdateNotificationFailed()
    {
        return $this->db->query("INSERT INTO `notifications`(`name`, `link`, `description`, `status`) VALUES ('Opdatering Fejlede', 'fa fa-exclamation-triangle', 'Opdateringen fejlede. Prøv venligst igen!', 'danger')");
    }

    public function singleNotification($id)
    {
        return $this->db->single("SELECT * FROM `notifications` WHERE id = :id", [':id' => $id]);
    }

    public function rowCountNotifications()
    {
        $result = $this->db->prepare("SELECT count(*) FROM `notifications`");
        $result->execute();
        return $notificationRows = $result->fetchColumn();
    }
}
