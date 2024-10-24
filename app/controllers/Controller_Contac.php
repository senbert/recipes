<?php
namespace App\Controllers;
use App\Model\Recipes;
use App\Model\Tag;
use App\Model\Instruction;
use App\Model\Ingredient;




class Controller_Contact extends Controller_Base 
{
    public function action_index()
    {
        $recipes = Recipes::findAll();
        $this->render('main/contact/info', ['recipes' => $recipes]);

    }
}