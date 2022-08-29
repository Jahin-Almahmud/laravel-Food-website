<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Food;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.food.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.food.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $food_image =$request->food_image;
        if ($food_image) {
            $imageName = uniqid().".".$food_image->getClientOriginalExtension();

            // check category dir exists
            if (!Storage::disk('public')->exists(path:'food_image')) {
                Storage::disk('public')->makeDirectory(path:'food_image');
            }
            $category = Image::make($food_image)->resize(236,236)->save('foo');
             Storage::disk('public')->put('food_image/'.$imageName,$category);
        }else{
            $imageName = 'default.png';
        }
        Food::insert([
            'food_image'=> $imageName,
            'food_name'=> $request->food_name,
            'food_price'=> $request->food_price,
            'category_id'=> $request->category_id,
            'created_at'=> Carbon::now(),
        ]);
        Toastr::success('Food created successfully', 'success');
        return redirect()->route('adminfood.index');

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
        $food =  Food::find($id);
        if (Storage::disk('public')->exists('food_image/'.$food->food_image)) {
            Storage::disk('public')->delete('slider_image/'.$food->food_image);
        }
        $food->delete();
        Toastr::success('Food deleted successfully', 'success');
        return redirect()->route('adminfood.index');
    }
}
