<?php

namespace App\Controllers;
use App\Model\Recipes;
use App\Model\Tag;
use App\Model\Instruction;
use App\Model\Ingredient;
use App\Model\Tool;
use App\Model\RecipeTool;

class Controller_Tool extends Controller_Base
{
    public $layout = 'admin';

    public function action_index()
    {
        $tools = Tool::findAll();
        $this->render('tool/index', ['tools' => $tools]);   

    }

    public function action_add()
    {
        $this->render('tool/add');
    }

    public function action_create()
    {
        $error = Tool::validate($_POST);
        if ($error) {
            $this->addMessage(false, $error)->back();
        }
        // dd($errors);
        $this->checkUniq();
        $result = Tool::table()->create()->set($_POST)->save();
        // dd($result);
        $this->addMessage($result, 'add_tools');
        $result ? $this->redirect('tool/index') : $this->back(); 
    }

    public function action_delete($id)
    {
        // dd($id);
        $delete = Tool::findOne($id)->delete();
        // dd($delete);
        $this->addMessage($delete, 'delete_tools')->back();
    }

    public function action_edit()
    {

        $error = Tool::validate($_POST);
        if ($error) {
            $this->addMessage(false, $error)->back();
        }
        // dd($errors);
        $this->checkUniq();
        $result = Tool::findOne($_POST['id'])->set($_POST)->save();
        // dd($result);
        $this->addMessage($result, 'tool_tags');
        $result ? $this->redirect('tool/index') : $this->back();       
    }

    private function checkUniq()
    {
        $tool = Tool::table()->where('name', $_POST['name'])->findOne();
        if ($tool) {
            $this->addMessage(false, 'exit_tool_edit')->back();
        }
    }

   



}