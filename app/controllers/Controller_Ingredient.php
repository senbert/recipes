<?php
namespace App\Controllers;
use App\Model\Recipes;
use App\Model\Tag;
use App\Model\Instruction;
use App\Model\Ingredient;
use App\Model\Tool;
use App\Model\RecipeTool;
use App\Model\RecipeTag;


class Controller_Ingredient extends Controller_Base
{
    public $layout = 'admin';

    public function action_add($recipe_id)
    {
        // dd('test');
        // dd($ingredients);
        $this->render('ingredient/add', ['recipe_id' => $recipe_id]);
    }
    public function action_create()
    {
            $error = Ingredient::validate($_POST, 'add');
            if ($error) {
                $this->addMessage(false, $error)->back();
            }
            $item = Ingredient::table()->where(['recipe_id' => $_POST['recipe_id'], 'name' => $_POST['name'] ])->find_one();
            if ($item) {
                $this->addMessage(false, 'add_ingredient_recipe_exit_tool')->back();
            } 
            $result = Ingredient::table()->create()->set($_POST)->save();
            $this->addMessage($result, 'add_ingredient_recipe');
            $result ? $this->redirect('admin/recipe/' . $_POST['recipe_id']) : back();
            // dd($result);
        
        
    }


    public function action_delete($id)
    {
        // dd($id);
        $ingredient = Ingredient::findOne($id);
        $recipe_id = $ingredient->recipe_id;
        $result = $ingredient->delete();
        $this->addMessage($result, 'delete_ingredient_recipe')->redirect('admin/recipe/' . $recipe_id);
        // $delete = Ingredient::findOne($id)->delete();
        // $this->addMessage($delete, 'delete_ingredient_recipe')->back();
    }

    public function action_edit($id = null)
    {

        if ($_POST) {
            $error = Ingredient::validate($_POST, 'edit');
            // if ($error) {
            //     $this->addMessage(false, $error)->back();
            // }

        $ingredient = Ingredient::findOne($id);
        $recipeId = $ingredient->recipe_id;
        
        if ($recipeId) {
            $_POST['recipe_id'] = $recipeId;
        }
        $item = Ingredient::table()->where(['name' => $_POST['name'] ])->findOne();
            if ($item) {
                $this->addMessage(false, 'edit_ingredient_recipe_exit_tool')->back();
            } 
        //  dd($_POST);   
        $result = Ingredient::table()->set($_POST)->save();
        // dd($result);
        $this->addMessage($result, 'edit_ingredient_recipe');
        $result ? $this->redirect('admin/recipe/' . $_POST['recipe_id']) : back();
        }
        $ingredient = Ingredient::findOne($id);
        $this->render('ingredient/edit', ['ingredient' => $ingredient]);
    }


    
}