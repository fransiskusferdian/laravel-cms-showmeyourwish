<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Content;
use App\Profile;
use App\Http\Requests\Admin\ContentRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Content::all();
        return view('pages.admin.content.index',['items'=>$items]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.content.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContentRequest $request)
    {
        $data = $request->all();
        $image = $request->file('image');
        $data['slug'] = Str::slug($request->title);
        
        if($image){
            $img = $image->getClientOriginalName();
            $path = 'public/assets/content/';
            $data['image'] = $path.$img;
            Storage::putFileAs($path, $image, $img); 
        }
       
      
        Content::create($data);

        return redirect()->route('content.index')->withSuccess('Content created!');;    

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
    public function edit(Content $content)
    {
        return view('pages.admin.content.edit',['content' => $content]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Content $content)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->title);
        $item = Content::findOrFail($content->id);

        if($request->image) {
            $path = 'public/assets/content/';
            $img = $data['image']->getClientOriginalName();
            $data['image'] = $path.$img;
            Storage::delete($item->image);
            Storage::putFileAs($path, $request->file('image'), $img);      
        }

        $item->update($data); 

        return redirect()->route('content.index')->withSuccess('Content updated!');;    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Content $content)
    {
        $content = Content::findOrFail($content->id);
        $deleteimage = Storage::delete($content->image);
        $content->delete();
        return redirect()->route('content.index')->withDanger('Content removed!');;    
    }
}
