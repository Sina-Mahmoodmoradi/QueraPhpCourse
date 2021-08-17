<?php

class FilesController
{
    public function __construct()
    {
        if (!auth()->check()) {
            redirect('/login');
        }
    }

    public function list()
    {
        $dir = Base::getInstance()->get('BASE_PATH') . '/' . trim($_GET['path'] ?? '/', '/');
        $files = FileHelper::listDirectory($dir);
        render(
            'list',
            [
                'files' => $files
            ]
        );
    }

    public function search()
    {
        $path = Base::getInstance()->get('BASE_PATH') . '/' . trim($_GET['path'], '/');
        $files = FileHelper::searchFile($_POST['keyword'], $path);
        render(
            'search',
            [
                'files' => $files
            ]
        );
    }

    public function addFileForm()
    {
        render('add_file');
    }

    public function addFile()
    {
        $path = Base::getInstance()->get('BASE_PATH') . '/' . trim($_GET['path'], '/');
        FileHelper::createFile($_POST['name'], $path);
        FileHelper::editFile($_POST['name'], $path, $_POST['content']);
        Flash::set('success', 'فایل با موفقیت اضافه شد.');
        redirect('/?path=/' . dirname($_GET['path']));
    }

    public function addDirectoryForm()
    {
        render('add_directory');
    }

    public function addDirectory()
    {
        $path = Base::getInstance()->get('BASE_PATH') . $_GET['path'];
        FileHelper::createDirectory($_POST['name'], $path);
        Flash::set('success', 'دایرکتوری با موفقیت اضافه شد.');
        redirect('/?path=/' . dirname($_GET['path']));
    }

    public function deleteDirectory()
    {
        $path = Base::getInstance()->get('BASE_PATH') . '/' . trim($_GET['path'], '/');
        FileHelper::deleteDirectory($path);
        Flash::set('success', 'حذف با موفقیت انجام شد.');
        redirect('/?path=/' . dirname($_GET['path']));
    }

    public function deleteFile()
    {
        $path = Base::getInstance()->get('BASE_PATH') . '/' . trim($_GET['path'], '/');
        FileHelper::deleteFile(basename($path), dirname($path));
        Flash::set('success', 'حذف با موفقیت انجام شد.');
        redirect('/?path=/' . dirname($_GET['path']));
    }

    public function copyDirectoryForm()
    {
        render('copy_directory');
    }

    public function copyDirectory()
    {
        $src_path = Base::getInstance()->get('BASE_PATH') . '/' . trim($_GET['path'], '/');
        $dest_path = Base::getInstance()->get('BASE_PATH') . '/' . trim($_POST['destination'], '/');
        FileHelper::copyDirectory($src_path, $dest_path);
        Flash::set('success', 'کپی با موفقیت انجام شد.');
        redirect('/?path=/' . dirname($_POST['destination']));
    }

    public function copyFileForm()
    {
        render('copy_file');
    }

    public function copyFile()
    {
        $src_path = Base::getInstance()->get('BASE_PATH') . '/' . trim($_GET['path'], '/');
        $dest_path = Base::getInstance()->get('BASE_PATH') . '/' . trim($_POST['destination'], '/');
        FileHelper::copyFile($src_path, $dest_path);
        Flash::set('success', 'کپی با موفقیت انجام شد.');
        redirect('/?path=/' . dirname($_POST['destination']));
    }

    public function moveDirectoryForm()
    {
        render('move_directory');
    }

    public function moveDirectory()
    {
        $src_path = Base::getInstance()->get('BASE_PATH') . '/' . trim($_GET['path'], '/');
        $dest_path = Base::getInstance()->get('BASE_PATH') . '/' . trim($_POST['new_path'], '/');
        FileHelper::moveDirectory($src_path, $dest_path);
        Flash::set('success', 'انتقال با موفقیت انجام شد.');
        redirect('/?path=/' . dirname($_POST['new_path']));
    }

    public function moveFileForm()
    {
        render('move_file');
    }

    public function moveFile()
    {
        $src_path = Base::getInstance()->get('BASE_PATH') . '/' . trim($_GET['path'], '/');
        $dest_path = Base::getInstance()->get('BASE_PATH') . '/' . trim($_POST['new_path'], '/');
        FileHelper::moveFile($src_path, $dest_path);
        Flash::set('success', 'انتقال با موفقیت انجام شد.');
        redirect('/?path=/' . dirname($_POST['new_path']));
    }

    public function editFileForm()
    {
        $path = Base::getInstance()->get('BASE_PATH') . '/' . trim($_GET['path'], '/');
        $content = FileHelper::getFile(basename($path), dirname($path));
        render(
            'edit_file',
            [
                'content' => $content
            ]
        );
    }

    public function editFile()
    {
        $path = Base::getInstance()->get('BASE_PATH') . '/' . trim($_GET['path'], '/');
        FileHelper::editFile(basename($path), dirname($path), $_POST['content']);
        Flash::set('success', 'ویرایش با موفقیت انجام شد.');
        redirect('/?path=/' . dirname($_GET['path']));
    }
}
