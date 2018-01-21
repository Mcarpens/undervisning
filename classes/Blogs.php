<?php
/**
 * Created by PhpStorm.
 * User: mcarp
 * Date: 21-01-2018
 * Time: 13:04
 */

class Blogs extends \PDO
{
    /**
     * @var null
     */
    private $db = null;

    /**
     * Blogs constructor.
     * @param $db
     */
    public function __construct($db)
    {
        $this->db = $db;
    }

    /**
     * Hent alle blogs
     * @return mixed
     */
    public function getAllBlogs()
    {
        return $this->db->toList("SELECT * FROM `blogs`");
    }

    /**
     * Blog Slet
     * @param $id
     * @return mixed
     */
    public function singleBlog($id)
    {
        return $this->db->single("SELECT * FROM `blogs` WHERE blogs.id = :id",
            [
                ':id' => $id
            ]
        );
    }

    /**
     * Blog Slet
     * @param $id
     * @return mixed
     */
    public function deleteBlog($id)
    {
        return $this->db->query("DELETE FROM `blogs` WHERE id = :id", [':id' => $id]);
    }

    /**
     * Opret Blog
     * @param $post
     * @return mixed
     */
    public function newBlog($post)
    {
        $images = mediaImageUploader('images');
        if(!empty($image['name'])) {
            $this->db->query("INSERT INTO `blogs`(`title`, `images`, `text`, `fk_author`, `fk_category`, `fk_tags`) VALUES (:title, :images, :text, :fk_author, :fk_category, :fk_tags)",
                [
                    ':title' => $post['title'],
                    ':images' => $images['name'],
                    ':text' => $post['text'],
                    ':fk_author' => $post['author'],
                    ':fk_category' => $post['category'],
                    ':fk_tags' => $post['tags']
                ]
            );
        } else {
            $this->db->query("INSERT INTO `blogs`(`title`, `images`, `text`, `fk_author`, `fk_category`, `fk_tags`) VALUES (:title, :images, :text, :fk_author, :fk_category, :fk_tags)",
                [
                    ':title' => $post['title'],
                    ':images' => $images['name'],
                    ':text' => $post['text'],
                    ':fk_author' => $post['author'],
                    ':fk_category' => $post['category'],
                    ':fk_tags' => $post['tags']
                ]
            );
        }
        return true;
    }

    /**
     * Blog Kategori
     * @param $id
     * @return mixed
     */
    public function getCategory($id)
    {
        return $this->db->single("SELECT * FROM `blog_categories` WHERE id = :id",
            [
                ':id' => $id
            ]
        );
    }

    public function getAllCategory()
    {
        return $this->db->toList("SELECT * FROM `blog_categories`");
    }

    /**
     * Blog Tags
     * @param $id
     * @return mixed
     */
    public function getTags($id)
    {
        return $this->db->single("SELECT * FROM `blog_tags` WHERE id = :id",
            [
                ':id' => $id
            ]
        );
    }

    /**
     * Hent alle blog tags
     * @return mixed
     */
    public function getAllTags()
    {
        return $this->db->toList("SELECT * FROM `blog_tags`");
    }
}