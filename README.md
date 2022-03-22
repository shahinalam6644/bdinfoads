<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## LaraPress Documentation

- [Documentation](https://laravel.com/docs/).

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Making lara theme

* Making blog theme

== Folder Stucture==

- -resources/views/front/themes
- --default                              //theme name
- ---layouts/master.blade.php            //main master file of headerfooter
- ---index.blade.php                     //main home page or blog/post list
- ---page.blade.php                      //page 
- ---sidebar.blade.php                   //sidebar is all widgets
- ---single.blade.php                    //details of blog
- ---slider.blade.php                    //home page top slider

# master.blade.php
```html
 <html>
 <head>
  <link href="{{ asset('front/css/styles.css')}}" rel="stylesheet" />//all site assets is 'public/front' folder
 </head>
 <body>
  //when login user show username
  @auth()
   Profile ({{ optional(auth()->user())->name}})
  @endauth
 //its guest mode
  @guest()
  @endguest

  @yield('content')                                 //main content

 </body>
</html>
```
//FUll featured will provide default theme

# index.blade.php
- @extends('front.themes.default.layouts.master')   // 'default' its a theme name
- @section('content')
- - @include('front.themes.default.slider')         //if want to enable slider in index page
- @foreach($posts as $post)
- {{$post->thumbnail_path}}
- {{ $post->created_at }}
- {{ $post->title }}
- {!! $post->excerpt !!}
- @endforeach
- {!! $posts->links() !!}                           //pagination
- @include('front.themes.default.sidebar')          //sidebar
- @endsection  

# page.blade.php
- @extends('front.themes.default.layouts.master')
- @section('content')
- {{ $page->title }}
- {!! $page->content !!}
- @endsection

# single.blade.php
- @extends('front.themes.default.layouts.master')
- @section('content')
- {{ $post->title }}
- {{ $post->thumbnail_path }}
- {{ $post->created_at }}
- {!! $post->content !!}
- @include('front.themes.default.sidebar')
- @endsection  

# sidebar.blade.php
- sideber widget

# slider.blade.php    
- @php $data = 0;  @endphp 
- @foreach($sliders as $slider)
- {{ $data == 0? 'active':''}}
- {{ $slider->title }}
- {{ $slider->short_des }}
- @php $data++  @endphp   
- @endforeach

# All Routing
- {{ url('/dashboard')}}  //admin page
- {{ url('/logout')}}
- {{ url('/login')}}
- {{ url('/register')}}
- {{ url('single/'.$post->id) }}  //all details of single page link
- {{$post->thumbnail_path}} //single page thumbnails
- {{ $page->thumbnail_path }}