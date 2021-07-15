<?php

class Books
{
    protected $pdo;
    public function __construct($pdo)
    {
        $this->pdo=$pdo;
    }
    public function add($id, $title, $author_name, $publisher_name, $demo)
    {
        $sql="INSERT INTO books VALUES ('$id','$title','$author_name','$publisher_name','$demo')";
        $this->pdo->exec($sql);
    }
}
$host='localhost';
$username='root';
$password='';
$db='first database';
$conn = new PDO("mysql:host=$host;dbname=$db",$username,$password);
$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$books = new Books($conn);
$books->add(
    6532196,
    "Grokking Algorithms",
    "Aditya Y. Bhargava", "Manning",
    "Grokking Algorithms is a fully illustrated,
    friendly guide that teaches you how to apply
    common algorithms to the practical problems
    you face every day as a programmer."
);