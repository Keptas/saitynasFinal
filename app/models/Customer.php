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

    public function insertCustomer(string $name, string $email, string $phone) {
        if(empty($name) || empty($email) || empty($phone)) return false;


        $this->db->query('INSERT INTO customers (FullName, Email, Phone) VALUES(:name, :email, :phone)');

        $this->db->bind(':name', $name);
        $this->db->bind(':email', $email);
        $this->db->bind(':phone', $phone);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function updateCustomer(int $id,string $name, string $email, string $phone) {
        if(empty($name) || empty($email) || empty($phone)) return false;


        $this->db->query('UPDATE customers SET FullName = :name, Email = :email, Phone = :phone WHERE CustomerId = :customerId');

        $this->db->bind(':customerId', $id);
        $this->db->bind(':name', $name);
        $this->db->bind(':email', $email);
        $this->db->bind(':phone', $phone);


        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteCustomer(int $id) {
        if (empty($id)) return false;

        $this->db->query('DELETE FROM customers WHERE CustomerId = :customerId');

        $this->db->bind(':customerId', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
