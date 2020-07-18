<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Benefit;
use App\Profile;
use App\Http\Requests\Admin\BenefitRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class BenefitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Benefit::all();
        return view('pages.admin.benefit.index',['items'=>$items]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.benefit.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BenefitRequest $request)
    {
        $data = $request->all();
        $image = $request->file('image');
        $data['slug'] = Str::slug($request->title);
        
        if($image){
            $img = $image->getClientOriginalName();
            $path = 'public/assets/benefit/';
            $data['image'] = $path.$img;
            Storage::putFileAs($path, $image, $img); 
        }
       
      
        Benefit::create($data);

        return redirect()->route('benefit.index')->withSuccess('Benefit created!');;    

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
    public function edit(Benefit $benefit)
    {
        return view('pages.admin.benefit.edit',['benefit' => $benefit]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Benefit $benefit)
    {
        $data =$request->all();
        $data['slug'] = Str::slug($request->title);
        $item = Benefit::findOrFail($benefit->id);

        if($request->image) {
            $path = 'public/assets/benefit/';
            $img = $data['image']->getClientOriginalName();
            $data['image'] = $path.$img;
            Storage::delete($item->image);
            Storage::putFileAs($path, $request->file('image'), $img);      
        }

        $item->update($data); 

        return redirect()->route('benefit.index')->withSuccess('Benefit updated!');;    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Benefit $benefit)
    {
        $benefit= Benefit::findOrFail($benefit->id);
        $deleteimage = Storage::delete($benefit->image);
        $benefit->delete();
        return redirect()->route('benefit.index')->withDanger('Benefit removed!');;    
    }
}
