<?php

class Book extends Model
{
    private function countBooks($type, $id)
    {
        $db = Base::getInstance()->get('DB');
        $sql = "SELECT COUNT(*) AS co 
                FROM books 
                WHERE $type = $id";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        return (int)$stmt->fetch()['co'];
    }
    public function all()
    {
        $db = Base::getInstance()->get('DB');
        $sql = "SELECT 
                    books.id AS BookID,
                    books.name AS BookName,
                    books.author_id AS AuthorID,
                    books.publisher_id AS PublisherID,
                    books.quantity AS BookQuantity,
                    authors.name AS AuthorName,
                    publishers.name AS PublisherName
                FROM books
                JOIN authors
                    ON books.author_id = authors.id
                JOIN publishers
                    ON books.publisher_id = publishers.id";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $results=[];
        while($row = $stmt->fetch()){
            $id= (int)$row['BookID'];
            $name= $row['BookName'];
            $author_name= $row['AuthorName'];
            $publisher_name= $row['PublisherName'];
            $author_id= (int)$row['AuthorID'];
            $publisher_id= (int)$row['PublisherID'];
            $quantity= (int)$row['BookQuantity'];
            $author=new Author(['id'=>$author_id,
                                'name'=> $author_name,
                                'books_count'=>$this->countBooks('author_id',$author_id)]);
            $publisher=new Publisher(['id' => $publisher_id,
                                      'name' => $publisher_name,
                                      'books_count' => $this->countBooks('publisher_id',$publisher_id)]);
            $results[]=new book(['id' => $id,
                                'name' => $name,
                                'author' => $author,
                                'publisher' => $publisher,
                                'quantity' => $quantity,]);
        }
        return $results;
    }

    public function count()
    {
        $db = Base::getInstance()->get('DB');
        $sql = "SELECT COUNT(*) AS co 
                FROM books ";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        return (int)$stmt->fetch()['co'];
    }

    public function find($id)
    {
        $db = Base::getInstance()->get('DB');
        $sql = "SELECT 
                    books.id AS BookID,
                    books.name AS BookName,
                    books.author_id AS AuthorID,
                    books.publisher_id AS PublisherID,
                    books.quantity AS BookQuantity,
                    authors.name AS AuthorName,
                    publishers.name AS PublisherName
                FROM books
                JOIN authors
                    ON books.author_id = authors.id
                JOIN publishers
                    ON books.publisher_id = publishers.id
                WHERE books.id = $id";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetch();
        if(empty($row))throw new Exception('Book not found');
        $id= (int)$row['BookID'];
        $name= $row['BookName'];
        $author_name= $row['AuthorName'];
        $publisher_name= $row['PublisherName'];
        $author_id= (int)$row['AuthorID'];
        $publisher_id= (int)$row['PublisherID'];
        $quantity= (int)$row['BookQuantity'];
        $author=new Author(['id'=>$author_id,
            'name'=> $author_name,
            'books_count'=>$this->countBooks('author_id',$author_id)]);
        $publisher=new Publisher(['id' => $publisher_id,
            'name' => $publisher_name,
            'books_count' => $this->countBooks('publisher_id',$publisher_id)]);
        $result = new book(['id' => $id,
            'name' => $name,
            'author' => $author,
            'publisher' => $publisher,
            'quantity' => $quantity,]);

        return $result;
    }

    public function save()
    {
        $id = (int)$this->id;
        $name = $this->name;
        $author_id = (int)$this->author->id;
        $publisher_id =(int) $this->publisher->id;
        $quantity = (int)$this->quantity;

        $db= Base::getInstance()->get('DB');

        $sql="UPDATE books 
              SET 
                books.name = '$name' ,
                author_id = $author_id ,
                publisher_id= $publisher_id ,
                quantity = $quantity
              where id = $id";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $book = $this->find($id);
        $this->author    = $book->author;
        $this->publisher = $book->publisher;
    }

    public function delete()
    {
        $id = $this->attributes['id'];
        $db= Base::getInstance()->get('DB');
        $sql="DELETE FROM books 
              where id = $id";
        $stmt = $db->prepare($sql);
        $stmt->execute();
    }
}
