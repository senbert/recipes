<?php
namespace App\Controllers;
use App\Core\View;
use App\Helpers\Message;

class Controller_Base
{

    public $layout = 'main';

    public function redirect($url)
    {
        header('location: /' . $url);
        exit();
    }

    public function render($template, $data = null)
    {
        $data['content'] = $template;
        $data['message'] = Message::display();
        // dump($data);
        \App\Core\View::render($this->layout, $data);
    }

    public function back() 
    {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }

    protected function addMessage($result, $key)
    {
        $type = $result ? 'success' : 'error';
        Message::add($type, $key);
        return $this;
    }


}