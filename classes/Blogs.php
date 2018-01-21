<?php
/**
 * Created by PhpStorm.
 * User: mcarp
 * Date: 21-01-2018
 * Time: 13:04
 */

class Blogs extends \PDO
{
    private $db = null;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getAllBlogs()
    {
        return $this->db->toList("SELECT * FROM `blogs`");
    }

    public function singleBlog($id)
    {
        return $this->db->single("SELECT * FROM `blogs` WHERE blogs.id = :id",
            [
                ':id' => $id
            ]
        );
    }

    public function getCategory($id)
    {
        return $this->db->single("SELECT * FROM `blog_categories` WHERE id = :id",
            [
                ':id' => $id
            ]
        );
    }

    public function getTags($id)
    {
        return $this->db->single("SELECT * FROM `blog_tags` WHERE id = :id",
            [
                ':id' => $id
            ]
        );
    }

    public function getAllTags()
    {
        return $this->db->toList("SELECT * FROM `blog_tags`");
    }
}