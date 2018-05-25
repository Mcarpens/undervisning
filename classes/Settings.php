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

    public function updateSettings($post, $files)
    {
        $newfile = $files;
        if (!empty($newfile)) {
            $this->db->query("UPDATE `settings` SET `site_name`=:site_name,`address`=:address,`city`=:city,`country`=:country,`phone`=:phone,`email`=:email,`footer_description`=:footer_description, `fk_theme`=:theme, `footer_logo`=:footer_logo 
                          WHERE id = :id",
                [
                    ':id' => $post['id'],
                    ':site_name' => $post['site_name'],
                    ':address' => $post['address'],
                    ':city' => $post['city'],
                    ':country' => $post['country'],
                    ':phone' => $post['phone'],
                    ':email' => $post['email'],
                    ':footer_description' => $post['footer_description'],
                    ':theme' => $post['theme'],
                    ':footer_logo' => $newfile
                ]);
        } else {
            $this->db->query("UPDATE `settings` SET `site_name`=:site_name,`address`=:address,`city`=:city,`country`=:country,`phone`=:phone,`email`=:email,`footer_description`=:footer_description, `fk_theme`=:theme
                          WHERE id = :id",
                [
                    ':id' => $post['id'],
                    ':site_name' => $post['site_name'],
                    ':address' => $post['address'],
                    ':city' => $post['city'],
                    ':country' => $post['country'],
                    ':phone' => $post['phone'],
                    ':email' => $post['email'],
                    ':footer_description' => $post['footer_description'],
                    ':theme' => $post['theme']
                ]);
        }
        return true;
    }

    public function getAllWebshopSettings()
    {
        return $this->db->toList("SELECT * FROM `shop_settings`");
    }

    public function getThemes()
    {
        return $this->db->toList("SELECT * FROM `admin_theme`");
    }

    public function getOneTheme($id)
    {
        return $this->db->single("SELECT * FROM `admin_theme` WHERE id = :id", [':id' => $id]);
    }

    public function getAllWebshopSettingsMoreInfo()
    {
        return $this->db->toList("SELECT * FROM `shop_settings_more_info` ORDER BY id ASC LIMIT 4");
    }

    public function getOneWebshopSettingsMoreInfo($id)
    {
        return $this->db->toList("SELECT * FROM `shop_settings_more_info` WHERE id = :id", [':id' => $id]);
    }

    public function updateWebshopSettings($post, $files)
    {
        $newfile = $files;
        if ($post['shop_online'] == 0) {
            $this->db->query("UPDATE `shop_settings` SET `shop_online`=:online WHERE id = :id ",
                [
                    ':id' => $post['id'],
                    ':online' => $post['shop_online'],
                ]
            );
        } else if(!empty($newfile)){
            $this->db->query("UPDATE `shop_settings` SET `shop_nav_title`=:title, `shop_nav_subtitle`=:subtitle, `shop_brand_logo`=:logo, `shop_brand_logo_link`=:link, `shop_textarea`=:description, `shop_online`=:online, `paypal_url`=:paypal_url, `paypal_id`=:paypal_id WHERE id = :id",
                [
                    ':id' => $post['id'],
                    ':title' => $post['shop_nav_title'],
                    ':subtitle' => $post['shop_nav_subtitle'],
                    ':logo' => $newfile,
                    ':link' => $post['brand_logo_link'],
                    ':description' => $post['shop_textarea'],
                    ':online' => $post['shop_online'],
                    ':paypal_url' => $post['paypal_url'],
                    ':paypal_id' => $post['paypal_id']
                ]
            );
        } else if(empty($newfile)){
            $this->db->query("UPDATE `shop_settings` SET `shop_nav_title`=:title, `shop_nav_subtitle`=:subtitle, `shop_brand_logo_link`=:link, `shop_textarea`=:description, `shop_online`=:online, `paypal_url`=:paypal_url, `paypal_id`=:paypal_id WHERE id = :id ",
                [
                    ':id' => $post['id'],
                    ':title' => $post['shop_nav_title'],
                    ':subtitle' => $post['shop_nav_subtitle'],
                    ':description' => $post['shop_textarea'],
                    ':online' => $post['shop_online'],
                    ':link' => $post['brand_logo_link'],
                    ':paypal_url' => $post['paypal_url'],
                    ':paypal_id' => $post['paypal_id']
                ]
            );
        } else {
            $this->db->query("UPDATE `shop_settings` SET `shop_online`=:online WHERE id = :id ",
                [
                    ':id' => $post['id'],
                    ':online' => $post['shop_online'],
                ]
            );
        } return true;
    }

    public function updateWebshopMoreInfo($post)
    {
        return $this->db->query("UPDATE `shop_settings_more_info` SET `icon`=:icon, `title`=:title, `description`=:description WHERE id = :id",
            [
                ':id' => $post['id'],
                ':icon' => $post['icon'],
                ':title' => $post['title'],
                ':description' => $post['description']
            ]
        );
    }

    /**
     * @return mixed
     */
    public function rowCountWebshopMoreInfo()
    {
        $result = $this->db->prepare("SELECT count(*) FROM `shop_settings_more_info`");
        $result->execute();
        return $notificationRows = $result->fetchColumn();
    }

}
