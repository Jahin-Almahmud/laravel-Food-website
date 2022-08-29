<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
Use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.slider.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.slider.create');
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

       if (sliders()->count() == 0) {
        $slider_title =  $request->slider_title;
        $slider_description =  $request->slider_description;
        $slider_image =  $request->slider_image;
        if ($slider_image) {
            $imageName = uniqid().".".$slider_image->getClientOriginalExtension();

            // check category dir exists
            if (!Storage::disk('public')->exists(path:'slider_image')) {
                Storage::disk('public')->makeDirectory(path:'slider_image');
            }
            $category = Image::make($slider_image)->resize(610,610)->save('foo');
             Storage::disk('public')->put('slider_image/'.$imageName,$category);
        }else{
            $imageName = 'default.png';

        }
        Slider::insert([
            'slider_title' => $slider_title,
            'slider_description' => $slider_description,
            'slider_image' => $imageName,
            'created_at' => Carbon::now(),
        ]);
        Toastr::success('slider created successfully', 'success');
        return redirect()->route('adminslider.index');
       }else {
        Toastr::info('One slider already exists. please delete this one ,then try ! ');
        return redirect()->route('adminslider.index');
       }

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
        $slider = Slider::find($id);
        return view('dashboard.slider.edit',compact('slider'));
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
        $slider = Slider::find($id);
        $slider_title =  $request->slider_title;
        $slider_description =  $request->slider_description;
        $slider_image =  $request->slider_image;
        if ($slider_image) {
            if (Storage::disk('public')->exists('slider_image/'.$slider->slider_image)) {
                Storage::disk('public')->delete('slider_image/'.$slider->slider_image);
            }
            $imageName = uniqid().".".$slider_image->getClientOriginalExtension();

            // check category dir exists
            if (!Storage::disk('public')->exists(path:'slider_image')) {
                Storage::disk('public')->makeDirectory(path:'slider_image');
            }
            $category = Image::make($slider_image)->resize(610,610)->save('foo');
             Storage::disk('public')->put('slider_image/'.$imageName,$category);
        }else{
            $imageName = 'default.png';

        }
        $slider->update([
            'slider_title' => $slider_title,
            'slider_description' => $slider_description,
            'slider_image' => $imageName,
            'updated_at' => Carbon::now(),
        ]);
        Toastr::success('slider Updated successfully', 'success');
        return redirect()->route('adminslider.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Slider::find($id);

        if (Storage::disk('public')->exists('slider_image/'.$slider->slider_image)) {
            Storage::disk('public')->delete('slider_image/'.$slider->slider_image);
        }
        $slider->delete();
        Toastr::success('slider deleted successfully', 'success');
        return redirect()->route('adminslider.index');
    }
}
