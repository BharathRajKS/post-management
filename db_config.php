<?php
// $host = 'localhost';
// $dbname = 'post_management';
// $username = 'dckap';
// $password = 'Dckap2023Ecommerce';

// try {
//     $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
//     $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// } catch(PDOException $e) {
//     echo "Connection failed: " . $e->getMessage();
//     die();
// }



// connect the database
class Database
{
    public $db;

    public function __construct()
    {
        try {
            $this->db = new PDO
            (
                'mysql:host=127.0.0.1;dbname=post_management',
                'dckap',
                'Dckap2023Ecommerce'
            );
        } catch (Exception $e) {
            die("connection error");
        }
    }
}
?>











?>
