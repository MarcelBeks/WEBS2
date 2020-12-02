<?php

namespace App\Http\Controllers;
use \App\Category;
use \App\Subcategory;
use \App\Product;

use Illuminate\Http\Request;

class ProductsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($cat)
    {
        $products = Product::getProducts($cat);

        return view('category.products', compact('products', 'cat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats = Category::get();
        return view('product.create', compact('cats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'desc' => 'required',
            'price' => 'required',
            'category' => 'required',
            'image' => 'image|nullable|max:1999'
        ]);

        if($request->hasFile('image')){
            //Get filename
            $filename = pathinfo($request->input('name'), PATHINFO_FILENAME);            
            //Get ext
            $extension = $request->file('image')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;            
            // Upload
            $path = $request->file('image')->storeAs('public/images/products', $fileNameToStore);
            // Merge path in request
            $request->merge(['image' => $fileNameToStore]);
            
            
        } else{
            $fileNameToStore = 'noimage.jpg';
        }
        Product::create([
            'category_id' => Subcategory::getCategory(request('category'))->category_id,
            'subcategory_id' => request('category'),
            'name' => request('name'),
            'desc' => request('desc'),
            'price' => request('price'),
            'image' => $fileNameToStore

        ]);
        //Product::create($request->all());
        return redirect()->route('producten-beheren');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);

        return view('product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);

        $cats = Category::get();

        return view('product.edit', compact('product', 'cats'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'desc' => 'required',
            'price' => 'required',
            'category' => 'required',
            'image' => 'image|nullable|max:1999'
        ]);
 
        if($request->hasFile('image')){
            //Get filename
            $filename = pathinfo($request->input('name'), PATHINFO_FILENAME);            
            //Get ext
            $extension = $request->file('image')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;            
            // Upload
            $path = $request->file('image')->storeAs('public/images/products', $fileNameToStore);
            // Merge path in request
            $request->merge(['image' => $fileNameToStore]);
            
            
        } else{
            $product = Product::find($id);
            $fileNameToStore = $product->image;
            $request->merge(['image' => $fileNameToStore]);
        }

        Product::find($id)->update([
            'category_id' => Subcategory::getCategory(request('category'))->category_id,
            'subcategory_id' => request('category'),
            'name' => request('name'),
            'desc' => request('desc'),
            'price' => request('price'),
            'image' => $fileNameToStore

        ]);
        //Product::find($id)->update($request->all());
        return redirect()->route('producten-beheren')
                        ->with('success','Product succesvol geupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::find($id)->delete();
        return redirect()->route('producten')
                        ->with('success','Product succesvol verwijderd!');
    }

    public function search(Request $request){

        $products = Product::getSearchedProducts($request->searchData);
        return view('category.products', compact('products'));
    }

    public function product($id){

        $product = Product::find($id);
        $cat = Category::getCategory($product->category_id);
        $subCat = SubCategory::getSubCategory($product->subcategory_id);
        return view('product.product', compact('product', 'cat', 'subCat'));
    }

    public function manageProducts(Request $request)
    {
        $this->isManager($request);

        $products = Product::with('category')->get();

        return view('product.overview', compact('products'));
    }

    public function editProduct(Request $request, $id) 
    {
        $this->isManager($request);

        $product = Product::find($id);

        return view('product.edit', compact('product'));
    }
}
