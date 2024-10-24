<?php
require 'vendor/autoload.php';

use Pecee\SimpleRouter\SimpleRouter;
use App\Model\Model;

session_start();


Model::connect();

SimpleRouter::get('/', 'Controller_Main@action_index');
SimpleRouter::get('recipe/{id}', 'Controller_Main@action_recipe');
SimpleRouter::get('tag/{id}', 'Controller_Main@action_tag')->where(['id' => '[0-9]+']);
SimpleRouter::get('view/', 'Controller_About@action_index');
SimpleRouter::get('tags/', 'Controller_Main@action_tags');
SimpleRouter::get('recipes/', 'Controller_Main@action_recipes');
SimpleRouter::get('admin/recipes', 'Controller_Recipe@action_index');
SimpleRouter::get('admin/recipe', 'Controller_Recipe@action_index');
// SimpleRouter::post('admin/recipe', 'Controller_Recipe@action_index');


SimpleRouter::get('admin/recipe/{id}', 'Controller_Recipe@action_recipe');

SimpleRouter::get('user/login', 'Controller_User@action_login');
SimpleRouter::post('user/login', 'Controller_User@action_check');
SimpleRouter::get('user/logout', 'Controller_User@action_logout');


//Contact menu
SimpleRouter::post('contact/add/', 'Controller_Message@action_create');
SimpleRouter::get('contact/mess/', 'Controller_Message@action_index');
SimpleRouter::get('contact/deleteMess/{id}', 'Controller_Message@action_deleteMess');
SimpleRouter::get('contact/status/{id}', 'Controller_Message@action_changeStatus');



SimpleRouter::get('admin/delete/{id}', 'Controller_Recipe@action_delete');
SimpleRouter::get('admin/add_recipe/', 'Controller_Recipe@action_add_recipe');
SimpleRouter::post('admin/add_recipe/', 'Controller_Recipe@action_add_recipe');
SimpleRouter::get('admin/edit_recipe/{id}', 'Controller_Recipe@action_edit_recipe');
SimpleRouter::post('admin/edit_recipe', 'Controller_Recipe@action_edit_recipe');



//  Tags / Admin Admin Menu
SimpleRouter::get('tags/index/', 'Controller_Tag@action_index');
SimpleRouter::get('tag/delete/{id}', 'Controller_Tag@action_delete');
SimpleRouter::post('tag/add/', 'Controller_Tag@action_add');
SimpleRouter::get('tag/add/', 'Controller_Tag@action_create');
SimpleRouter::get('tag/edit/{id}', 'Controller_Tag@action_edit');
SimpleRouter::post('tag/edit/', 'Controller_Tag@action_update');

//Tags Recipes
SimpleRouter::get('recipe/add_tag/{id}', 'Controller_Recipe@action_add_tag');
SimpleRouter::post('recipe/add_tag/', 'Controller_Recipe@action_add_tag');
SimpleRouter::get('recipe/delete_tag_id/', 'Controller_Recipe@action_delete_tag_id');
//Tool Recipes
SimpleRouter::get('recipe/add_tool/{id}', 'Controller_Recipe@action_add_tool');
SimpleRouter::post('recipe/add_tool/', 'Controller_Recipe@action_add_tool');

// Ingredient Recipe Add
SimpleRouter::get('ingredient/add/{id}', 'Controller_Ingredient@action_add');
SimpleRouter::get('ingredient/delete/{id}', 'Controller_Ingredient@action_delete');
SimpleRouter::post('ingredient/add/', 'Controller_Ingredient@action_create');
SimpleRouter::get('ingredient/edit/{id}', 'Controller_Ingredient@action_edit');
SimpleRouter::post('ingredient/edit/', 'Controller_Ingredient@action_edit');
// Edit
SimpleRouter::get('recipe/edit_ingredient/{id}', 'Controller_Recipe@action_edit_ingredient');
SimpleRouter::post('recipe/edit_ingredient/', 'Controller_Recipe@action_edit_ingredient');

// Ingstruction Recipe Add
SimpleRouter::get('instruction/add/{id}', 'Controller_Instruction@action_add');
SimpleRouter::get('instruction/delete/{id}', 'Controller_Instruction@action_delete');
SimpleRouter::post('instruction/add/', 'Controller_Instruction@action_create');
SimpleRouter::get('instruction/edit/{id}', 'Controller_Instruction@action_edit');
SimpleRouter::post('instruction/edit/', 'Controller_Instruction@action_edit');

//  Tools / Admin   

SimpleRouter::get('tool/index/', 'Controller_Tool@action_index');
SimpleRouter::get('tool/delete/{id}', 'Controller_Tool@action_delete');
SimpleRouter::get('tool/edit/{id}', 'Controller_Tool@action_edit');
SimpleRouter::post('tool/edit/', 'Controller_Tool@action_edit');
SimpleRouter::post('tool/add/', 'Controller_Tool@action_create');
SimpleRouter::get('tool/add/', 'Controller_Tool@action_add');

// Admin выводим таги для одного рецепта
// SimpleRouter::get('admin/get_tags/{id}', 'Controller_Recipe@action_get_tags');





SimpleRouter::setDefaultNamespace('App\Controllers');

SimpleRouter::start();