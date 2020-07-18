<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Service;
use App\Profile;
use App\Http\Requests\Admin\ServiceRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Service::all();
        return view('pages.admin.service.index',['items'=>$items]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.service.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceRequest $request)
    {
        $data = $request->all();
        $image = $request->file('image');
        $data['slug'] = Str::slug($request->title);
        if($image){
            $img = $image->getClientOriginalName();
            $path = 'public/assets/services/';
            $data['image'] = $path.$img;

            Storage::putFileAs($path, $image, $img); 
        }
      
        Service::create($data);

        return redirect()->route('service.index')->withSuccess('Service created!');;    

        // return redirect()->route('promotion')->withSuccess('Banner created!');;  
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
    public function edit(Service $service)
    {
        return view('pages.admin.service.edit',['service' => $service]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ServiceRequest $request, Service $service)
    {
        $data =$request->all();
        $data['slug'] = Str::slug($request->title);
        $item = Service::findOrFail($service->id);

        if($request->image) {
            $path = 'public/assets/services/';
            $img = $data['image']->getClientOriginalName();
            $data['image'] = $path.$img;
            Storage::delete($item->image);
            Storage::putFileAs($path, $request->file('image'), $img);      
        }

        $item->update($data); 

        return redirect()->route('service.index')->withSuccess('Service updated!');;    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $service= Service::findOrFail($service->id);
        $deleteimage = Storage::delete($service->image);
        $service->delete();
        return redirect()->route('service.index')->withDanger('Service removed!');;    
    }
}
