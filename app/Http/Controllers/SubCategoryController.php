<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SubCategoryController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.createSubCategory', ['categories' => Category::all()]);
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
            'description' => 'required'
        ]);

        SubCategory::create([
            'name' => $request['name'],
            'category_id' => $request['category'],
            'description' => $request['description'],
            'img' => implode("", explode("public/", $request->file('img')->store('public/subcategory')))
        ]);

        return redirect('admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SubCategory $subCategory
     * @return \Illuminate\Http\Response
     * @throws \Throwable
     */
    public function show(SubCategory $subCategory)
    {
        if (request()->ajax()) {
            $subCategoryProducts = $subCategory->products()
                ->whereBetween('price', array(request('min'), request('max')))
                ->withCount('reviews')
                ->orderBy(request('sort'), request('sort_direction'))
                ->paginate(9)
                ->appends('min', request('min'))
                ->appends('max', request('max'))
                ->appends('sort', request('sort'))
                ->appends('sort_direction', request('sort_direction'))
                ->appends('sort', request('sort'));
            return response()->json(view('layouts.products', ['subCategoryProducts' => $subCategoryProducts])->render());
        }

        return view('products', [
            'subCategory' => $subCategory,
            'subCategoryProducts' => $subCategoryProducts = $subCategory->products()->orderBy('price', 'asc')->paginate(9),
            'newestProducts' => Product::orderBy('created_at', 'desc')->take(3)->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return response()->json(SubCategory::find(request('subcategory')));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return void
     */
    public function update()
    {
        $subcategory              = SubCategory::find(request('id'));
        $subcategory->name        = request('name');
        $subcategory->description = request('desc');
        $subcategory->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SubCategory $subCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubCategory $subCategory)
    {
        //
    }
}
