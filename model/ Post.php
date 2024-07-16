<?php
class Post {
    private $id;
    private $title;
    private $content;
    private $categoryId;

    public function __construct($id, $title, $content, $categoryId) {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->categoryId = $categoryId;
    }

    public function getId() {
        return $this->id;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getContent() {
        return $this->content;
    }

    public function getCategoryId() {
        return $this->categoryId;
    }
}
?>
