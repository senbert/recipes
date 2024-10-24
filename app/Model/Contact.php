<?php
namespace App\Model;

class Contact extends Model
{
    const ACTIVE = 1;
    const INACTIVE = 0;

    public static function getTable()
    {
        return 'contacts';
    }


    public static function addMess($data)
    {
        // dd($data);
        return static::table()->create()->set($data)->save();
        // dd($addMess);
    }

    public static function validate($data)
    {
        $v = new \Valitron\Validator($data);
        $v->rule('required', ['name', 'email', 'message'])->message('add_mess_empty_{field}');
        $v->rule('email', 'email')->message('mess_empty_email');
        $v->labels(['name' => 'name', 'email' => 'email', 'message'=> 'message']);
        // $v->rule('lengthMin', 'name', 4)->message('min_tag_string');
        $result = $v->validate();
        if ($result) return false;
        foreach ($v->errors() as $field => $errors) {
            return $errors[0];
        }
    }

}