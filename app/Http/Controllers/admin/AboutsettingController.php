<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Aboutsetting;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class AboutsettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.about.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.about.create');
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
            'about_description'=> 'required',
            'about_image'=> 'required',
            'youtube_video_backgroud_img'=> 'required',
            'about_youtube_video_url'=> 'nullable|regex:/^(?:https?:\/\/)?(?:m\.|www\.)?(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|watch\?.+&v=))((\w|-){11})(?:\S+)?$/i',
        ]);
        $about_image = $request->about_image;
        $youtube_video_backgroud_img = $request->youtube_video_backgroud_img;
        if ($about_image) {

            $aboutimageName = uniqid().".".$about_image->getClientOriginalExtension();

            // check category dir exists
            if (!Storage::disk('public')->exists(path:'about_image')) {
                Storage::disk('public')->makeDirectory(path:'about_image');
            }
            $category = Image::make($about_image)->resize(1024,768)->save('foo');
             Storage::disk('public')->put('about_image/'.$aboutimageName,$category);
        }else{
            $aboutimageName = 'default.png';

        }
        if ($youtube_video_backgroud_img) {

            $aboutyoutubeimageName = uniqid().".".$about_image->getClientOriginalExtension();

            // check category dir exists
            if (!Storage::disk('public')->exists(path:'about_image/youtube_video_backgroud_img')) {
                Storage::disk('public')->makeDirectory(path:'about_image/youtube_video_backgroud_img');
            }
             $category =  Image::make($youtube_video_backgroud_img)->resize(478,359)->save('foo');
             Storage::disk('public')->put('about_image/youtube_video_backgroud_img/'.$aboutyoutubeimageName,$category);
        }else{
            $aboutyoutubeimageName = 'default.png';

        }

        Aboutsetting::insert([
            'about_description'=> $request->about_description,
            'about_image'=> $aboutimageName,
            'about_youtube_video_backgroud_img'=> $aboutyoutubeimageName,
            'about_youtube_video_url'=> $request->about_youtube_video_url,

        ]);
        Toastr::success('created successfully', 'success');
        return redirect()->route('adminabout.index');

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
        $about = Aboutsetting::find($id);
        if (Storage::disk('public')->exists(path:'about_image/'. $about->about_image)) {
            Storage::disk('public')->delete('about_image/'. $about->about_image);
        }
        if (Storage::disk('public')->exists(path:'about_image/youtube_video_backgroud_img')) {
            Storage::disk('public')->delete('about_image/youtube_video_backgroud_img/'.$about->about_youtube_video_backgroud_img);
        }
        $about->delete();
        Toastr::success('Deleted successfully', 'success');
        return redirect()->route('adminabout.index');

    }
    public function status ($id)
    {
        $about = Aboutsetting::find($id);
        if ( $about->status == 'hide') {
            $about->update([
                'status' => 'show',
            ]);
            Aboutsetting::where('id' ,'!=', $id)->where('status','show')->update([
            'status' => 'hide',
           ]);

        }
        Toastr::success('successfull');
        return back();

    }
}
