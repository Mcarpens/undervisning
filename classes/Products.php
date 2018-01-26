<?php

class Products extends \PDO
{
    private $db = null;

    public function __construct($db)
    {
        $this->db = $db;
    }

    // Generer en tilfældig nøgle udfra nogle parameter, som er angivet forneden.
    // Dette bruges til vores produkt nummer i metoden newProducts.
    private function generateRandomString($length = 10) {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function newProducts($post)
    {
        $image = mediaImageUploader('filUpload');
        // Her gøres brug af vores tilfældigt generet produktnøgle, som nu er sæt til kun at være 6 karaktere lang.
        $randomString = $this->generateRandomString(6);
        if (!empty($image['name'])) {
            $this->db->query("INSERT INTO products (name, price, product_number, description, image) 
                             VALUES (:name, :price, :product_number, :description, :image)",
                [
                    ':name' => $post['name'],
                    ':price' => $post['price'],
                    ':product_number' => $randomString,
                    ':description' => $post['description'],
                    ':image' => $image['name']
                ]
            );
        } else {
            $this->db->query("INSERT INTO products (name, price, product_number, description) 
                             VALUES (:name, :price, :product_number, :description)",
                [
                    ':name' => $post['name'],
                    ':price' => $post['price'],
                    ':product_number' => $randomString,
                    ':description' => $post['description']
                ]
            );
        }
        return true;
    }

    public function singleProduct($id)
    {
        return $this->db->single("SELECT * FROM products WHERE id = :id", [':id' => $id]);
    }

    public function allProducts()
    {
        return $this->db->toList("SELECT * FROM products");

    }

    public function searchProduct($post)
    {
        return $this->db->toList("SELECT * FROM products WHERE `name` LIKE CONCAT ('%',:searchName,'%')", [':searchName' => $post]);
    }

    public function deleteProduct($id)
    {
        return $this->db->query("DELETE FROM products WHERE id = :id", [':id' => $id]);
    }

    public function editProduct($post)
    {
        $image = mediaImageUploader('filUpload');
        if (!empty($image['name'])) {
            $this->db->query("UPDATE `products` SET `name`=:name,`price`=:price,`description`=:description, `image`=:image 
                          WHERE id = :id",
                [
                    ':id' => $post['id'],
                    ':name' => $post['name'],
                    ':price' => $post['price'],
                    ':description' => $post['description'],
                    ':image' => $image['name']
                ]);
        } else {
            $this->db->query("UPDATE `products` SET `name`=:name,`price`=:price,`description`=:description 
                          WHERE id = :id",
                [
                    ':id' => $post['id'],
                    ':name' => $post['name'],
                    ':price' => $post['price'],
                    ':description' => $post['description']
                ]);
        }
        return true;
    }

    public function rowCountProducts()
    {
        $result = $this->db->prepare("SELECT count(*) FROM `products`");
        $result->execute();
        return $notificationRows = $result->fetchColumn();
    }
}







