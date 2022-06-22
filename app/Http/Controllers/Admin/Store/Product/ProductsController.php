<?php

namespace App\Http\Controllers\Admin\Store\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductRequest;
use App\Models\Product\Category;
use App\Models\Product\Product;

// slug bawaan laravel
use illuminate\Support\Str;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // ambil semua data
        $items = Product::with(['category', 'galleries', 'documents'])->orderBy('id', 'DESC')->get();
        return view('pages.admin.product.product', [
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item = Category::where(['status' => 1])->get();
        return view('pages.admin.product.form-product', [
            'itemCategory' => $item
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        // insert semuanya jika sudah divalidasi oleh ProductRequest
        $data = $request->all();
        // bikin slug, pakai method bawaan laravel
        $data['slug'] = Str::slug($request->name);
        if (!isset($data['status'])) {
            $data['status'] = 0;
        }
        Product::create($data);
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         // jika ketemu keluarkan data, jika tidak lgsg page 404
         $item = Product::findOrFail($id);
         $category = Category::where(['status' => 1])->get();
         return view('pages.admin.product.form-product', [
             'item' => $item,
             'itemCategory' => $category
         ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {

        // insert semuanya jika sudah divalidasi oleh ProductRequest
        $data = $request->all();
        // bikin slug, pakai method bawaan laravel
        $data['slug'] = Str::slug($request->name);
        if (!isset($data['status'])) {
            $data['status'] = 0;
        }

        $item = Product::findOrFail($id);
        $item->update($data);
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
