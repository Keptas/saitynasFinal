<?php
class Order {
    private $db;
    public function __construct() {
        $this->db = new Database;
    }
    
    public function getOrder(int $id) {
        if (empty($id)) return false;

        $this->db->query('SELECT * FROM orders WHERE OrderId = :orderId');

        $this->db->bind(':orderId', $id);

        return $this->db->fetch();
    }

    public function getOrders() {
        $this->db->query('SELECT * FROM orders');

        return $this->db->fetchAll();
    }
}
