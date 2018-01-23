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
     * Blogs
     * @return mixed
     */
    public function getAllBlogs()
    {
        return $this->db->toList("SELECT * FROM `blogs`");
    }

    public function singleBlog($id)
    {
        return $this->db->single("SELECT * FROM `blogs` WHERE id = :id",
            [
                ':id' => $id
            ]
        );
    }

    public function deleteBlog($id)
    {
        return $this->db->query("DELETE FROM `blogs` WHERE id = :id", [':id' => $id]);
    }

    public function editBlog($post)
    {
        $images = mediaImageUploader('filUpload');
        if(!empty($images['name'])) {
            $this->db->query("UPDATE `blogs` SET `title`=:title,`images`=:images,`text`=:text,`fk_author`=:fk_author,`fk_category`=:fk_category,`fk_tags`=:fk_tags WHERE id = :id",
                [
                    ':id' => $post['id'],
                    ':title' => $post['title'],
                    ':images' => $images['name'],
                    ':text' => $post['text'],
                    ':fk_author' => $post['author'],
                    ':fk_category' => $post['category'],
                    ':fk_tags' => $post['tags']
                ]
            );
        } else {
            $this->db->query("UPDATE `blogs` SET `title`=:title,`text`=:text,`fk_author`=:fk_author,`fk_category`=:fk_category,`fk_tags`=:fk_tags WHERE id = :id",
                [
                    ':id' => $post['id'],
                    ':title' => $post['title'],
                    ':text' => $post['text'],
                    ':fk_author' => $post['author'],
                    ':fk_category' => $post['category'],
                    ':fk_tags' => $post['tags']
                ]
            );
        }
        return true;
    }

    public function newBlog($post)
    {
        $images = mediaImageUploader('images');
        if(!empty($images['name'])) {
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
     * Blog - Kategori
     * @return mixed
     */
    public function getAllCategory()
    {
        return $this->db->toList("SELECT * FROM `blog_categories`");
    }

    public function getCategory($id)
    {
        return $this->db->single("SELECT * FROM `blog_categories` WHERE id = :id",
            [
                ':id' => $id
            ]
        );
    }

    public function newCategory($post)
    {
        return $this->db->query("INSERT INTO `blog_categories` (`name`) VALUES (:name)",
            [
                ':name' => $post['name']
            ]
        );
    }

    public function deleteCategory($id)
    {
        return $this->db->query("DELETE FROM `blog_categories` WHERE id = :id", [':id' => $id]);
    }

    public function editCategory($post)
    {
        return $this->db->query("UPDATE `blog_categories` SET `name`=:name WHERE id = :id",
            [
                ':id' => $post['id'],
                ':name' => $post['name']
            ]
        );
    }

    /**
     * Blog - Tags
     * @return mixed
     */

    public function getAllTags()
    {
        return $this->db->toList("SELECT * FROM `blog_tags`");
    }

    public function getTags($id)
    {
        return $this->db->single("SELECT * FROM `blog_tags` WHERE id = :id",
            [
                ':id' => $id
            ]
        );
    }

    public function editTag($post)
    {
        return $this->db->query("UPDATE `blog_tags` SET `name`=:name WHERE id = :id",
            [
                ':id' => $post['id'],
                ':name' => $post['name']
            ]);
    }

    public function newTag($post)
    {
        return $this->db->query("INSERT INTO `blog_tags` (`name`) VALUES (:name)",
            [
                ':name' => $post['name']
            ]
        );
    }

    public function deleteTag($id)
    {
        return $this->db->query("DELETE FROM `blog_tags` WHERE id = :id", [':id' => $id]);
    }

}