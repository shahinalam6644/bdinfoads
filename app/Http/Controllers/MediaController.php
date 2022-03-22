<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Media;

class MediaController extends Controller
{
    public function index()
    {
        
        //$medies = Media::all();

        $medies = Media::orderBy('id','DESC')->get();

        return view('admin.media.index',compact('medies')); 
    }

    public function create()
    {
        return view('admin.media.create');
    }
    public function store(Request $request)
    {

        $validated = $request->validate([
            'img_name' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
        ]);


        $imageName = time().'.'.$request->img_name->extension();  
        $request->img_name->move(public_path('public/images'), $imageName);
        $input = $request->all();
        $input['img_name'] = "$imageName";

        Media::create($input);

        session()->flash('message','Data insert successfully');
        return redirect('/dashboard/media');
    }

    public function destroy($id)
    {
        //img distroy
        $media = Media::find($id);
        if($media->img_name){
            unlink("public/images/".$media->img_name);
        }else{}

        Media::destroy($id); 

        session()->flash('messageDestroy','Data Delete successfully');
        return redirect('/dashboard/media');
    }




}
