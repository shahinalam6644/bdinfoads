<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ads; 
use App\Models\Media;

class AdsController extends Controller
{
    //--login system
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ads = Ads::all();

        return view('admin.ads.index',compact('ads')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        //insert media library
        $medies = Media::orderBy('id','DESC')->get();
        return view('admin.ads.create',compact('medies'));        

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'date' => '', 
            'thumbnail_path' => '', 
            'link' => '', 
            'status' => ''
        ]);

        Ads::create($validated);

        session()->flash('message','Data insert successfully');
        return redirect('/dashboard/ads');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ads = Ads::find($id);
        return view('admin.ads.show',compact('ads'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ads = Ads::find($id);

        //insert media library
        $medies = Media::orderBy('id','DESC')->get(); 
        return view('admin.ads.edit',compact('ads','medies'));
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
        $ads = Ads::find($id);
        $ads->update($request->all());

        session()->flash('message','Data update successfully');
        return redirect('/dashboard/ads');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Ads::destroy($id); 
        session()->flash('messageDestroy','Data Delete successfully');
        return redirect('/dashboard/ads');
    }
}
