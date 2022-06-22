<?php

namespace App\Http\Controllers\Admin\Store\Product;

use App\Http\Controllers\Controller;
use App\Models\Product\Product;
use App\Models\Product\Document;
use Illuminate\Http\Request;

class DocumentsController extends Controller
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product_id = $_GET['p'];
        return view('pages.admin.product.form-document')->with([
            'product_id' => $product_id
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        if (!isset($data['status'])) {
            $data['status'] = 0;
        }

        Document::create($data);
        return redirect()->route('document.show', $data['product_id']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $items = Document::with('product')->where(['product_id' => $id])->get();
        $product = Product::findOrFail($id);
        return view('pages.admin.product.document')->with([
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
        $item = Document::findOrFail($id);
        return view('pages.admin.product.form-document', [
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
    public function update(Request $request, $id)
    {
         $data = $request->all();

        if (!isset($data['status'])) {
            $data['status'] = 0;
        }

        $item = Document::findOrFail($id);
        $item->update($data);
        return redirect()->route('document.show', $data['product_id']);
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
