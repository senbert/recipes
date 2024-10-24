<?php

namespace App\Controllers;
use App\Model\Recipes;
use App\Model\Tag;
use App\Model\Instruction;
use App\Model\Ingredient;
use App\Model\User;




class Controller_User extends Controller_Base 
{
    public function action_login()
    {
        $this->render('user/login');

    }

    public function action_check()
    {
        $error = User::validate($_POST);
        if ($error) {
            $this->addMessage(false, $error)->back();
        }
        // dd($_POST);
        if (User::check($_POST)) {
            // dd('dsdsd');
            $_SESSION['user'] = 'admin';
            $this->redirect('admin/recipes');
        } else {   
            $this->addMessage(false, 'login_pass')->back();
            } 
    }

    //  public function action_logout()
    //  {
    //     unset($_SESSION['user']);
    //     $this->redirect('');

    //  }
}