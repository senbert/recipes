<?php


namespace App\Model;

class RecipeTool extends Model
{
    public static function getTable()
    {
        return 'recipes_tools';
    }


    public function getRecipeId()
    {
        
    }

    public static function getTool($id)
    {
        $items = self::table()->where('recipe_id', $id)->findMany();
        // dd($items);
        $tool = [];
        if ($items) {   
            foreach ($items as $row) {
                $tool[] = Recipes::findOne($row->recipe_id);
            }
        }
        return $tool;
    }

    public static function validate($data)
    {
        $v = new \Valitron\Validator($data);
        $v->rule('required', ['recipe_id', 'tool_id'])->message('add_tool_empty_{field}');
        $v->rule('integer', ['recipe_id', 'tool_id'])->message('add_tool_integer_{field}');
        $v->labels(['recipe_id' => 'recipe_id', 'tool_id' => 'tool_id']);
        // $v->rule('lengthMin', 'name', 4)->message('min_tag_string');
        $result = $v->validate();
        if ($result) return false;
        foreach ($v->errors() as $field => $errors) {
            return $errors[0];
        }
    }





}