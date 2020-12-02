<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Category;
use \App\Subcategory;
use \App\Navigation;
use \App\Product;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cats = Category::getAllCategories();
        $subcats = Subcategory::getAllSubCategories();

        return view('category.overview', compact('cats', 'subcats'));
    }

    public function manageCategories(Request $request)
    {
        $this->isManager($request);

        $cats = Category::getAllCategories();
        $subcats = Subcategory::getAllSubCategories();

        return view('category.overview', compact('cats', 'subcats'));
    }

    //Category
    public function createCat()
    {
        return view('category.catcreate');
    }

    public function createCategory(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        Navigation::createLink(request('name'));

        Category::create([
            'name' => request('name')

        ]);
        return redirect()->route('categorieen-beheren');
    }

    public function editCategory(Request $request, $id) 
    {
        $this->isManager($request);

        $cat = Category::find($id);

        return view('category.catedit', compact('cat'));
    }

    public function updateCat(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        Navigation::changeLink(Category::find($id), request('name'));

        Category::find($id)->update([
            'name' => request('name')
        ]);

        return redirect()->route('categorieen-beheren')
                        ->with('success','Categorie succesvol geupdate!');
    }

    //Subcategory
    public function createSubCat()
    {
        $cats = Category::all();
        return view('category.subcatcreate', compact('cats'));
    }    

    public function editSubCategory(Request $request, $id) 
    {
        $this->isManager($request);

        $subcat = Subcategory::find($id);
        $cats = Category::all();

        return view('category.subcatedit', compact('subcat', 'cats'));
    }    

    public function updateSubCat(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        Product::where('subcategory_id', '=', $id)->update([
            'category_id' => request('category')
        ]);

        Subcategory::where('id', '=', $id)->update([
            'name' => request('name'),
            'category_id' => request('category')
        ]);

        return redirect()->route('categorieen-beheren')
                        ->with('success','Categorie succesvol geupdate!');
    }

    public function createSubCategory(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        Subcategory::create([
            'name' => request('name'),
            'category_id' => request('category')

        ]);
        return redirect()->route('categorieen-beheren');
    }
}
