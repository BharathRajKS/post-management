<?php
require_once 'model/Post.php';

class PostController {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAllPosts() {
        try {
            $stmt = $this->db->query("SELECT * FROM posts");
            $posts = [];
            while ($row = $stmt->fetch()) {
                $post = new Post($row['id'], $row['title'], $row['content'], $row['category_id']);
                $posts[] = $post;
            }
            return $posts;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return [];
        }
    }

    public function createPost($title, $content, $categoryId) {
        try {
            $stmt = $this->db->prepare("INSERT INTO posts (title, content, category_id) VALUES (:title, :content, :category_id)");
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':content', $content);
            $stmt->bindParam(':category_id', $categoryId);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
}
?>
