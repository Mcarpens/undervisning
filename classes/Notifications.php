<?php
/**
 * Created by PhpStorm.
 * User: mcarp
 * Date: 19-01-2018
 * Time: 09:05
 */

class Notifications extends \PDO
{
    private $db = null;

    /**
     * User constructor.
     * @param $db
     */

    public function __construct($db) {
        $this->db = $db;
    }

    /**
     * Generel Notifikationer
     * @return mixed
     */

    public function  getAllNotifications()
    {
        return $this->db->toList("SELECT * FROM `notifications` ORDER BY `id` DESC");
    }

    public function getLastesNotifications()
    {
        return $this->db->toList("SELECT * FROM `notifications` ORDER BY `id` DESC LIMIT 3");
    }

    public function deleteNotification($id)
    {
        return $this->db->query("DELETE FROM `notifications` WHERE id = :id", [':id' => $id]);
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

    public function deleteAllNotifications()
    {
        return $this->db->query("DELETE FROM `notifications`");
    }

    /**
     * Opdaterings Notifikationer
     * @return mixed
     */

    public function setUpdateNotificationSuccess()
    {
        return $this->db->query("INSERT INTO `notifications`(`name`, `link`, `description`, `status`) VALUES ('Opdatering Succes', 'fa fa-check-circle', 'CMS er opdateret med succes. Alle filer er udpakket korrekt.', 'success')");
    }

    public function setUpdateNotificationFailed()
    {
        return $this->db->query("INSERT INTO `notifications`(`name`, `link`, `description`, `status`) VALUES ('Opdatering Fejlede', 'fa fa-exclamation-triangle', 'Opdateringen fejlede. Der opstod et problem med udpakningen af filerne fra opdateringen. Prøv venligst igen!', 'danger')");
    }

    public function setUpdateNotificationFailedIntegrity()
    {
        return $this->db->query("INSERT INTO `notifications`(`name`, `link`, `description`, `status`) VALUES ('Opdatering Fejlede', 'fa fa-exclamation-triangle', 'Opdateringen fejlede. Der opstod et problem med vores integritet af opdateringen. Prøv venligst igen!', 'danger')");
    }

    /**
     * Besked Notifikation
     * @return mixed
     */

    public function setMessageNotificationSuccess()
    {
        return $this->db->query("INSERT INTO `notifications`(`name`, `link`, `description`, `status`) VALUES ('Ny Besked', 'fa fa-check-circle', 'Der er modtaget en ny besked. Se den under punktet beskeder.', 'success')");
    }

    public function setMessageDeleteNotification()
    {
        return $this->db->query("INSERT INTO `notifications`(`name`, `link`, `description`, `status`) VALUES ('Besked Slettet', 'fa fa-check-circle', 'En besked er blevet slettet.', 'success')");
    }

    /**
     * Produkt Notifikationer
     * @return mixed
     */

    public function setNewProductNotificationSuccess()
    {
        return $this->db->query("INSERT INTO `notifications`(`name`, `link`, `description`, `status`) VALUES ('Nyt Produkt Oprettet', 'fa fa-check-circle', 'Der er blevet oprettet et nyt produkt. Se det under punktet produkter.', 'success')");
    }

    public function setDeleteProductNotification()
    {
        return $this->db->query("INSERT INTO `notifications`(`name`, `link`, `description`, `status`) VALUES ('Produkt Slettet', 'fa fa-check-circle', 'Der er blevet slettet et produkt.', 'success')");
    }

    public function setEditProductNotification()
    {
        return $this->db->query("INSERT INTO `notifications`(`name`, `link`, `description`, `status`) VALUES ('Produkt Redigeret', 'fa fa-check-circle', 'Der er blevet redigeret på et produkt.', 'success')");
    }

    /**
     * Bruger Notifikationer
     * @return mixed
     */

    public function setNewUserNotification()
    {
        return $this->db->query("INSERT INTO `notifications`(`name`, `link`, `description`, `status`) VALUES ('En Ny Bruger', 'fa fa-check-circle', 'Der er blevet oprettet en ny bruger på siden.', 'success')");
    }

    public function setEditUserNotification()
    {
        return $this->db->query("INSERT INTO `notifications`(`name`, `link`, `description`, `status`) VALUES ('En Bruger er Redigeret', 'fa fa-check-circle', 'Der er blevet redigeret i en bruger.', 'success')");
    }

    public function setDeleteUserNotification()
    {
        return $this->db->query("INSERT INTO `notifications`(`name`, `link`, `description`, `status`) VALUES ('En Bruger er Slettet', 'fa fa-check-circle', 'Der er blevet slettet en bruger fra siden.', 'success')");
    }

    /**
     * Bruger Logind Notifikationer
     * @return mixed
     */
    public function setLoginUserNotificaitonAdminSuccess()
    {
        return $this->db->query("INSERT INTO `notifications`(`name`, `link`, `description`, `status`) VALUES ('En Bruger er logget ind', 'fa fa-check-circle', 'En bruger er logget ind på administrations panelet', 'success')");
    }

    public function setLoginUserNotificaitonFrontSuccess()
    {
        return $this->db->query("INSERT INTO `notifications`(`name`, `link`, `description`, `status`) VALUES ('En Bruger er logget ind', 'fa fa-check-circle', 'En bruger er logget ind på forsiden', 'success')");
    }

}