<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Chef;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ChefController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.chef.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.chef.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            '*' => 'required',
        ]);
        $chef_image =  $request->chef_image;
        if ($chef_image) {
            $imageName = uniqid().".".$chef_image->getClientOriginalExtension();
            // check category dir exists
            if (!Storage::disk('public')->exists(path:'chef_image')) {
                Storage::disk('public')->makeDirectory(path:'chef_image');
            }
            $category = Image::make($chef_image)->resize(600,600)->save('foo');
            Storage::disk('public')->put('chef_image/'.$imageName,$category);
        }else{
            $imageName = 'default.png';
        }
        Chef::insert([
            'chef_image' => $imageName,
            'chef_name' => $request->chef_name,
            'chef_title' => $request->chef_title,
            'chef_description' => $request->chef_description,
            'created_at' => Carbon::now(),
        ]);

        Toastr::success('category created successfully');
        return redirect()->route('adminchef.index');

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
        $chef = Chef::find($id);
        if (Storage::disk('public')->exists('chef_image/'.$chef->chef_image)) {
            Storage::disk('public')->delete('chef_image/'.$chef->chef_image);
        }
        $chef->delete();
        Toastr::success('Deleted successfully');
        return redirect()->route('adminchef.index');
    }
}
