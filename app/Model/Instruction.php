<?php
namespace App\Model;

class Instruction extends Model
{
    public static function getTable()
    {
        return 'instructions';
    } 

    public static function getInstruction($id)
    {
        $items = self::table()->where('recipe_id', $id)->findMany();
        // dd($items);
        $instruction = [];
        if ($items) {   
            foreach ($items as $row) {
                $instruction[] = Recipes::findOne($row->recipe_id);
            }
        }
        return $instruction;
    }

    public static function validate($data, $action)
    {
        // dd($action);
        $v = new \Valitron\Validator($data);
        // dd($data);
        if ($action = 'add') {
             $v->rule('required', ['recipe_id', 'name'])->message('add_instruction_empty_{field}');
             $v->labels(['recipe_id' => 'recipe_id', 'name' => 'name']);
        } else {
            $v->rule('required', ['id', 'name'])->message('edit_instruction_empty_{field}');
            $v->labels(['id' => 'id', 'name' => 'name']);
        }
        $v->rule('lengthMin', 'name', 4)->message('min_instruction_string');
        $result = $v->validate();
        if ($result) return false;
        foreach ($v->errors() as $field => $errors) {
            return $errors[0];
        }
    }

    
    
}