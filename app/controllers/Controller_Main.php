<?php
namespace App\Controllers;
use App\Model\Recipes;
use App\Model\Tag;
use App\Model\Instruction;
use App\Model\Ingredient;
use App\Model\RecipeTag;



class Controller_Main extends Controller_Base
{
    public function action_index()
    {
        $recipes = Recipes::findAll();
        // $class = new Controller_Base();
        $tags = Tag::findAll();
        foreach($tags as $tag){
            $tag->count = RecipeTag::table()->where('tag_id', $tag->id)->count();
            // if ($tag->count == 0){
            //     # code...
            // }
            // dd($tag);   
        }
        // dd($tags);

        $this->render('main/index', ['recipes' => $recipes, 'tags' => $tags]);
    }

    public function action_recipe($id)
    {
        // dd($id);
        $recipe = Recipes::findOne($id);
        $instructions = Instruction::table()->where('recipe_id', $id)->findMany();
        $ingredients =  Ingredient::table()->where('recipe_id', $id)->findMany();
        $tags = Recipes::getTags($id);
        // dd($tags);
        $this->render('main/recipe/index',  compact('recipe', 'instructions', 'ingredients', 'tags'));
    }

    public function action_tag($id)
    {
        $tag = Tag::findOne($id);
        $tag->recipes = Tag::getRecipe($id);
        
        $this->render('main/tag', ['tag' => $tag]);
    }

    public function action_tags()
    {
        $tags = Tag::findAll();
        foreach($tags as $tag){
            $tag->count = RecipeTag::table()->where('tag_id', $tag->id)->count();
            // if ($tag->count == 0){
            //     # code...
            // }
            // dd($tag);   
        }
        
        $this->render('main/tags', ['tags' => $tags]);
    }

    public function action_recipes()
    {
        $recipes = Recipes::findAll();
        // $class = new Controller_Base();
        $tags = Tag::findAll();
        $this->render('main/recipes', ['recipes' => $recipes, 'tags' => $tags]);
    }




}