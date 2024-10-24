<?php
namespace App\Controllers;
use App\Model\Recipes;
use App\Model\Tag;
use App\Model\Instruction;
use App\Model\Ingredient;
use App\Model\Tool;
use App\Model\RecipeTool;
use App\Model\RecipeTag;
use App\Model\Contact;


class Controller_Recipe extends Controller_Base
{
    public $layout = 'admin';

    // 
    //    if ($_POST) {
    //     if ($_POST['password'] == 123 || $_POST['name'] == 'Oleg Mine') {
            
    //         $recipes = Recipes::findAll();
    //         $this->render('recipe/index', ['recipes' => $recipes]);
    
    //     }  else {
    //         $this->render('recipe/check');
    //     }
       
        // $recipes = Recipes::findAll();
        // $this->render('recipe/check');
    

    public function action_index()
    {   
        // unset($_SESSION['user']);
        if (empty($_SESSION['user'])) {

            $this->redirect('user/login');
        }
        $recipes = Recipes::findAll();
        $this->render('recipe/index', ['recipes' => $recipes]);
    }

    public function action_recipe($id)
    {
        // dd($id);
        $recipe = Recipes::findOne($id);
        $instructions = Instruction::table()->where('recipe_id', $id)->order_by_asc('step')->findMany();
        $ingredients =  Ingredient::table()->where('recipe_id', $id)->findMany();
        $tags = Recipes::getTags($id);
        // dd($tags);
        $tools = RecipeTool::getTool($id);
        // dd($tags);
        $this->render('recipe/view/index',  compact('recipe', 'instructions', 'ingredients', 'tags', 'tools'));
    }

    public function action_delete($id)
    {
        $delete = Recipes::delete($id);
        // dd($delete);
        $this->addMessage($delete, 'delete_recipe')->back();
        // if ($delete) {
        //     $this->redirect('admin/recipes');
        // } else {
        //     $this->redirect('admin/recipes');
        // }
    }

    public function action_add_recipe()
    {
        // dd($_FILES);
        if ($_POST) {
            $fileName = $this->uploadFile();
            $result = Recipes::addRecipe($_POST, $fileName);
            $result ? $this->redirect('admin/recipes') : $this->back(); 
        }else {
            $this->render('recipe/add_recipe');
        }
    }

    public function action_edit_recipe($id = null)
    {
        if ($_POST) {
            $fileName = $this->uploadFile();
            if ($fileName === false) {
               $this->addMessage(false, 'not_file')->back();
            }
            $update = Recipes::updateRecipe($_POST, $fileName);
            $this->addMessage($update, 'update_recipe');
            $update ? $this->redirect('admin/recipes') : $this->back(); 
        } else {
            $recipe = Recipes::findOne($id);
            // dd($recipe);
            $this->render('recipe/edit_recipe', ['recipe' => $recipe]);
        }
        
    }

    private function uploadFile()
    {
        // dd($_FILES);
        if ($_FILES['img']['error'] == 4) {
           return false;
        }    
        $storage = new \Upload\Storage\FileSystem('assets/img/recipes');
        $file = new \Upload\File('img', $storage);
        // dd($file->getErrorCode());
        $new_filename = time();
     
        $valid_types = new \Upload\Validation\Mimetype(['image/png', 'image/jpg', 'image/jpeg']);
        // dd($valid_types);
        $max_size = new \Upload\Validation\Size('10M');
        // dd($max_size);
        $rules = [$valid_types, $max_size];
        // dd($rules);
        $file->addValidations($rules);

        $file->setName($new_filename);
        try {
            $file->upload();
            return $file->getNameWithExtension();
            // $this->redirect('product/index');
        } catch (\Exception $e) {
            $errors = $file->getErrors();
            // dd($errors);
        
        }
    }

    public function action_add_tag($recipe_id = null)
    {
        if ($_POST) {
            $error = RecipeTag::validate($_POST);
            // dd($error);
            if ($error) {
                $this->addMessage(false, $error)->back();
            }
            // $item = RecipeTag::table()->where('recipe_id', $_POST['recipe_id'])->where('tag_id', $_POST['tag_id'])->find_one();
            
            $item = RecipeTag::table()->where(['recipe_id' => $_POST['recipe_id'], 'tag_id' => $_POST['tag_id']])->find_one();
            if ($item) {
                $this->addMessage(false, 'add_tag_recipe_exit_tag')->back();
            }
            
            $result = RecipeTag::table()->create()->set($_POST)->save();
            $this->addMessage($result, 'add_tag_recipe');
            $result ? $this->redirect('admin/recipe/' . $_POST['recipe_id']) : $this->back();
        }
        $tags = Tag::findAll();
        // dd($tags);
        $this->render('recipe/add_tag', ['tags' => $tags, 'recipe_id' => $recipe_id]);
    }

    public function action_add_tool($recipe_id = null)
    {

        if ($_POST) {
            $error = RecipeTool::validate($_POST); 
            if ($error) {
                $this->addMessage(false, $error)->back();
            }

            $item = RecipeTool::table()->where(['recipe_id' => $_POST['recipe_id'], 'tool_id' => $_POST['tool_id']])->find_one();
            if ($item) {
                $this->addMessage(false, 'add_tool_recipe_exit_tool')->back();
            }

            $result = RecipeTool::table()->create()->set($_POST)->save();
            $this->addMessage($result, 'add_tool_recipe');
            $result ? $this->redirect('admin/recipe/' . $_POST['recipe_id']) : $this->back();
            // dd($result);
           
        }
        $tools = Tool::findAll();
        $this->render('recipe/add_tool', ['tools' => $tools, 'recipe_id' => $recipe_id]);
    }

    public function action_delete_tag_id($id)
    {
        $delete =  RecipeTag::table()->find_one($id)->delete();
    }

    
    

    // public function action_add_instruction($recipe_id = null)
    // {
    //     dd($_POST);
    //     if ($_POST) {
    //         $error = Instruction::validate($_POST);
    //         // dd($errors);
    //         if ($error) {
    //             $this->addMessage(false, $error)->back();
    //         }
    //         $item = Instruction::table()->where(['recipe_id' => $_POST['recipe_id'], 'name' => $_POST['name'] ])->find_one();
    //         if ($item) {
    //             $this->addMessage(false, 'add_ingredient_recipe_exit_tool')->back();
    //         }
            
    //         $result = Instruction::table()->create()->set($_POST)->save();
    //         $this->addMessage($result, 'add_ingredient_recipe');
    //         $result ? $this->redirect('admin/recipe/' . $_POST['recipe_id']) : back();
    //         dd($result);
    //     }

    //     $instructions = Instruction::findAll();
    //     // dd($ingredients);
    //     $this->render('recipe/add_instruction', ['instructions' => $instructions, 'recipe_id' => $recipe_id]);
    // }
    




    // public function action_tools()
    // {
    //     $tools = Tool::findAll();
    //     $this->render('tools/index', ['tools' => $tools]); 
    // }

    


    // public function action_get_tags($id)
    // {
    //     dd($id);
    //     $result = RecipeTags::getRecipeId($id);
    // }




    // // public function action_edit_recipe($id)
    // // {
       
    // //     if ($_POST) {
    // //         $result = Recipes::addRecipe($_POST);
    // //         $result ? $this->redirect('admin/recipes') : $this->back(); 
    // //     }else {
    // //         $this->render('recipe/add_recipe');
    // //     }
    // }
    



}