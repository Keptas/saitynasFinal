<?php
class Customer {
    private $db;
    public function __construct() {
        $this->db = new Database;
    }
    
    public function getCustomer(int $id) {
        if (empty($id)) return false;

        $this->db->query('SELECT * FROM customers WHERE CustomerId = :customerId');

        $this->db->bind(':customerId', $id);

        return $this->db->fetch();
    }

    public function getCustomers() {
        $this->db->query('SELECT * FROM customers');

        return $this->db->fetchAll();
    }
}
