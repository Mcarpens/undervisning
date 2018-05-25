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
        return $this->db->query("INSERT INTO `notifications`(`name`, `link`, `description`, `status`) VALUES ('Opdatering Succes', 'ti-check', 'CMS er opdateret med succes. Alle filer er udpakket korrekt.', 'success')");
    }
    /**
     * @return mixed
     */
    // Sæt en update failed notifikation //
    public function setUpdateNotificationFailed()
    {
        return $this->db->query("INSERT INTO `notifications`(`name`, `link`, `description`, `status`) VALUES ('Opdatering Fejlede', 'ti-na', 'Opdateringen fejlede. Der opstod et problem med udpakningen af filerne fra opdateringen. Prøv venligst igen!', 'danger')");
    }
    /**
     * @return mixed
     */
    // Sæt en update failed integrity notifikation //
    public function setUpdateNotificationFailedIntegrity()
    {
        return $this->db->query("INSERT INTO `notifications`(`name`, `link`, `description`, `status`) VALUES ('Opdatering Fejlede', 'ti-na', 'Opdateringen fejlede. Der opstod et problem med vores integritet af opdateringen. Prøv venligst igen!', 'danger')");
    }

    /**
     * Besked Notifikation
     * @return mixed
     */
    // Sæt en ny besked notifikation //
    public function setMessageNotificationSuccess()
    {
        return $this->db->query("INSERT INTO `notifications`(`name`, `link`, `description`, `status`) VALUES ('Ny Besked', 'ti-email', 'Der er modtaget en ny besked. Se den under punktet beskeder.', 'success')");
    }
    /**
     * @return mixed
     */
    // Sæt en slettet besked notifikation //
    public function setMessageDeleteNotification()
    {
        return $this->db->query("INSERT INTO `notifications`(`name`, `link`, `description`, `status`) VALUES ('Besked Slettet', 'ti-check', 'En besked er blevet slettet.', 'success')");
    }

    /**
     * Produkt Notifikationer
     * @return mixed
     */
    // Sæt en nyt produkt notifikation //
    public function setNewProductNotificationSuccess()
    {
        return $this->db->query("INSERT INTO `notifications`(`name`, `link`, `description`, `status`) VALUES ('Nyt Produkt Oprettet', 'ti-check', 'Der er blevet oprettet et nyt produkt. Se det under punktet produkter.', 'success')");
    }
    /**
     * @return mixed
     */
    // Sæt en slet produkt notifikation //
    public function setDeleteProductNotification()
    {
        return $this->db->query("INSERT INTO `notifications`(`name`, `link`, `description`, `status`) VALUES ('Produkt Slettet', 'ti-check', 'Der er blevet slettet et produkt.', 'success')");
    }
    /**
     * @return mixed
     */
    // Sæt en redigeret produkt notifikation //
    public function setEditProductNotification()
    {
        return $this->db->query("INSERT INTO `notifications`(`name`, `link`, `description`, `status`) VALUES ('Produkt Redigeret', 'ti-check', 'Der er blevet redigeret på et produkt.', 'success')");
    }

    /**
     * Bruger Notifikationer
     * @return mixed
     */
    // Sæt en ny bruger notifikation //
    public function setNewUserNotification()
    {
        return $this->db->query("INSERT INTO `notifications`(`name`, `link`, `description`, `status`) VALUES ('En Ny Bruger er Oprettet', 'ti-check', 'Der er blevet oprettet en ny bruger på siden.', 'success')");
    }
    /**
     * @return mixed
     */
    // Sæt en redigere bruger notifikation //
    public function setEditUserNotification()
    {
        return $this->db->query("INSERT INTO `notifications`(`name`, `link`, `description`, `status`) VALUES ('En Bruger er Redigeret', 'ti-check', 'Der er blevet redigeret i en bruger.', 'success')");
    }
    /**
     * @return mixed
     */
    // Sæt en slet bruger notifikation //
    public function setDeleteUserNotification()
    {
        return $this->db->query("INSERT INTO `notifications`(`name`, `link`, `description`, `status`) VALUES ('En Bruger er Slettet', 'ti-check', 'Der er blevet slettet en bruger fra siden.', 'success')");
    }

    /**
     * Bruger Logind Notifikationer
     * @return mixed
     */
    // Sæt en bruger er logget ind på admin notifikation //
    public function setLoginUserNotificaitonAdminSuccess()
    {
        return $this->db->query("INSERT INTO `notifications`(`name`, `link`, `description`, `status`) VALUES ('En Bruger er logget ind', 'ti-check', 'En bruger er logget ind på administrations panelet', 'success')");
    }
    /**
     * @return mixed
     */
    // Sæt en bruger er logget ind på frontend notifikation //
    public function setLoginUserNotificaitonFrontSuccess()
    {
        return $this->db->query("INSERT INTO `notifications`(`name`, `link`, `description`, `status`) VALUES ('En Bruger er logget ind', 'ti-check', 'En bruger er logget ind på forsiden', 'success')");
    }

    /**
     * Nyhed / Blog Notifikationer
     * @return mixed
     */
    // Sæt en ny blog notifikation //
    public function setNewBlogNotification()
    {
        return $this->db->query("INSERT INTO `notifications`(`name`, `link`, `description`, `status`) VALUES ('Nyhed Oprettet', 'ti-check', 'En nyhed er blevet oprettet', 'success')");
    }

    // Sæt en slet blog notifikation //
    public function setDeleteBlogNotification()
    {
        return $this->db->query("INSERT INTO `notifications`(`name`, `link`, `description`, `status`) VALUES ('Nyhed Slettet', 'ti-check', 'En nyhed er blevet slettet', 'success')");
    }

    /**
     * Opret Kategori
     * @return mixed
     */
    // Sæt en ny kategori notifikation //
    public function setNewCategoryNotification()
    {
        return $this->db->query("INSERT INTO `notifications`(`name`, `link`, `description`, `status`) VALUES ('Kategori Oprettet', 'ti-check', 'En ny kategori er blevet oprettet', 'success')");
    }

    // Sæt en slet kategori notifikation //
    public function setDeleteCategoryNotification()
    {
        return $this->db->query("INSERT INTO `notifications`(`name`, `link`, `description`, `status`) VALUES ('Kategori Slettet', 'ti-check', 'En kategori er blevet slettet', 'success')");
    }

    // Sæt en redigere blog notifikationer //
    public function setEditBlogNotification()
    {
        return $this->db->query("INSERT INTO `notifications`(`name`, `link`, `description`, `status`) VALUES ('Kategori Redigeret', 'ti-check', 'En kategori er blevet redigeret', 'success')");
    }

    /**
     * Tag Notifikationer
     * @return mixed
     */
    // Sæt rediger tag notifikation //
    public function setEditTagNotification()
    {
        return $this->db->query("INSERT INTO `notifications`(`name`, `link`, `description`, `status`) VALUES ('Tag Redigeret', 'ti-check', 'Et tag er blevet redigeret', 'success')");
    }

    // Sæt nyt tag notifikation //
    public function setNewTagNotification()
    {
        return $this->db->query("INSERT INTO `notifications`(`name`, `link`, `description`, `status`) VALUES ('Tag Oprettet', 'ti-check', 'Et nyt tag er blevet oprettet', 'success')");
    }

    // Sæt slet tag notifikation //
    public function setDeleteTagNotification()
    {
        return $this->db->query("INSERT INTO `notifications`(`name`, `link`, `description`, `status`) VALUES ('Tag Slettet', 'ti-check', 'Et tag er blevet slettet', 'success')");
    }

    /**
     * Kommentar Notifikationer
     * @return mixed
     */
    // Sæt nyt kommentar notifikation //
    public function setNewCommentNotification()
    {
        return $this->db->query("INSERT INTO `notifications`(`name`, `link`, `description`, `status`) VALUES ('Ny Kommentar', 'ti-comment', 'Der er blevet skrevet en ny kommentar', 'success')");
    }
    // Sæt slet kommentar notifikation
    public function setDeleteCommentNotification()
    {
        return $this->db->query("INSERT INTO `notifications`(`name`, `link`, `description`, `status`) VALUES ('Kommentar Slettet', 'ti-check', 'En kommentar er blevet slettet', 'success')");
    }

    /**
     * Side Indstillinger Notifikationer
     * @return mixed
     */
    public function setUpdateSettingsNotificationSuccess()
    {
        return $this->db->query("INSERT INTO `notifications`(`name`, `link`, `description`, `status`) VALUES ('Indstillinger er Redigeret', 'ti-check', 'Sidens indstillinger er blevet redigeret', 'success')");
    }
}