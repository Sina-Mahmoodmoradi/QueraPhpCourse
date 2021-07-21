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
        $sql="INSERT INTO books (id,title,author_name, publisher_name,demo)
        VALUES (?,?,?,?,?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id,$title,$author_name,$publisher_name,$demo]);
    }
}