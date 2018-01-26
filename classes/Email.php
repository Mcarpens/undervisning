<?php
/**
 * Created by PhpStorm.
 * User: mcarp
 * Date: 12-01-2018
 * Time: 10:59
 */

class Email extends \PDO {

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

    // Validere vores kontakt formular udfra post dataen fra formen //
    public function validateContact($postInfo) {
        $error = [];
        foreach($postInfo as $key => $value) {
            if($value == "" && $key !== 'btn_send') {
                $keyValue = ucfirst($key);
                $error[$key] = '<br>
                            <div class="alert alert-danger alert-dismissible" id="myAlert">
                            <a href="#" class="close">&times;</a>
                            <i class="glyphicon glyphicon-warning-sign"></i>
                            Udfyld venligst '.$keyValue.'
                            </div>';
            }
        }
        // returnere en fejl, hvis valideringen fejlede //
        return $error;
    }

    // Læg beskeden ind i messages tabellen, udfra post dataen fra formen //
    public function sendMail($postInfo)
    {
        try
        {

            $this->db->query("INSERT INTO messages (name, email, message) 
                                VALUES (:name, :email, :message)",
                [
                    ':name' => $postInfo['navn'],
                    ':email' => $postInfo['email'],
                    ':message' => $postInfo['besked']
                ]);
            // Returnere vores data, hvis alt gik vel //
            return true;
        }
        // Ellers returnere en PDO fejl //
        catch(PDOException $e)
        {
            echo $e->getMessage();
            return false;
        }
    }

    // Hent alle emails fra messages i tabellen //
    public function getAllEmails() {
        return $this->db->toList('SELECT * FROM `messages` ORDER BY `id` DESC');
    }

    // Slet en email fra messages i tabellen, udfra ID'et //
    public function deleteEmail($id)
    {
        return $this->db->query("DELETE FROM `messages` WHERE id = :id", [':id' => $id]);
    }

    // Hent seneste emails fra messages i tabellen, KUN 3 EMAILS, NYESTE FØRST //
    public function getLatestEmail()
    {
        return $this->db->toList("SELECT * FROM `messages` ORDER BY `id` DESC LIMIT 3");
    }

    // Hent kun en email fra messages tabellen, udfra ID'et //
    public function singleEmail($id)
    {
        return $this->db->single("SELECT * FROM `messages` WHERE id = :id", [':id' => $id]);
    }

    // Tæl hvor mange emails der er i messages tabellen //
    public function rowCountEmail()
    {
        $result = $this->db->prepare("SELECT count(*) FROM `messages`");
        $result->execute();
        return $emailRows = $result->fetchColumn();
    }

}