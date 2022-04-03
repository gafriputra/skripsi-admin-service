<?php

namespace App\Http\Controllers\Admin\CompanyProfile;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyProfile\BannerRequest;
use App\Models\CompanyProfile\Banner;

class BannersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // ambil semua data
        $items = Banner::orderBy('id', 'DESC')->get();
        return view('pages.admin.cp.banner.index', [
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
        return view('pages.admin.cp.banner.form-banner');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BannerRequest $request)
    {
        // insert semuanya jika sudah divalidasi oleh ProductRequest
        $data = $request->all();
        // die;
        $data['image'] = $request->file('image')->store(
            'assets/image/banner',
            'public'
        );

        if (!isset($data['status'])) {
            $data['status'] = 0;
        }

        Banner::create($data);
        return redirect()->route('banners.index');
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
        // ambil semua data
        $item = Banner::findOrFail($id);
        return view('pages.admin.cp.banner.form-banner', [
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
    public function update(BannerRequest $request, $id)
    {
        // insert semuanya jika sudah divalidasi oleh ProductRequest
        $data = $request->all();
        // cari data
        $item = Banner::findOrFail($id);
        // cek gambar
        if ($request->file('image')) {
            unlink('storage/' . $item->image);
            $data['image'] = $request->file('image')->store(
                'assets/image/banner',
                'public'
            );
        } else {
            $data['image'] = $item->image;
        }

        if (!isset($data['status'])) {
            $data['status'] = 0;
        }
        // update data
        $item->update($data);
        return redirect()->route('banners.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //cari data
        $item = Banner::findOrFail($id);
        unlink('storage/' . $item->image);
        // hapus
        $item->delete();
        return redirect()->route('banners.index');
    }
}
