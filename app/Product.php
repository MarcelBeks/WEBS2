<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use \App\Category;
use \App\SubCategory;

class Product extends Model
{
    protected $fillable = ['name', 'category_id', 'subcategory_id', 'image', 'desc', 'price'];

    public static function getProducts($cat)
    {

        $products = DB::table('products')->where('category_id', Category::getCategories($cat)[0]->id)->get();

        return $products;
    }

    public static function getAllProducts()
    {

        $products = DB::table('products')->get();

        return $products;
    }

    public static function getSearchedProducts($search)
    {

        $products = DB::table('products')->where('name', 'like', '%'. $search . '%')->get();

        return $products;
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function subcategory()
    {
        return $this->belongsTo('App\Subcategory');
    }
}
