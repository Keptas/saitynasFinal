<?php
class User_History {
    private $db;
    public function __construct() {
        $this->db = new Database;
    }

    public function logAction(string $ip, string $scheme, string $uri, string $fullInfo) {
        $this->db->query('INSERT INTO users_history (IP, Scheme, Uri, FullInfo) VALUES (:ip, :scheme, :uri, :fullinfo)');

        $this->db->bind(':ip', $ip);
        $this->db->bind(':scheme', $scheme);
        $this->db->bind(':uri', $uri);
        $this->db->bind(':fullinfo', $fullInfo);
 
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }

    }
    
}