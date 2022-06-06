<?php
class Item {
    private $db;
    public function __construct() {
        $this->db = new Database;
    }
    
    public function getItem(int $id) {
        if (empty($id)) return false;

        $this->db->query('SELECT * FROM items WHERE ItemId = :itemId');

        $this->db->bind(':itemId', $id);

        return $this->db->fetch();
    }

    public function getItems() {
        $this->db->query('SELECT * FROM Items');

        return $this->db->fetchAll();
    }

    public function deleteItem(int $id) {
        if (empty($id)) return false;

        $this->db->query('DELETE FROM items WHERE ItemId = :itemId');

        $this->db->bind(':itemId', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function insertItem(string $name, string $description, float $price) {
        if(empty($name) || empty($description) || empty($price)) return false;


        $this->db->query('INSERT INTO items (Name, Description, Price) VALUES(:name, :description, :price)');

        $this->db->bind(':name', $name);
        $this->db->bind(':description', $description);
        $this->db->bind(':price', $price);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function updateItem(int $id, string $name, string $description, float $price) {
        if(empty($name) || empty($name) || empty($description) || empty($price)) return false;


        $this->db->query('UPDATE items SET Name = :name, Description = :description, Price = :price WHERE ItemId = :itemId');

        $this->db->bind(':itemId', $id);
        $this->db->bind(':name', $name);
        $this->db->bind(':description', $description);
        $this->db->bind(':price', $price);


        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
