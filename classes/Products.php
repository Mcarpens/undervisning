<?php

class Products extends \PDO
{
    /**
     * @var null
     */
    private $db = null;

    /**
     * Products constructor.
     * @param $db
     */
    public function __construct($db)
    {
        $this->db = $db;
    }

    // Generer en tilfældig nøgle udfra nogle parameter, som er angivet forneden.
    // Dette bruges til vores produkt nummer i metoden newProducts.
    /**
     * @param int $length
     * @return string
     */
    private function generateRandomString($length = 10) {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    /**
     * @param $post
     * @return mixed
     */
    public function newProducts($post, $files)
    {
        $newfile = $files;
        // Her gøres brug af vores tilfældigt generet produktnøgle, som nu er sæt til kun at være 6 karaktere lang.
        $randomString = $this->generateRandomString(6);
        return !empty($newfile) ? $this->db->lastId("INSERT INTO products (name, price, product_number, short_description, description, image, height, length, on_sale, sale_price, sale_text, stock)
                             VALUES (:name, :price, :product_number, :short_description, :description, :image, :height, :length, :on_sale, :sale_price, :sale_text, :stock)",
            [
                ':name' => $post['name'],
                ':price' => $post['price'],
                ':product_number' => $randomString,
                ':short_description' => $post['short_description'],
                ':description' => $post['description'],
                ':image' => $newfile,
                ':height' => $post['height'],
                ':length' => $post['length'],
                ':on_sale' => $post['on_sale'],
                ':sale_price' => $post['sale_price'],
                ':sale_text' => $post['sale_text'],
                ':stock' => $post['stock']
            ]
        ) : $this->db->lastId("INSERT INTO products (name, price, product_number, short_description, description, height, length, on_sale, sale_price, sale_text, stock) 
                             VALUES (:name, :price, :product_number, :short_description, :description, :height, :length, :on_sale, :sale_price, :sale_text, :stock)",
            [
                ':name' => $post['name'],
                ':price' => $post['price'],
                ':product_number' => $randomString,
                ':short_description' => $post['short_description'],
                ':description' => $post['description'],
                ':height' => $post['height'],
                ':length' => $post['length'],
                ':on_sale' => $post['on_sale'],
                ':sale_price' => $post['sale_price'],
                ':sale_text' => $post['sale_text'],
                ':stock' => $post['stock']
            ]
        );
    }

    /**
     * @param $productId
     * @param $colors
     * @return bool
     */
    public function insertColors($productId, $colors)
    {
        foreach($colors as $color) {
            $this->db->query("INSERT INTO product_colors (product_id, color_id) VALUES (:product, :color)",
                [
                    ':product' => $productId,
                    ':color' => $color
                ]
            );
        }
        return true;
    }

    /**
     * @param $productId
     * @param $colors
     * @return bool
     */
    public function updateColors($productId, $colors)
    {
        foreach($colors as $color) {
            $this->db->prepare("UPDATE product_colors SET `product_id`=:product, `color_id`=:color WHERE product_id = :id",
                [
                    ':product' => $productId,
                    ':color' => $color
                ]
            );
        }
        return true;
    }

    public function insertSizes($productId, $sizes)
    {
        foreach($sizes as $size) {
            $this->db->query("INSERT INTO product_sizes (product_id, size_id) VALUES (:product, :size)",
                [
                    ':product' => $productId,
                    ':size' => $size
                ]
            );
        }
        return true;
    }

    /**
     * @param $productId
     * @param $sizes
     * @return bool
     */
    public function updateSizes($productId, $sizes)
    {
        foreach($sizes as $size) {
            $this->db->prepare("UPDATE product_sizes SET `product_id`=:product, `size_id`=:size WHERE product_id = :id",
                [
                    ':product' => $productId,
                    ':size' => $size
                ]
            );
        }
        return true;
    }

    /**
     * @return mixed
     */
    public function getAllColors()
    {
        return $this->db->toList("SELECT * FROM colors");
    }

    /**
     * @return mixed
     */
    public function getAllSizes()
    {
        return $this->db->toList("SELECT * FROM sizes");
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getMoreColors($id)
    {
        return $this->db->query("SELECT * FROM colors WHERE id = :id", [':id' => $id]);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getMoreSizes($id)
    {
        return $this->db->query("SELECT * FROM sizes WHERE id = :id", [':id' => $id]);
    }

    /**
     * @param $post
     * @return mixed
     */
    public function newColor($post, $files)
    {
        $newfiles = $files;

        return $this->db->query("INSERT INTO colors (cname, cimage) VALUES (:name, :image)",
            [
                ':name' => $post['name'],
                ':image' => $newfiles
            ]
        );
    }

    /**
     * @param $id
     * @return mixed
     */
    public function deleteColor($id)
    {
        return $this->db->query("DELETE FROM `colors` WHERE id = :id", [':id' => $id]);
    }

    /**
     * @param $post
     * @return bool
     */
    public function editColor($post, $files)
    {

        $newfile = $files;

        if (!empty($newfile)) {
            $this->db->query("UPDATE colors SET `cname`=:name, `cimage`=:image WHERE id = :id",
                [
                    ':id' => $post['id'],
                    ':name' => $post['name'],
                    ':image' => $newfile
                ]
            );
        } else {
            $this->db->query("UPDATE colors SET `cname`=:name WHERE id = :id",
                [
                    ':id' => $post['id'],
                    ':name' => $post['name']
                ]
            );
        } return true;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getColor($id)
    {
        return $this->db->single("SELECT * FROM colors WHERE id = :id", [':id' => $id]);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getRelatedProducts($id)
    {
        return $this->db->toList("SELECT * FROM product_colors WHERE product_id = :id", [':id' => $id]);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getRelatedColors($id)
    {
        return $this->db->toList("SELECT * FROM product_colors WHERE color_id = :id", [':id' => $id]);
    }

    /**
     * @return mixed
     */
    public function getAllRelatedColors()
    {
        return $this->db->toList("SELECT * FROM products p
        INNER JOIN product_colors pc ON p.id = pc.product_id");
    }

    /**
     * @param $id
     * @return mixed
     */
    public function singleProduct($id)
    {
        return $this->db->single("SELECT * FROM products WHERE id = :id", [':id' => $id]);
    }

    /**
     * @return mixed
     */
    public function allProducts()
    {
        return $this->db->query("SELECT * FROM products");
    }

    /**
     * @param $post
     * @return mixed
     */
    public function searchProduct($post)
    {
        return $this->db->toList("SELECT * FROM products WHERE `name` LIKE CONCAT ('%',:searchName,'%')", [':searchName' => $post]);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function deleteProduct($id)
    {
        return $this->db->query("DELETE FROM products WHERE id = :id", [':id' => $id]);
    }

    /**
     * @param $post
     * @return bool
     */
    public function editProduct($post, $files)
    {
        $newfile = $files;
        if (!empty($newfile)) {
            $this->db->query("UPDATE `products` SET `name`=:name,`price`=:price,`short_description`=:short_description,`description`=:description, `image`=:image, `height`=:height, `length`=:length, `on_sale`=:on_sale, `sale_price`=:sale_price, `sale_text`=:sale_text, `stock`=:stock WHERE id = :id",
                [
                    ':id' => $post['id'],
                    ':name' => $post['name'],
                    ':price' => $post['price'],
                    ':short_description' => $post['short_description'],
                    ':description' => $post['description'],
                    ':image' => $newfile,
                    ':height' => $post['height'],
                    ':length' => $post['length'],
                    ':on_sale' => $post['on_sale'],
                    ':sale_price' => $post['sale_price'],
                    ':sale_text' => $post['sale_text'],
                    ':stock' => $post['stock']
                ]);
        } else {
            $this->db->query("UPDATE `products` SET `name`=:name,`price`=:price, `short_description`=:short_description,`description`=:description, `height`=:height, `length`=:length, `on_sale`=:on_sale, `sale_price`=:sale_price, `sale_text`=:sale_text, `stock`=:stock WHERE id = :id",
                [
                    ':id' => $post['id'],
                    ':name' => $post['name'],
                    ':price' => $post['price'],
                    ':short_description' => $post['short_description'],
                    ':description' => $post['description'],
                    ':height' => $post['height'],
                    ':length' => $post['length'],
                    ':on_sale' => $post['on_sale'],
                    ':sale_price' => $post['sale_price'],
                    ':sale_text' => $post['sale_text'],
                    ':stock' => $post['stock']
                ]);
        }
        return true;
    }

    /**
     * @return mixed
     */
    public function rowCountProducts()
    {
        $result = $this->db->prepare("SELECT count(*) FROM `products`");
        $result->execute();
        return $notificationRows = $result->fetchColumn();
    }

    /**
     * @param $post
     */
    public function newProductsColors($post)
    {
        $this->db->query("INSERT INTO `products_colors` (products_id, colors_id) VALUES (:products_id, colors_id)",
            [
                ':products_id' => $post[':products_id'],
                ':colors_id' => $post['colors_id']
            ]
        );
    }

    public function getBlobs($id)
    {
        return $this->db->query("SELECT * FROM product_colors WHERE product_id = :id", [':id' => $id]);
    }

    public function getSizes($id)
    {
        return $this->db->query("SELECT * FROM product_sizes WHERE product_id = :id", [':id' => $id]);
    }

    public function editColorHandler($adding, $deleting, $id)
    {
        if(sizeof($adding) > 0) {
            foreach($adding as $add) {
                $this->db->query("INSERT INTO product_colors (product_id, color_id) VALUES (:product, :color)", [':product' => $id, ':color' => $add]);
            }
        }
        if(sizeof($deleting) > 0) {
            foreach($deleting as $delete) {
                $this->db->query("DELETE FROM product_colors WHERE product_id = :product AND color_id = :color", [':product' => $id, ':color' => $delete]);
            }
        }
        return true;
    }

    public function editSizeHandler($adding2, $deleting2, $id)
    {
        if(sizeof($adding2) > 0) {
            foreach($adding2 as $add2) {
                $this->db->query("INSERT INTO product_sizes (product_id, size_id) VALUES (:product, :size)", [':product' => $id, ':size' => $add2]);
            }
        }
        if(sizeof($deleting2) > 0) {
            foreach($deleting2 as $delete2) {
                $this->db->query("DELETE FROM product_sizes WHERE product_id = :product AND size_id = :size", [':product' => $id, ':size' => $delete2]);
            }
        }
        return true;
    }
}