<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Slider;
use App\Models\User;
use App\Models\Media;

class SlidersController extends Controller
{
    //--login system
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $sliders = Slider::all();
        return view('admin.sliders.index',compact('sliders')); 
    }

    public function create()
    {
        //insert media library
        $medies = Media::orderBy('id','DESC')->get();
        return view('admin.sliders.create',compact('medies'));        

    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'user_id' => '',
            'title' => 'required',
            'sub_title' => 'required',
            'short_des' => 'required',
            'thamb_path' => '',
            'status' => '', 
            'trash' => '', 
        ]);
         
        Slider::create($validated);
        /* Store $imageName name in DATABASE from HERE */
        session()->flash('message','Data insert successfully');
        return redirect('/dashboard/sliders');
    }
    public function show($id)
    {
        $slider = Slider::find($id);
        //all user for last modified
        $users = User::all();
        return view('admin.sliders.show',compact('slider','users'));
    }

    public function edit($id)
    {
        $sliders = Slider::find($id);
        //insert media library
        $medies = Media::orderBy('id','DESC')->get();
        return view('admin.sliders.edit',compact('sliders','medies'));
    }

    public function update(Request $request, $id)
    {
        $sliders = Slider::find($id);
        $sliders->update($request->all());
        session()->flash('message','Data update successfully');
        return redirect('/dashboard/sliders/');

    }
    public function destroy($id)
    { 
        Slider::destroy($id); 
        session()->flash('messageDestroy','Data Delete successfully');
        return redirect('/dashboard/sliders');
    }
}
