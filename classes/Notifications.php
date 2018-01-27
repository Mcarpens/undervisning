<?php
/**
 * Created by PhpStorm.
 * User: mcarp
 * Date: 19-01-2018
 * Time: 09:05
 */

class Notifications extends \PDO
{
    /**
     * DB er sat på forhånd, derfor null
     * @var null
     */
    private $db = null;

    /**
     * User constructor.
     * Nødvendig for database håndtering
     * @param $db
     */
    public function __construct($db) {
        $this->db = $db;
    }

    /**
     * Generel Notifikationer
     * @return mixed
     */
    // Hent alle notifikationer fra notifications tabellen //
    public function  getAllNotifications()
    {
        return $this->db->toList("SELECT * FROM `notifications` ORDER BY `id` DESC");
    }
    /**
     * @return mixed
     */
    // Hent de 3 nyeste notifikationer fra notifications tabellen //
    public function getLastesNotifications()
    {
        return $this->db->toList("SELECT * FROM `notifications` ORDER BY `id` DESC LIMIT 3");
    }
    /**
     * @param $id
     * @return mixed
     */
    // Slet en notifikation fra notifications tabellen udfra ID'et //
    public function deleteNotification($id)
    {
        return $this->db->query("DELETE FROM `notifications` WHERE id = :id", [':id' => $id]);
    }
    /**
     * @param $id
     * @return mixed
     */
    // Vis kun een notifikation fra notifications tabellen, udfra ID'et //
    public function singleNotification($id)
    {
        return $this->db->single("SELECT * FROM `notifications` WHERE id = :id", [':id' => $id]);
    }
    /**
     * @return mixed
     */
    // Tæl hvor mange notifikationer der er i notifications tabellen //
    public function rowCountNotifications()
    {
        $result = $this->db->prepare("SELECT count(*) FROM `notifications`");
        $result->execute();
        return $notificationRows = $result->fetchColumn();
    }
    /**
     * @return mixed
     */
    // Slet alle notifikationer i notifications tabellen //
    public function deleteAllNotifications()
    {
        return $this->db->query("DELETE FROM `notifications`");
    }

    /**
     * Opdaterings Notifikationer
     * @return mixed
     */
    // Sæt en update success notifikation //
    public function setUpdateNotificationSuccess()
    {
        return $this->db->query("INSERT INTO `notifications`(`name`, `link`, `description`, `status`) VALUES ('Opdatering Succes', 'fa fa-check-circle', 'CMS er opdateret med succes. Alle filer er udpakket korrekt.', 'success')");
    }
    /**
     * @return mixed
     */
    // Sæt en update failed notifikation //
    public function setUpdateNotificationFailed()
    {
        return $this->db->query("INSERT INTO `notifications`(`name`, `link`, `description`, `status`) VALUES ('Opdatering Fejlede', 'fa fa-exclamation-triangle', 'Opdateringen fejlede. Der opstod et problem med udpakningen af filerne fra opdateringen. Prøv venligst igen!', 'danger')");
    }
    /**
     * @return mixed
     */
    // Sæt en update failed integrity notifikation //
    public function setUpdateNotificationFailedIntegrity()
    {
        return $this->db->query("INSERT INTO `notifications`(`name`, `link`, `description`, `status`) VALUES ('Opdatering Fejlede', 'fa fa-exclamation-triangle', 'Opdateringen fejlede. Der opstod et problem med vores integritet af opdateringen. Prøv venligst igen!', 'danger')");
    }

    /**
     * Besked Notifikation
     * @return mixed
     */
    // Sæt en ny besked notifikation //
    public function setMessageNotificationSuccess()
    {
        return $this->db->query("INSERT INTO `notifications`(`name`, `link`, `description`, `status`) VALUES ('Ny Besked', 'fa fa-check-circle', 'Der er modtaget en ny besked. Se den under punktet beskeder.', 'success')");
    }
    /**
     * @return mixed
     */
    // Sæt en slettet besked notifikation //
    public function setMessageDeleteNotification()
    {
        return $this->db->query("INSERT INTO `notifications`(`name`, `link`, `description`, `status`) VALUES ('Besked Slettet', 'fa fa-check-circle', 'En besked er blevet slettet.', 'success')");
    }

    /**
     * Produkt Notifikationer
     * @return mixed
     */
    // Sæt en nyt produkt notifikation //
    public function setNewProductNotificationSuccess()
    {
        return $this->db->query("INSERT INTO `notifications`(`name`, `link`, `description`, `status`) VALUES ('Nyt Produkt Oprettet', 'fa fa-check-circle', 'Der er blevet oprettet et nyt produkt. Se det under punktet produkter.', 'success')");
    }
    /**
     * @return mixed
     */
    // Sæt en slet produkt notifikation //
    public function setDeleteProductNotification()
    {
        return $this->db->query("INSERT INTO `notifications`(`name`, `link`, `description`, `status`) VALUES ('Produkt Slettet', 'fa fa-check-circle', 'Der er blevet slettet et produkt.', 'success')");
    }
    /**
     * @return mixed
     */
    // Sæt en redigeret produkt notifikation //
    public function setEditProductNotification()
    {
        return $this->db->query("INSERT INTO `notifications`(`name`, `link`, `description`, `status`) VALUES ('Produkt Redigeret', 'fa fa-check-circle', 'Der er blevet redigeret på et produkt.', 'success')");
    }

