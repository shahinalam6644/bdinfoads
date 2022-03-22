<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Config\auth;
use App\Models\Page;
use App\Models\Post;
use App\Models\Category;

class AdminController extends Controller
{
    //--login system
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    //admin dashboard
    public function dashboard(){

        $posts = Post::get();
        $pages = Page::get();
        $categories = Category::get();
        $users = User::get();
        return view('admin.index',compact('posts','pages','categories','users'));
    }

    //all user create
    public function showUser()
    {
        $user = User::all();
        return view('admin.user.backend.index',compact('user'));
    }
    //delete
    public function destroy($id)
    {
        User::destroy($id); 
        session()->flash('messageDestroy','Data Delete successfully');
        return redirect('/dashboard/showUser');
    }
    //create
    public function create()
    {
        return view('admin.user.backend.create');        

    }
    public function singleUser($id)
    {
        $user = User::find($id);
        return view('admin.user.backend.show',compact('user'));        

    }
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.user.backend.edit',compact('user'));        

    }
    public function update(Request $request, $id)
    {
        //validation
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed',
            'role' => ''
        ]);
        // $userId = User::find($id);   
        // $message = 'User update successfully';    
        // $users = User::all();
        // foreach ($users as $user) {
        //     if($user->email == $request->email){
        //         if($user->id == $userId->id){
        //             $message = 'User update successfully';
        //         }else{
        //             $message = 'Email Already Exists and user update successfully';
        //         }               
        //     }
        // }
        
        $data = [
            'name' => $request->input('name'),
            'email' => strtolower($request->input('email')),
            'password' => bcrypt($request->input('password')),
            'role' => $request->input('role')
        ];
        try{

           // User::create($data);

            $user = User::find($id);
            $user->update($data);

            session()->flash('message','User update successfully');
            return redirect('/dashboard/showUser');



        }catch(Exeption $e){
            $this->setErrorMessage($e->getMessage());

            return redirect()->back();
        }
    }
    public function profile()
    {
        return view('admin.user.backend.profile');        

    }

    //----------------
    // public function search(Request $request)
    // {
    //     $cari = $request->get('search');
    //     $Title = Post::where('title', 'LIKE', '%' .$cari . '%')->paginate(10);
    //    dd($Title);
    // }
    
}
