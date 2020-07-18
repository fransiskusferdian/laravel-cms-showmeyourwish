<?php

namespace App\Http\Controllers;

use App\Portfolio;
use App\Banner;
use App\Profile;
use App\About;
use App\Subcategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $banners = Banner::all();
        $subcategories = Subcategory::all();
        $profile = Profile::first();
      

        $photos = Portfolio::with(['display', 'subcategory'])
               ->where('category_id', 1)
               ->orderBy('id', 'desc')
               ->take(9)
               ->get();


        $about = About::first();

        
        return view('pages.index', [
            'photos' => $photos,
            'subcategories' => $subcategories,
            'banners' => $banners,
            'about' => $about,            
            'profile' => $profile,            
        ]);
    }
}
