<?php

class UsersRepository
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function add($username, $password)
    {
        $password = password_hash($password,PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (username, password)
                VALUES('$username','$password')";
        $stmt=$this->db->prepare($sql);
        $stmt->execute();
    }

    public function getPassword($username)
    {
        $sql = "SELECT * FROM users WHERE username='$username'";
        $stmt=$this->db->prepare($sql);
        $stmt->execute();
        if($row=$stmt->fetch()){
            return $row['password'];
        }
        return null;
    }

    public function exists($username)
    {
        if($this->getPassword($username)===null) return false;
        return true;
    }

    public function changePassword($username, $password)
    {
        $password = password_hash($password,PASSWORD_DEFAULT);
        $sql = "UPDATE users SET password='$password'
                where username = '$username'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
    }
}
