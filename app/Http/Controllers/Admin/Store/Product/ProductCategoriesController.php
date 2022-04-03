<?php

namespace App\Http\Controllers\Admin\Store\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\CategoryRequest;
use App\Models\Product\Category;

class ProductCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // ambil semua data
        $items = Category::orderBy('id', 'DESC')->get();
        return view('pages.admin.product.category', [
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
        //
        return view('pages.admin.product.form-category');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        // insert semuanya jika sudah divalidasi oleh ProductRequest
        $data = $request->all();
        if (!isset($data['status'])) {
            $data['status'] = 0;
        }
        Category::create($data);
        return redirect()->route('product-categories.index');
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
        $item = Category::findOrFail($id);
        // return view('pages.products.edit')
        //     ->with([
        //         'item' => $item
        //     ]);
        return view('pages.admin.product.form-category', [
            'item' => $item,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        // insert semuanya jika sudah divalidasi oleh ProductRequest
        $data = $request->all();
        if (!isset($data['status'])) {
            $data['status'] = 0;
        }
        // cari data
        $item = Category::findOrFail($id);
        // update data
        $item->update($data);
        return redirect()->route('product-categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //cari category
        $item = Category::findOrFail($id);
        // hapus
        $item->delete();
        // hapus gambar
        // ProductGallery::where('product_id', $id)->delete();
        return redirect()->route('product-categories.index');
    }
}
