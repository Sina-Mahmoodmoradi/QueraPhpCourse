<?php

class BooksController
{
    public function list()
    {
        render('books', ['books' => (new Book())->all()]);
    }

    public function add()
    {
        // TODO: Implement add method here
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
