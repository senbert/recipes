<?php
namespace App\Controllers;
use App\Model\Recipes;
use App\Model\Tag;
use App\Model\Instruction;
use App\Model\Ingredient;
use App\Model\Tool;
use App\Model\RecipeTool;
use App\Model\RecipeTag;


class Controller_Instruction extends Controller_Base
{
    public $layout = 'admin';

    public function action_add($recipe_id)
    {
        // dd('test');
        // dd($ingredients);
        $this->render('instruction/add', ['recipe_id' => $recipe_id]);
    }
    public function action_create()
    {
        // dd($_POST);
            $error = Ingredient::validate($_POST, 'add');
            if ($error) {
                $this->addMessage(false, $error)->back();
            }
            $item = Instruction::table()->where(['recipe_id' => $_POST['recipe_id'], 'name' => $_POST['name'] ])->find_one();
            if ($item) {
                $this->addMessage(false, 'add_instruction_recipe_exit_tool')->back();
            } 
            $result = Instruction::table()->create()->set($_POST)->save();
            $this->addMessage($result, 'add_ingredient_recipe');
            $result ? $this->redirect('admin/recipe/' . $_POST['recipe_id']) : back();
            // dd($result);
    }


    public function action_delete($id)
    {
        // dd($id);
        $instruction = Instruction::findOne($id);
        // dd($instruction);
        $recipe_id = $instruction->recipe_id;
        // dd($instruction);
        $result = $instruction->delete();
        // dd($result);
        $this->addMessage($result, 'delete_instruction_recipe')->redirect('admin/recipe/' . $recipe_id);
        // $delete = Ingredient::findOne($id)->delete();
        // $this->addMessage($delete, 'delete_ingredient_recipe')->back();
    }

    public function action_edit($id = null)
    {
        // dd($_POST);
        if ($_POST) {
            $error = Instruction::validate($_POST, 'edit');
            // dd($error);
            // if ($error) {
            //     $this->addMessage(false, $error)->back();
            // }
            
            $instruction = Instruction::findOne($id);
            $recipeId = $instruction->recipe_id;
            
            if ($recipeId) {
                $_POST['recipe_id'] = $recipeId;
            }

            // dd($_POST);
            $item = Instruction::table()->where(['name' => $_POST['name'] ])->findOne();
            if ($item) {
                $this->addMessage(false, 'edit_instruction_recipe_exit_tool')->back();
            } 
            // dd($_POST);
            $result = Instruction::table()->set($_POST)->save();
            // dd($result);
            // dd($result);
            $this->addMessage($result, 'edit_instruction_recipe');
            $result ? $this->redirect('admin/recipe/' . $_POST['recipe_id']) : back();
            
        }

        $instruction = Instruction::findOne($id);
        // dd($instruction);
        $this->render('instruction/edit', ['instruction' => $instruction]);
    }

}