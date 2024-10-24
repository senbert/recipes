<?php

namespace App\Model;

class Tag extends Model
{
    public static function getTable()
    {
        return 'tags';
    }

    public static function getRecipe($id)
    {
        $items =  RecipeTag::table()->where('tag_id', $id)->findMany();
        // dd($items);
        $recipes = [];
        if($items){
            foreach($items as $row) {
                $recipes[] = Recipes::findOne($row->recipe_id);
                // debug($row);
            }
        }
        return $recipes;
    }

   public static function addTags($data)
   {
    // dd($data);
        $addTags = self::table()->create();
        $addTags->set($data);
        return $addTags->save();
   }

   public static function deleteTag($id)
    {
        // dd($id);
        $delete = self::table()->find_one($id);
        return $delete->delete();
    }

    public static function validate($data)
    {
        $v = new \Valitron\Validator($data);
        $v->rule('required', 'name')->message('empty_tag_name');
        $v->rule('lengthMin', 'name', 4)->message('min_tag_string');
        $result = $v->validate();
        if ($result) return false;
        foreach ($v->errors() as $field => $errors) {
            return $errors[0];
        }
    }



}