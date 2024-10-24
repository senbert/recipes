<?php
namespace App\Controllers;
use App\Model\Recipes;
use App\Model\Tag;
use App\Model\Instruction;
use App\Model\Ingredient;
use App\Model\Contact;




class Controller_Message extends Controller_Base 
{
    // public function action_index()
    // {
    //     $recipes = Recipes::findAll();
    //     $this->render('main/contact/info', ['recipes' => $recipes]);

    // }

    public $layout = 'admin';

    public function action_index()
    {
        $contacts = Contact::table()->where('status', Contact::INACTIVE)->findMany();
        $this->render('/contact/index', ['contacts' => $contacts]);

    
    }
    public function action_deleteMess($id)
    {
        $result = Contact::findOne($id)->delete();
        $this->addMessage($result, 'delete_message')->back();
        
    }

    public function action_create()
    {
        $error = Contact::validate($_POST);
        if($error){
            $this->addMessage(false, $error)->back();
        }
        // $this->checkUnick();
        $result = Contact::addMess($_POST);
        $this->addMessage($result, 'add_mess')->back();
        // $result ? $this->redirect('contact/info') : $this->back();
    }

    private function checkUnick()
    {
        $mess = Contact::table()->where(['name' => $_POST['name'], 'email' => $_POST['email']])->findOne();
        if($mess){
            $this->addMessage(false, 'exit_mess_add')->back();
        } 
    }

    public function action_changeStatus($id)
    {
        $contact = Contact::table()->findOne($id);
        $contact->status = $contact->status ? 0 : 1;
        // if($contact->status == 0){
        //     $contact->status = 1;
        // } else {
        //      $contact->status = 0;
        // }
        $contact->save();
        $this->addMessage(true, 'change_contact')->back();
        
    }

    // public function action_seeMess()
    // {
    //     $contact = Contact::findAll();
    //     $this->render('/contact/index', ['contact' => $contact]);
    // }







}