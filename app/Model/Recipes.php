<?php
namespace App\Model;

class Recipes extends Model
{
    public static function getTable()
    {
        return 'recipes';
    } 

//     public static function getTags($id)
//     {
//         $items =  RecipeTag::table()->where('recipe_id', $id)->findMany();
//         // dd($items);
//         $tags = [];
//         if($items){
//             foreach($items as $row) {
//                 // dd($row);
//                 $tags[] = Tag::findOne($row->tag_id);
//                 // debug($row);

// // SELECT t.name, t.id 
// // FROM tags t
// // JOIN recipes_tags r_t
// // ON t.id = r_t.tag_id
// // WHERE r_t.recipe_id = 1

//             }
//         }
//         return $tags;
//     }

    public static function getTags($id)
    {
        $sql = "SELECT t.name, t.id, r_t.recipe_id FROM `tags` t JOIN `recipes_tags` r_t ON t.id = r_t.tag_id WHERE r_t.recipe_id = ?";
        return self::table()->rawQuery($sql, [$id])->findMany();
    //    dd($tags);

    }

    public static function delete($id)
    {
        // dd($id);
        $delete = Recipes::table()->find_one($id);
        // dd('assets/img/recipes/' . $delete->img);
        if(file_exist('assets/img/recipes/' . $delete->img)) {
            unlink('assets/img/recipes/' . $delete->img);
        }
        // dd($delete);
        $delete->delete();
    }

    public static function addRecipe($data, $fileName)
    {

        $add = Recipes::table()->create($data,$fileName);
        if($fileName){
            $data['img'] = $fileName;
        }
        $add->set($data);
        return $add->save();
    }

    public static function updateRecipe($data, $fileName)
    {
        // dd($data);
        // $update = Recipes::table()->create($data,$fileName);
        $update = Recipes::table()->findOne($data['id']);
        if($fileName){
            $data['img'] = $fileName;
        }
        $update->set($data);
        return $update->save();
    }

    
}