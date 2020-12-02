<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Navigation extends Model
{
    protected $table = "navbar";
    protected $fillable = ['label', 'link'];

    public function getMenu()
    {

        $items = DB::table('navbar')->get();

        return $items;
    }

    public static function changeLink($id, $cat)
    {
        $name = $id['name'];       

        //$result = DB::table('navbar')->where('label', $name)->first();
        $item = Navigation::where('label', '=', $name)->first();
        //var_dump($item); exit;
        
        $item->update([
            'label' => $cat,
            'link' => 'category/' . $cat
        ]);
        
    }

    public static function createLink($cat)
    {
        Navigation::create([
            'label' => $cat,
            'link' => 'category/' . $cat
        ]);      
    }
}
