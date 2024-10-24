<?php

namespace App\Controllers;
use App\Model\Recipes;
use App\Model\Tag;
use App\Model\Instruction;
use App\Model\Ingredient;




class Controller_About extends Controller_Base 
{
    public function action_index()
    {
        $recipes = Recipes::findAll();
        $this->render('main/about/view', ['recipes' => $recipes]);

    }
}