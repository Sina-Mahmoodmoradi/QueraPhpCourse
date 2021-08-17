<?php

class BooksController
{
    public function list()
    {
        render('books', ['books' => (new Book())->all()]);
    }

    public function add()
    {
        if(empty($_POST['name']) || empty($_POST['author']) || empty($_POST['publisher'])){
            Flash::set('danger', 'همه‌ی اطلاعات باید وارد شوند.');
            redirect('/books/add');
            return;
        }
        $name=$_POST['name'];
        $author = $_POST['author'];
        $publisher = $_POST['publisher'];
        $db= Base::getInstance()->get('DB');
        $sql= "select id from authors where name = '$author'";
        $stmt=$db->prepare($sql);
        $stmt->execute();
        $arr=$stmt->fetchAll();
        $author_id=null;
        if(empty($arr)){
            $sql= "insert into authors (name) values('$author')";
            $stmt=$db->prepare($sql);
            $stmt->execute();
            $author_id = (int)$db->lastInsertId();
        }else{
            $author_id =(int)$arr[0]['id'];
        }
        $sql= "select id from publishers where name = '$publisher'";
        $stmt=$db->prepare($sql);
        $stmt->execute();
        $arr=$stmt->fetchAll();
        $publisher_id=null;
        if(empty($arr)){
            $sql= "insert into publishers (name) values('$publisher')";
            $stmt=$db->prepare($sql);
            $stmt->execute();
            $publisher_id = (int)$db->lastInsertId();
        }else{
            $publisher_id =(int)$arr[0]['id'];
        }
        $sql= "insert into books (name, author_id, publisher_id, quantity)
               values ('$name',
                       $author_id,
                       $publisher_id,
                       1
                      );
               ";
        $stmt= $db->prepare($sql);
        $stmt->execute();
        Flash::set('success', 'کتاب با موفقیت افزوده شد!');
        redirect('/books');
    }

    public function addForm()
    {
        render('books_add');
    }

    public function reserve($id)
    {
        $book = (new Book())->find($id);
        if ($book->quantity > 0) {
            $book->quantity--;
        } else {
            Flash::set('danger', 'کتاب موردنظر در حال حاضر موجود نیست.');
            redirect('/books');
            return;
        }
        $book->save();
        Flash::set('success', 'کتاب با موفقیت رزرو شد!');
        redirect('/books');
    }

    public function unreserve($id)
    {
        $book = (new Book())->find($id);
        $book->quantity++;
        $book->save();
        Flash::set('success', 'موجودی کتاب با موفقیت افزایش یافت!');
        redirect('/books');
    }

    public function delete($id)
    {
        (new Book())->find($id)->delete();
        Flash::set('success', 'کتاب با موفقیت حذف شد!');
        redirect('/books');
    }
}
