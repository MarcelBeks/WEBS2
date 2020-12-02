<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    protected $fillable = ['name'];

    public static function getCategories($cat)
    {

        $categories = DB::table('categories')->where('name', $cat)->get();

        return $categories;
    }

    public static function getAllCategories()
    {

        $categories = DB::table('categories')->get();

        return $categories;
    }

    public static function getCategory($id)
    {

        $categorie = DB::table('categories')->where('id', $id)->get();

        return $categorie;
    }

    public function product()
    {
        return $this->hasOne('App\Product');
    }

    public function subcategories()
    {
        return $this->hasMany(Subcategory::class, 'category_id', 'id');
    }
}
