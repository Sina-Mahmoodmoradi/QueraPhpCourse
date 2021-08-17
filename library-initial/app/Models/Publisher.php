<?php

class Publisher extends Model
{
    public function all()
    {
        $db= Base::getInstance()->get('DB');
        $sql= "SELECT 
                    publishers.id AS id, 
                    publishers.name AS name, 
                    COUNT(books.id) AS co
               FROM publishers JOIN books
               ON publishers.id = books.publisher_id
               GROUP BY id
               ";
        $stmt= $db->prepare($sql);
        $stmt->execute();
        $results=[];
        while ($row= $stmt->fetch()){
            $publisher=new publisher([
                'id'=>(int)$row['id'],
                'name'=>$row['name'],
                'books_count'=>(int)$row['co']
            ]);
            $results[]=$publisher;
        }
        return $results;
    }

    public function count()
    {
        $db= Base::getInstance()->get('DB');
        $sql= "SELECT COUNT(distinct(publishers.id)) AS co
               FROM publishers JOIN books
               ON publishers.id = books.publisher_id";
        $stmt= $db->prepare($sql);
        $stmt->execute();
        return (int)$stmt->fetch()['co'];
    }
}
