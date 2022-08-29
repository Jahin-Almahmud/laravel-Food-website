<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.gallery.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $gallery_image = $request->gallery_image;
        if ($gallery_image) {
            $imageName = uniqid().".".$gallery_image->getClientOriginalExtension();
            // check category dir exists
            if (!Storage::disk('public')->exists(path:'gallery_image')) {
                Storage::disk('public')->makeDirectory(path:'gallery_image');
            }

            $category = Image::make($gallery_image)->resize(207,155)->save('foo');
            Storage::disk('public')->put('gallery_image/'.$imageName,$category);

            if (!Storage::disk('public')->exists(path:'gallery_image/thumnail')) {
                Storage::disk('public')->makeDirectory(path:'gallery_image/thumnail');
            }

            $category = Image::make($gallery_image)->resize(800,600)->save('foo');
            Storage::disk('public')->put('gallery_image/thumnail/'.$imageName,$category);
        }else{
            $imageName = 'default.png';
        }
        Gallery::insert([
            'gallery_image' => $imageName,
            'created_at' => Carbon::now(),
        ]);
        Toastr::success('gallery created successfully', 'success');
        return redirect()->route('admingallery.index');

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gallery = Gallery::find($id);
        if (Storage::disk('public')->exists(path:'gallery_image/'.$gallery->gallery_image)) {
            Storage::disk('public')->delete('gallery_image/'.$gallery->gallery_image);
        }
        $gallery->delete();
        Toastr::success('created successfully', 'success');
        return redirect()->route('admingallery.index');

    }
}
