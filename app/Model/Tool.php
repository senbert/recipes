<?php

namespace App\Model;

class Tool extends Model
{
    public static function getTable()
    {
        return 'tools';
    }

    public static function validate($data)
    {
        $v = new \Valitron\Validator($data);
        $v->rule('required', 'name')->message('empty_tool_name');
        $v->rule('lengthMin', 'name', 4)->message('min_tool_string');
        $result = $v->validate();
        if ($result) return false;
        foreach ($v->errors() as $field => $errors) {
            return $errors[0];
        }
    }

    




}