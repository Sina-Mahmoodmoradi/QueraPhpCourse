<?php

class AuthController
{
    public function __construct()
    {
        if (auth()->check()) {
            redirect('/');
        }
    }

    public function loginForm()
    {
        render('login');
    }

    public function login()
    {
        $db = Base::getInstance()->get('DB');
        $userRepository=new UsersRepository($db);
        if(isset($_POST['remember']))$exp= Base::getInstance()->get('EXTENDED_EXP');
        else $exp=Base::getInstance()->get('DEFAULT_EXP');
        $hash = $userRepository->getPassword($_POST['username']);
        if($hash !== null && password_verify($_POST['password'],$hash)) {
            setcookie('authorization',JWT::encode(['user'=>$_POST['username'],'exp'=>(time()+$exp)]),time()+$exp);
            Flash::set('success','شما با موفقیت وارد شدید.');
            redirect('/');
            return;
        }
        Flash::set('danger','نام کاربری یا رمز عبور نادرست است.');
        redirect('/login');
    }

    public function logout()
    {
        setcookie('authorization', null, -1);
        redirect('/login');
    }
}
