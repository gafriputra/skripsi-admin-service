<?php

namespace App\Http\Controllers\Admin\Store\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\GalleryRequest;
use App\Models\Product\Product;
use App\Models\Product\Gallery;

use Illuminate\Http\Request;

class GalleriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product_id = $_GET['p'];
        return view('pages.admin.product.form-gallery')->with([
            'product_id' => $product_id
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GalleryRequest $request)
    {
        $data = $request->all();
        $data['image'] = $request->file('image')->store(
            'assets/image/product', 'public'
        );

        if (!isset($data['is_default'])) {
            $data['is_default'] = 0;
        }

        if (!isset($data['status'])) {
            $data['status'] = 0;
        }

        Gallery::create($data);
        return redirect()->route('gallery.show', $data['product_id']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $items = Gallery::with('product')->where(['product_id' => $id])->get();
        $product = Product::findOrFail($id);
        return view('pages.admin.product.gallery')->with([
            'items' => $items,
            'product' => $product
        ]);
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
        $item = Gallery::findOrFail($id);
        return view('pages.admin.product.form-gallery', [
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GalleryRequest $request, $id)
    {
        $data = $request->all();
        if ($request->file('image')) {
            $data['image'] = $request->file('image')->store(
                'assets/image/product', 'public'
            );

        }

        if (!isset($data['is_default'])) {
            $data['is_default'] = 0;
        }

        if (!isset($data['status'])) {
            $data['status'] = 0;
        }

        $item = Gallery::findOrFail($id);
        $item->update($data);
        return redirect()->route('gallery.show', $data['product_id']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Gallery::findOrFail($id);
        $item->delete();

        return redirect()->route('product-galleries.index');
    }
}
