<?php

include 'Database.php';

class Register
{

    private $db;

    public function __construct()
    {
        $this->db = new Database;

        $this->getPosts();
    }

    public function getPosts()
    {
        $this->db->query("SELECT * FROM users");
    

        $data = $this->db->resultSet();
        foreach ($data as $value) {
            echo $value->user_username;
        }
    }
}
