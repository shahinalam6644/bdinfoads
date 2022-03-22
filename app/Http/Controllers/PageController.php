<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Category;
use App\Models\User;
use App\Models\Media;

class PageController extends Controller
{
    //--login system
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $pages = Page::all();
        return view('admin.pages.index',compact('pages')); 
    }

    public function create()
    {
        //insert media library
        $medies = Media::orderBy('id','DESC')->get();
        //insert category and user 
        $categories = Category::all();
        return view('admin.pages.create',compact('categories','medies'));        

    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'user_id' => '',
            'title' => 'required',
            'content' => '',
            'thumbnail_path' => '',
            'status' => '', 
        ]);
         
        Page::create($validated);
        /* Store $imageName name in DATABASE from HERE */
        session()->flash('message','Data insert successfully');
        return redirect('/dashboard/pages');
    }
    public function show($id)
    {
        $page = Page::find($id);
        //all user for last modified
        $users = User::all();
        return view('admin.pages.show',compact('page','users'));
    }

    public function edit($id)
    {
        $pages = Page::find($id);
        $categories = Category::all(); //show all category from db
        //insert media library
        $medies = Media::orderBy('id','DESC')->get();
        return view('admin.pages.edit',compact('pages','categories','medies'));
    }

    public function update(Request $request, $id)
    {
        $pages = Page::find($id);
        $pages->update($request->all());
        session()->flash('message','Data update successfully');
        return redirect('/dashboard/pages/');

    }
    public function destroy($id)
    { 
        Page::destroy($id); 
        session()->flash('messageDestroy','Data Delete successfully');
        return redirect('/dashboard/pages');
    }
}
