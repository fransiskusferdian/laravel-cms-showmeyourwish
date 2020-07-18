<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Feature;
use App\Profile;
use App\Http\Requests\Admin\FeatureRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class FeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Feature::all();
        return view('pages.admin.feature.index',['items'=>$items]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.feature.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FeatureRequest $request)
    {
        $data = $request->all();
        $image = $request->file('image');
        $data['slug'] = Str::slug($request->title);
        if($image){
            $img = $image->getClientOriginalName();
            $path = 'public/assets/features/';
            $data['image'] = $path.$img;
            Storage::putFileAs($path, $image, $img);
        }
         
        Feature::create($data);

        return redirect()->route('feature.index')->withSuccess('Feature created!');;    
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
    public function edit(Feature $feature)
    {
        return view('pages.admin.feature.edit',['feature' => $feature]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Feature $feature)
    {
        $data =$request->all();
        $data['slug'] = Str::slug($request->title);
        $item = Feature::findOrFail($feature->id);

        if($request->image) {
            $path = 'public/assets/features/';
            $img = $data['image']->getClientOriginalName();
            $data['image'] = $path.$img;
            Storage::delete($item->image);
            Storage::putFileAs($path, $request->file('image'), $img);      
        }

        $item->update($data); 

        return redirect()->route('feature.index')->withSuccess('Feature updated!');;    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Feature $feature)
    {
        $feature= Feature::findOrFail($feature->id);
        $deleteimage = Storage::delete($feature->image);
        $feature->delete();
        return redirect()->route('feature.index')->withDanger('Feature removed!');;    
    }
}
