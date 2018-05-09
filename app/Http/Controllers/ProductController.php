<?php

namespace App\Http\Controllers;

use App\Product;
use App\SubCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function indexAdmin()
    {
        return view('admin.products', ['products' => Product::orderBy('created_at', 'desc')->paginate(10)]);
    }

    public function indexAdminBySubCategory($id)
    {
        $subCategory = SubCategory::find($id);
        return view('admin.products', ['products' => $subCategory->products()->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.createProduct', ['subcategories' => SubCategory::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric'
        ]);

        Product::create([
            'name' => $request['name'],
            'sub_category_id' => $request['subcategory'],
            'description' => $request['description'],
            'price' => $request['price'],
            'quantity' => $request['quantity'],
            'img' => 'none'
        ]);

        return redirect('admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('single', [
            'product' => $product,
            'relativeProducts' => Product::where('sub_category_id', $product->subcategory->id)->orderBy('created_at', 'desc')->whereNotIn('name', [$product->name])->take(4)->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Product             $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
