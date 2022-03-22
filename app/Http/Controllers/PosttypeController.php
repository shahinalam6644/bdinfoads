<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posttype;
use Illuminate\Support\Str;

class PosttypeController extends Controller
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
       $posttypes = Posttype::all();

       return view('admin.posttypes.index',compact('posttypes')); 
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
       return view('admin.posttypes.create');        

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
           'name' => 'required|min:5', 
           'slug' => 'unique:posts', 
           'status' => 'required', 
       ]);

       //$slug = Str::slug($request->name, '-');
       $slug= $this->createSlug($request->name);
       
       $input = $request->all();
       $input['slug'] = "$slug";

       Posttype::create($input);

       session()->flash('message','Data insert successfully');
       return redirect('/dashboard/posttypes');
   }

   // create diffrent slug
   public function createSlug($title, $id = 0)
   {
       $slug = Str::slug($title);
       $allSlugs = $this->getRelatedSlugs($slug, $id);
       if (! $allSlugs->contains('slug', $slug)){
           return $slug;
       }

       $i = 1;
       $is_contain = true;
       do {
           $newSlug = $slug . '-' . $i;
           if (!$allSlugs->contains('slug', $newSlug)) {
               $is_contain = false;
               return $newSlug;
           }
           $i++;
       } while ($is_contain);
   }
   protected function getRelatedSlugs($slug, $id = 0)
   {
       return Posttype::select('slug')->where('slug', 'like', $slug.'%')
       ->where('id', '<>', $id)
       ->get();
   }
   // slug---

   /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function show($id)
   {
       $posttypes = Posttype::find($id);
       return view('admin.posttypes.show',compact('posttypes'));
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function edit($id)
   {
       $posttypes = Posttype::find($id);

       return view('admin.posttypes.edit',compact('posttypes'));
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
       $posttypes = Posttype::find($id);
       $posttypes->update($request->all());

       session()->flash('message','Data update successfully');
       return redirect('/dashboard/posttypes');
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function destroy($id)
   {
       Category::destroy($id); 
       session()->flash('messageDestroy','Data Delete successfully');
       return redirect('/dashboard/posttypes');
   }
}