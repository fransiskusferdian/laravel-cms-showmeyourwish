<?php

namespace App\Http\Controllers;

use App\Portfolio;
use App\Category;
use App\Profile;
use Illuminate\Http\Request;

class OurworkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug)
    {
        $categories = Category::all();
        $id = Category::where('slug', $slug)->first()->id;
        $portfolios = Category::find($id)->portfolios()->orderBy('id', 'desc')->paginate(3);
        $selected = $slug;
        $profile = Profile::first();
      
        // $portfolios = Portfolio::with(['display', 'category'])
        //      ->orderBy('id', 'desc')
        //      ->get();
        
         return view('pages.ourwork',[
            'profile' => $profile,
            'portfolios' => $portfolios,
            'categories' => $categories,
            'selected' => $selected
         ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
