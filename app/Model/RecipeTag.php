<?php

namespace App\Model;

class RecipeTag extends Model
{
    public static function getTable()
    {
        return 'recipes_tags';
    }


    public function getRecipeId()
    {
        
    }

    public static function addTags($data)
   {
    // dd($data);
        $addTags = self::table()->create();
        $addTags->set($data);
        return $addTags->save();
   }

   public static function validate($data)
    {
        $v = new \Valitron\Validator($data);
        $v->rule('required', ['recipe_id', 'tag_id'])->message('add_tag_empty_{field}');
        $v->rule('integer', ['recipe_id', 'tag_id'])->message('add_tag_integer_{field}');
        $v->labels(['recipe_id' => 'recipe_id', 'tag_id' => 'tag_id']);
        // $v->rule('lengthMin', 'name', 4)->message('min_tag_string');
        $result = $v->validate();
        if ($result) return false;
        foreach ($v->errors() as $field => $errors) {
            return $errors[0];
        }
    }

    

}