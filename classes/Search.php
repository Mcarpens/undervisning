<?php
/**
 * Created by PhpStorm.
 * User: mcarp
 * Date: 27-02-2018
 * Time: 12:41
 */

class Search extends \PDO
{
    /**
     * @var null
     */
    private $db = null;

    public
        $productTitle = array(),
        $productImage = array(),
        $productId = array(),
        $productDescription = array(),
        $productCount = 0;


    /**
     * Products constructor.
     * @param $db
     */
    public function __construct($db)
    {
        $this->db = $db;
    }

    public function search($searchContent){
//        $searchContent = "%$searchContent%";

        $sql = 'SELECT id, name, description, image FROM products WHERE name LIKE CONCAT(\'%\', :SQ, \'%\') UNION ALL SELECT id, title, text, images FROM blogs WHERE title LIKE CONCAT(\'%\', :SQ, \'%\')';

        $stmt = $this->db->prepare($sql);

        $stmt->execute([':SQ' => $searchContent]);

        $data = $stmt->fetchAll();

        if ($stmt->rowCount() != 0){ ///checks if there were any results
            foreach ($data as $row) { //stores all info/variables in an array
                $this->productCount++; //adds to the number of products
                $this->productTitle[] = $row["name"];
                $this->productImage[] = $row["image"];
                $this->productId[] = $row['id'];
                $this->productDescription[] = $row['description'];
            }
        } return;
    }

    public function getPriceToDisplay($productSalePrice, $regularPrice){
        if ($productSalePrice != 0){
            return '<span class="linePrice" style="color: red"><strike>' .$regularPrice. ' DKK</strike></span><br> <span style="color: green">'.$productSalePrice . ' DKK </span><br>';
        }else{
            return $regularPrice . ' DKK';
        }
    }

    public function getStockClass($stock){ //method to get the class for the css
        if ($stock < 10){
            return "low_stock";
        }else{
            return "high_stock";
        }
    }

    public function getStockStatus($stock){ //method to get the stock status for the product - a few left or in stock
        if ($stock < 10 && $stock != 0){
            return "Kun Få Tilbage!";
        }else if ($stock == 0){
            return "Ikke På Lager";
        }else{
            return "På Lager";
        }
    }

    public function searchError($error){ //method which deals with any errors that may happen
        if ($error == "no_results"){
            return "Der blev ikke fundet nogle resultater!";
        }else if($error == "too_short"){
            return "Dit søgeord skal være på mindst 2 karaktere!";
        }
    }
}