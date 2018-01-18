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

    public function getAllMenu()
    {
        return $this->db->toList("SELECT * FROM `menu`");
    }

    public function getAllAdminMenu()
    {
        return $this->db->toList("SELECT * FROM `admin_menu`");
    }

//    Kommenteret ud, da vi ikke skal bruge denne metode lige nu!

    public function getAllSettings()
    {
        return $this->db->toList("SELECT * FROM `settings`");
    }

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
        return $this->db->query("DELETE FROM notifications WHERE id = :id", [':id' => $id]);
    }

    public function setUpdateNotification($post)
    {
        try
        {
            $this->db->query("INSERT INTO `notifications`(`name`, `link`, `description`, `status`,) VALUES (:name, :link, :description, :status)",
             [
                 ':name' => $post['name'],
                 ':link' => $post['link'],
                 ':description' => $post['description'],
                 ':status' => $post['status']
             ]);

            return true;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
            return false;
        }
    }
}
