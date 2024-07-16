<?php
require_once 'models/Category.php';

class CategoryController {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAllCategories() {
        try {
            $stmt = $this->db->query("SELECT * FROM categories");
            $categories = [];
            while ($row = $stmt->fetch()) {
                $category = new Category($row['id'], $row['name']);
                $categories[] = $category;
            }
            return $categories;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return [];
        }
    }

    public function createCategory($name) {
        try {
            $stmt = $this->db->prepare("INSERT INTO categories (name) VALUES (:name)");
            $stmt->bindParam(':name', $name);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
}
?>
