<?php
/**
 * Created by PhpStorm.
 * User: mcarp
 * Date: 24-01-2018
 * Time: 10:32
 */

class Comments extends \PDO
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
    public function __construct($db)
    {
        $this->db = $db;
    }

    // Opret en ny kommentar i comments tabellen udfra post dataen fra formen //
    public function newComment($post)
    {
        // Hvis logget ind, læg bruger id'et ind i rækken fk_user //
        if (isset($_SESSION['user_id'])) {
            $this->db->query("INSERT INTO `comments` (`text`,`fk_blog`, `fk_user`) VALUES (:text,:fk_blog,:fk_user)",
                [
                    ':text' => $post['text'],
                    ':fk_blog' => $post['fk_blog'],
                    ':fk_user' => $post['fk_user']
                ]
            );
            // Hvis ikke logget ind, læg navnet ind i rækken name //
        } else {
            $this->db->query("INSERT INTO `comments` (`name`, `fk_blog`, `text`) VALUES (:name,:fk_blog,:text)",
                [
                    ':name' => $post['name'],
                    ':fk_blog' => $post['fk_blog'],
                    ':text' => $post['text']
                ]
            );
            // Returnere resultatet fra metoden hvis er sandt //
        } return true;
    }

    // Hent alle kommentarer fra comments tabellen //
    public function getAllComments()
    {
        return $this->db->toList("SELECT * FROM `comments` ORDER BY timestamp desc ");
    }

//    public function rowCountCommentsFromBlog($id)
//    {
//        $result = $this->db->query("SELECT count(*) FROM `comments` WHERE fk_blog = :id",
//            [
//                ':id' => $id
//            ]
//        );
//        $result->execute();
//        var_dump($result);
//        return $result;
//    }

    public function deleteComment($id)
    {
        return $this->db->query("DELETE FROM `comments` WHERE id = :id", [':id' => $id]);
    }

    // Hent antallet af kommentare der er i tabellen //
    public function rowCountComments()
    {
        $result = $this->db->prepare("SELECT count(*) FROM `comments`");
        $result->execute();
        return $notificationRows = $result->fetchColumn();
    }
}