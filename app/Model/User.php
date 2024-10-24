<?php
namespace App\Model;

class User 
{
    public static $name = 'admin';
    public static $password = 123; 

    public static function check($data)
    {
        if (self::$name == $data['name'] && self::$password == $data['password']) {
            return true;
        }
        return false;
    }

    public static function validate($data)
    {
        $v = new \Valitron\Validator($data);
        $v->rule('required', ['name', 'password'])->message('name_and_password_empty_{field}');
        $v->labels(['name' => 'name', 'password' => 'password']);
        // $v->rule('lengthMin', 'name', 4)->message('min_tag_string');
        $result = $v->validate();
        if ($result) return false;
        foreach ($v->errors() as $field => $errors) {
            return $errors[0];
        }
    }

}
