<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use App\Models\Media;
use App\Models\Posttype;

class PostController extends Controller
{
    //--login system
    public function __construct()
    {
        $this->middleware('auth');
    }
    //-------
    
    public function index()
    {
        $posts = Post::all();
        $categories = Category::all();
        return view('admin.posts.index',compact('posts','categories')); 
    }

    public function create()
    {
        //insert media library
        $medies = Media::orderBy('id','DESC')->get();
        //insert category and user 
        $categories = Category::all();
        $posttypes = Posttype::all();
        return view('admin.posts.create',compact('categories','medies','posttypes'));        

    }

    public function store(Request $request)
    {
        //if image upload with vlidation
        // $request->validate([
        //     'title' => 'required',
        //     'user_id' => '',
        //     'content' => '',
        //     'thumbnail_path' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ]);
        // $imageName = time().'.'.$request->thumbnail_path->extension();  
        // $request->thumbnail_path->move(public_path('images'), $imageName);
        // $input = $request->all();
        // $input['thumbnail_path'] = "$imageName";
        // Post::create($input);
        // session()->flash('message','Data insert successfully');
        // return redirect('/dashboard/posts');

        $validated = $request->validate([
            
            'user_id' => '',
            'category_id' => '',
            'title' => 'required',
            'content' => '',
            'excerpt' => '',
            'thumbnail_path' => '',
            'post_type' => '',
            'status' => '', 
        ]);
         
        Post::create($validated);
        /* Store $imageName name in DATABASE from HERE */
        session()->flash('message','Data insert successfully');
        return redirect('/dashboard/posts');
    }
    public function show($id)
    {
        $post = Post::find($id);
        //all user for last modified
        $users = User::all();
        return view('admin.posts.show',compact('post','users'));
    }

    public function edit($id)
    {
        $posts = Post::find($id);
        $categories = Category::all(); //show all category from db        
        $posttypes = Posttype::all();
        //insert media library
        $medies = Media::orderBy('id','DESC')->get();
        return view('admin.posts.edit',compact('posts','categories','medies','posttypes'));
    }

    public function update(Request $request, $id)
    {
        $posts = Post::find($id);
        $posts->update($request->all());
        session()->flash('message','Data update successfully');
        return redirect('/dashboard/posts/');
    }
    public function destroy($id)
    {
        Post::destroy($id); 
        session()->flash('messageDestroy','Data Delete successfully');
        return redirect('/dashboard/posts');
    }
}
