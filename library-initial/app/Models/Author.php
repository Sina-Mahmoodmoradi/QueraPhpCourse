<?php

class Author extends Model
{
    public function all()
    {
        $db= Base::getInstance()->get('DB');
        $sql= "SELECT 
                    authors.id AS id, 
                    authors.name AS name, 
                    COUNT(books.id) AS co
               FROM authors JOIN books
               ON authors.id = books.author_id
               GROUP BY id
               ";
        $stmt= $db->prepare($sql);
        $stmt->execute();
        $results=[];
        while ($row= $stmt->fetch()){
            $author=new Author([
                'id'=>(int)$row['id'],
                'name'=>$row['name'],
                'books_count'=>(int)$row['co']
            ]);
            $results[]=$author;
        }
        return $results;
    }

    public function count()
    {
        $db= Base::getInstance()->get('DB');
        $sql= "SELECT COUNT(distinct(authors.id)) AS co
               FROM authors JOIN books
               ON authors.id = books.author_id";
        $stmt= $db->prepare($sql);
        $stmt->execute();
        return (int)$stmt->fetch()['co'];
    }
}
