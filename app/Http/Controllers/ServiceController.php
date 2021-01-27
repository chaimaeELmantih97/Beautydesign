<?php

namespace App\Http\Controllers;

use App\Models\Service;
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
        $services=Service::orderBy('id','DESC')->paginate(10);
        return view('backend.service.index')->with('services',$services);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.service.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        $this->validate($request,[
            'title'=>'string|required|max:50',
            'tag'=>'string|required',
            'description'=>'string|required',
        ]);
        $data=$request->all();
        $slug=Str::slug($request->title);
        $count=service::where('slug',$slug)->count();
        if($count>0){
            $slug=$slug.'-'.date('ymdis').'-'.rand(0,999);
        }
        $data['slug']=$slug;
        $status=Service::create($data);
        if($status){
            request()->session()->flash('success','service ajoutée avec succès');
        }
        else{
            request()->session()->flash('error','Une erreur s\'est produite lors de l\'ajout de la service');
        }
        return redirect()->route('service.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service=Service::findOrFail($id);
        return view('backend.service.edit')->with('service',$service);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $service=Service::findOrFail($id);
        $this->validate($request,[
            'title'=>'string|required|max:50',
            'tag'=>'string|required',
            'description'=>'string|required',
        ]);
        $data=$request->all();
        $status=$service->fill($data)->save();
        if($status){
            request()->session()->flash('success','service mise à jour avec succès');
        }
        else{
            request()->session()->flash('error','Une erreur s\'est produite lors de la mise à jour de la service');
        }
        return redirect()->route('service.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service=Service::findOrFail($id);
        $status=$service->delete();
        if($status){
            request()->session()->flash('success','service supprimée avec succès');
        }
        else{
            request()->session()->flash('error','Une erreur s\'est produite lors de la suppression de la service');
        }
        return redirect()->route('service.index');
    }
}
