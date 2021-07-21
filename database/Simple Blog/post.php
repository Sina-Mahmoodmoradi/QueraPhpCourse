<?php


class Post
{
    protected $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getPage($page_number, $per_page)
    {
        $result = $this->db->query("SELECT * FROM posts 
                          ORDER BY posted_at DESC
                          LIMIT ".(int)$per_page." OFFSET ".(int)(($page_number-1)*$per_page));
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function countAll()
    {
        $result = $this->db->query("SELECT * FROM posts");
        return $result->rowCount();
    }

    public function get($id)
    {
        $result = $this->db->query("SELECT * FROM posts WHERE id ='$id'");
        $arr=$result->fetchAll(PDO::FETCH_ASSOC);
        return empty($arr)?NULL:$arr[0];
    }
    public function delete($id)
    {
        $this->db->exec("DELETE FROM posts WHERE id =$id");
    }
    public function edit($id, $title, $author_name, $content)
    {
        $sql="UPDATE posts
        SET title = '$title',
            author_name = '$author_name',
            content = '$content'
         WHERE id = '$id'";
        $stmt=$this->db->prepare($sql);
        $stmt->execute();
    }
}