    /**
     * Bruger Notifikationer
     * @return mixed
     */
    // Sæt en ny bruger notifikation //
    public function setNewUserNotification()
    {
        return $this->db->query("INSERT INTO `notifications`(`name`, `link`, `description`, `status`) VALUES ('En Ny Bruger er Oprettet', 'fa fa-check-circle', 'Der er blevet oprettet en ny bruger på siden.', 'success')");
    }
    /**
     * @return mixed
     */
    // Sæt en redigere bruger notifikation //
    public function setEditUserNotification()
    {
        return $this->db->query("INSERT INTO `notifications`(`name`, `link`, `description`, `status`) VALUES ('En Bruger er Redigeret', 'fa fa-check-circle', 'Der er blevet redigeret i en bruger.', 'success')");
    }
    /**
     * @return mixed
     */
    // Sæt en slet bruger notifikation //
    public function setDeleteUserNotification()
    {
        return $this->db->query("INSERT INTO `notifications`(`name`, `link`, `description`, `status`) VALUES ('En Bruger er Slettet', 'fa fa-check-circle', 'Der er blevet slettet en bruger fra siden.', 'success')");
    }

    /**
     * Bruger Logind Notifikationer
     * @return mixed
     */
    // Sæt en bruger er logget ind på admin notifikation //
    public function setLoginUserNotificaitonAdminSuccess()
    {
        return $this->db->query("INSERT INTO `notifications`(`name`, `link`, `description`, `status`) VALUES ('En Bruger er logget ind', 'fa fa-check-circle', 'En bruger er logget ind på administrations panelet', 'success')");
    }
    /**
     * @return mixed
     */
    // Sæt en bruger er logget ind på frontend notifikation //
    public function setLoginUserNotificaitonFrontSuccess()
    {
        return $this->db->query("INSERT INTO `notifications`(`name`, `link`, `description`, `status`) VALUES ('En Bruger er logget ind', 'fa fa-check-circle', 'En bruger er logget ind på forsiden', 'success')");
    }

    /**
     * Nyhed / Blog Notifikationer
     * @return mixed
     */
    // Sæt en ny blog notifikation //
    public function setNewBlogNotification()
    {
        return $this->db->query("INSERT INTO `notifications`(`name`, `link`, `description`, `status`) VALUES ('Nyhed Oprettet', 'fa fa-check-circle', 'En nyhed er blevet oprettet', 'success')");
    }

    // Sæt en slet blog notifikation //
    public function setDeleteBlogNotification()
    {
        return $this->db->query("INSERT INTO `notifications`(`name`, `link`, `description`, `status`) VALUES ('Nyhed Slettet', 'fa fa-check-circle', 'En nyhed er blevet slettet', 'success')");
    }

    /**
     * Opret Kategori
     * @return mixed
     */
    // Sæt en ny kategori notifikation //
    public function setNewCategoryNotification()
    {
        return $this->db->query("INSERT INTO `notifications`(`name`, `link`, `description`, `status`) VALUES ('Kategori Oprettet', 'fa fa-check-circle', 'En ny kategori er blevet oprettet', 'success')");
    }

    // Sæt en slet kategori notifikation //
    public function setDeleteCategoryNotification()
    {
        return $this->db->query("INSERT INTO `notifications`(`name`, `link`, `description`, `status`) VALUES ('Kategori Slettet', 'fa fa-check-circle', 'En kategori er blevet slettet', 'success')");
    }

    // Sæt en redigere blog notifikationer //
    public function setEditBlogNotification()
    {
        return $this->db->query("INSERT INTO `notifications`(`name`, `link`, `description`, `status`) VALUES ('Kategori Redigeret', 'fa fa-check-circle', 'En kategori er blevet redigeret', 'success')");
    }

    /**
     * Tag Notifikationer
     * @return mixed
     */
    // Sæt rediger tag notifikation //
    public function setEditTagNotification()
    {
        return $this->db->query("INSERT INTO `notifications`(`name`, `link`, `description`, `status`) VALUES ('Tag Redigeret', 'fa fa-check-circle', 'Et tag er blevet redigeret', 'success')");
    }

    // Sæt nyt tag notifikation //
    public function setNewTagNotification()
    {
        return $this->db->query("INSERT INTO `notifications`(`name`, `link`, `description`, `status`) VALUES ('Tag Oprettet', 'fa fa-check-circle', 'Et nyt tag er blevet oprettet', 'success')");
    }

    // Sæt slet tag notifikation //
    public function setDeleteTagNotification()
    {
        return $this->db->query("INSERT INTO `notifications`(`name`, `link`, `description`, `status`) VALUES ('Tag Slettet', 'fa fa-check-circle', 'Et tag er blevet slettet', 'success')");
    }

    /**
     * Kommentar Notifikationer
     * @return mixed
     */
    // Sæt nyt kommentar notifikation //
    public function setNewCommentNotification()
    {
        return $this->db->query("INSERT INTO `notifications`(`name`, `link`, `description`, `status`) VALUES ('Ny Kommentar', 'fa fa-check-circle', 'Der er blevet skrevet en ny kommentar', 'success')");
    }
    // Sæt slet kommentar notifikation
    public function setDeleteCommentNotification()
    {
        return $this->db->query("INSERT INTO `notifications`(`name`, `link`, `description`, `status`) VALUES ('Kommentar Slettet', 'fa fa-check-circle', 'En kommentar er blevet slettet', 'success')");
    }
}