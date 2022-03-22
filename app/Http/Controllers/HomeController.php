<?php

namespace App\Http\Controllers;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Page;
use App\Models\Slider;
use App\Models\Settings;
use App\Models\Ads;
use Artisan;
use File;
use DB;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index(){
        $posts = Post::paginate(2);
        $sliders = Slider::all();

        //set as home page
        $setting = Settings::all();
        if($setting->count() == 0){
            $themeName = "default";
        }else{
            foreach($setting as $sttingsVlue){
                $themeName = $sttingsVlue->home_url;
            }
        }

       // dd($themeName);

        return view('front.themes.'.$themeName.'.index',compact('posts','sliders'));

    }

    public function single($id){ 
        $post = Post::find($id);

        //set as home page
        $setting = Settings::all();
        if($setting->count() == 0){
            $themeName = "default";
        }else{
            foreach($setting as $sttingsVlue){
                $themeName = $sttingsVlue->home_url;
            }
        }
        return view('front.themes.'.$themeName.'.single',compact('post'));
    }
    public function page($id){ 
        $page = Page::find($id);
        //set as home page
        $setting = Settings::all();
        if($setting->count() == 0){
            $themeName = "default";
        }else{
            foreach($setting as $sttingsVlue){
                $themeName = $sttingsVlue->home_url;
            }
        }
        return view('front.themes.'.$themeName.'.page',compact('page'));
    }
    // setup
    public function migrate(){ 
        Artisan::call('migrate');
        return view('admin.user.front.create');
        
    }

    public function ads(){
        //set as home page
        $setting = Settings::all();
        if($setting->count() == 0){
            $themeName = "default";
        }else{
            foreach($setting as $sttingsVlue){
                $themeName = $sttingsVlue->home_url;
            }
        }
        $ads = Ads::all();
        return view('front.themes.'.$themeName.'.ads',compact('ads'));
    }
    
}
