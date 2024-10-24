<?php
namespace App\Model;

class Ingredient extends Model
{

    public static function getTable()
    {
        return 'ingredients';
    }

    public static function getIngredient($id)
    {
        $items = self::table()->where('recipe_id', $id)->findMany();
        // dd($items);
        $ingredient = [];
        if ($items) {   
            foreach ($items as $row) {
                $ingredient[] = Recipes::findOne($row->recipe_id);
            }
        }
        return $ingredient;
    }

    public static function validate($data, $action)
    {
        $v = new \Valitron\Validator($data);
        if ($action = 'add') {
             $v->rule('required', ['recipe_id', 'name'])->message('add_ingredient_empty_{field}');
             $v->labels(['recipe_id' => 'recipe_id', 'name' => 'name']);
        } else {
            $v->rule('required', ['id', 'name'])->message('edit_ingredient_empty_{field}');
            $v->labels(['id' => 'id', 'name' => 'name']);
        }
        $v->rule('lengthMin', 'name', 4)->message('min_ingredient_string');
        $result = $v->validate();
        if ($result) return false;
        foreach ($v->errors() as $field => $errors) {
            return $errors[0];
        }
    }

    

   

}