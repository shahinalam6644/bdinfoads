<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Config\auth;

class AuthController extends Controller
{
    
    //register
    public function showRegisterForm(){
        return view('admin.user.front.create');
    }
    public function prosessRegister(Request $request){
        //validation
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'role' => ''
        ]);
        $users = User::all();

        if($users->count() == 0){
            $users->role = 111;
        }else{
            $users->role = 0;
        }
        $data = [
            'name' => $request->input('name'),
            'email' => strtolower($request->input('email')),
            'password' => bcrypt($request->input('password')),
            'role' => $users->role
        ];
        try{
            User::create($data);
            $this->setSuccessfullyMessage('User account created.');
            

            return redirect()->route('login');
        }catch(Exeption $e){
            $this->setErrorMessage($e->getMessage());

            return redirect()->back();
        }

     }
    //login
    public function showLoginForm(){
        return view('admin.user.front.login'); 
    }
    public function processLogin(Request $request){

         //validation
         $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        $credentials = $request->except(['_token']);

       // dd(auth()->attempt($credentials));
        if (auth()->attempt($credentials)){
            //return redirect()->route('/dashboard');
            //return redirect('/dashboard');

             //user login check if usr is active
            if( optional(auth()->user())->role == 0){ 
                auth()->logout();
                $this->setErrorMessage('User approval is pending...'); 
                return redirect()->back();
            }else{
                return redirect('/dashboard');
            }
 
        }            
        $this->setErrorMessage('Invalid credential'); 
        return redirect()->back();      
    }

    public function logout(){
        
        auth()->logout();

        $this->setSuccessfullyMessage('User has been logged-out.');
        return redirect()->route('login');
    }

    
}
