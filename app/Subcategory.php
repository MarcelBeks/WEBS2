<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Subcategory extends Model
{

    protected $table = "subcategories";
    protected $fillable = ['name', 'category_id'];

    public static function getSubCategory($id)
    {

        $subcategorie = DB::table('subcategories')->where('id', $id)->get();

        return $subcategorie;
    }

    public static function getAllSubCategories()
    {

        $subcategories = DB::table('subcategories')->get();

        return $subcategories;
    }

    public static function getCategory($id)
    {
        $category = DB::table('subcategories')->select('category_id')->where('id', $id)->first();

        return $category;
    }

    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
}
