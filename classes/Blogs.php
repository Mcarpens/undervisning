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
     * DB er sat på forhånd, derfor null
     * @var null
     */
    private $db = null;

    /**
     * Blogs constructor.
     * Nødvendig for database håndtering
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

    // Hent alle elementer i blogs //
    public function getAllBlogs()
    {
        return $this->db->toList("SELECT * FROM `blogs`");
    }

    // Hent kun et element i blogs udfra ID'et //
    public function singleBlog($id)
    {
        return $this->db->single("SELECT * FROM `blogs` WHERE id = :id",
            [
                ':id' => $id
            ]
        );
    }

    // Slet et element i blogs udfra ID'et //
    public function deleteBlog($id)
    {
        return $this->db->query("DELETE FROM `blogs` WHERE id = :id", [':id' => $id]);
    }

    // Rediger et element i blogs udfra ID'et med post data //
    public function editBlog($post)
    {
        // Indsæt et billede hvis der er uploadet et //
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
        // Indsæt ikke et billede hvis det ikke er uploadet //
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
        // Returnere det, hvis alt gik vel //
        return true;
    }

    // Opret et nyt blog element i tabellen blogs, med de angivet post data fra formen //
    public function newBlog($post)
    {
        // Indsæt et billede hvis der er uploadet et //
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
            // Indsæt ikke et billede hvis det ikke er uploadet //
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
        // Returnere det, hvis alt gik vel //
        return true;
    }

    /**
     * Blog - Kategori
     * @return mixed
     */
    // Hent alle kategorier fra blog_categories tabellen //
    public function getAllCategory()
    {
        return $this->db->toList("SELECT * FROM `blog_categories`");
    }

    // Hent kun en kategori fra blog_categories tabellen udfra ID'et //
    public function getCategory($id)
    {
        return $this->db->single("SELECT * FROM `blog_categories` WHERE id = :id",
            [
                ':id' => $id
            ]
        );
    }

    // Opret en ny kategori i blog_categories tabellen med post data fra formen //
    public function newCategory($post)
    {
        return $this->db->query("INSERT INTO `blog_categories` (`name`) VALUES (:name)",
            [
                ':name' => $post['name']
            ]
        );
    }

    // Slet en kategori fra blog_categories tabellen udfra ID'et //
    public function deleteCategory($id)
    {
        return $this->db->query("DELETE FROM `blog_categories` WHERE id = :id", [':id' => $id]);
    }

    // Rediger en kategori fra blog_categories tabellen udfra post dataen fra formen //
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

    // Hent alle tags fra blog_tags tabellen //
    public function getAllTags()
    {
        return $this->db->toList("SELECT * FROM `blog_tags`");
    }

    // Hent et tag fra blog_tags tabellen udfra ID'et //
    public function getTags($id)
    {
        return $this->db->single("SELECT * FROM `blog_tags` WHERE id = :id",
            [
                ':id' => $id
            ]
        );
    }

    // Rediger tagget fra blog_tags tabellen udfra Post dataen i formen //
    public function editTag($post)
    {
        return $this->db->query("UPDATE `blog_tags` SET `name`=:name WHERE id = :id",
            [
                ':id' => $post['id'],
                ':name' => $post['name']
            ]);
    }

    // Opret et nyt tag i blog_tags tabellen udfra post dataen i formen //
    public function newTag($post)
    {
        return $this->db->query("INSERT INTO `blog_tags` (`name`) VALUES (:name)",
            [
                ':name' => $post['name']
            ]
        );
    }

    // Slet et tag fra blog_tags tabellen udfra ID'et //
    public function deleteTag($id)
    {
        return $this->db->query("DELETE FROM `blog_tags` WHERE id = :id", [':id' => $id]);
    }

}