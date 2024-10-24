<?php

namespace App\Controllers;
use App\Model\Recipes;
use App\Model\Tag;
use App\Model\Instruction;
use App\Model\Ingredient;
use App\Model\Tool;
use App\Model\RecipeTag;



class Controller_Tag extends Controller_Base 
{
    public $layout = 'admin';

    public function action_index()
    {
        $tags = Tag::findAll();
        // dd($tags);
        $this->render('tag/index', ['tags' => $tags]);
    }

    public function action_create()
    {
        $this->render('tag/add');
    }

    public function action_add()
    {
        
        $v = new \Valitron\Validator($_POST);
        $v->rule('required', 'name');
        $v->rule('lengthMin', 'name', 4);
        $result = $v->validate();
        // dd($result);
        $errors = $v->errors();
        // dd($errors);

        $tag = Tag::table()->where('name', $_POST['name'])->findOne();
        if ($tag) {
            $this->addMessage(false, 'exit_tag')->redirect('tag_admin/add');
        }
        $result = Tag::addTags($_POST);
        // dd($result);
        $this->addMessage($result, 'add_tags');
        $result ? $this->redirect('tags/index') : $this->back(); 
        
    }

    public function action_delete($id)
    {
        $delete = Tag::deleteTag($id);
        // dd($delete);
        $this->addMessage($delete, 'delete_tags')->back();
    }

    public function action_edit($id)
    {
        $tag = Tag::findOne($id);
        $this->render('tag/edit', ['tag' => $tag]);
    }
    
    public function action_update()
    {
        $error = Tag::validate($_POST);
        if ($error) {
            $this->addMessage(false, $error)->back();
        }
        // dd($errors);
        $tag = Tag::table()->where('name', $_POST['name'])->findOne();
        if ($tag) {
            $this->addMessage(false, 'exit_tag_edit')->back();
        }
        $result = Tag::findOne($_POST['id'])->set($_POST)->save();
        // dd($result);
        // dd($result);
        $this->addMessage($result, 'edit_tags');
        $result ? $this->redirect('tags/index') : $this->back();       
    }

    // public function action_view_tags()
    // {
    //     // dd($id);
    //     $recipe = Recipes::findOne($id);
    //     $tags = Recipes::getTags($id);
    //     // dd($tags);
    //     $this->render('recipe/view/index',  compact('recipe', 'instructions', 'ingredients', 'tags'));
    // }

    
    

    public function action_add_tag()
    {
        dd($_POST);
        $tag = RecipeTag::table()->where('name', $_POST['name'])->findOne();
        if ($tag) {
            $this->addMessage(false, 'exit_tag')->redirect('tag_admin/add');
        }
        
    }





    
    
    

}