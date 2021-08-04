<?php

class Template extends Singleton
{
    protected $templates_path;

    public function render($view, $data = [])
    {
        $view = $this->templates_path . '/' . ltrim($view, '/') . '.php';
        $base = Base::getInstance();
        $base->mset($data);
        foreach ($base->get('GLOBAL_VARS') as $key => $value) {
            $data[$key] = $value;
        }
        $view = file_get_contents($view);
        preg_match_all('/{{ @(.+?) }}/', $view, $vars);
        foreach ($vars[1] as $var) {
            $view = str_replace('{{ @' . $var . ' }}', $base->get($var), $view);
        }
        $temp_view = __DIR__ . '/temp_' . time() . rand() . '.php';
        file_put_contents($temp_view, preg_replace('/\/+/', '/', $view));
        extract($data);
        ob_start();
        require $temp_view;
        echo ob_get_clean();
        unlink($temp_view);
    }

    public function setPath($path)
    {
        $this->templates_path = rtrim($path, '/');
    }
}

function render($view, $data = [])
{
    Template::getInstance()->render($view, $data);
}
