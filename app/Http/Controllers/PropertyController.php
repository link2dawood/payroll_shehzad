<?php

namespace App\Http\Controllers;

use App\Models\Property as prop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prop = prop::all();
    
            return view('property.view', compact('prop'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('property.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $property =$request->all();
           
    

        if($request->file('map'))
        {
            $destinationPath = 'public/images/';
            $file = $request->file('map');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move($destinationPath, $filename);
            $property['map'] = $filename;
        }
        if($request->file('brochure'))
        {
            $file = $request->file('brochure');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'h.'.$extention;
            $file->move('public/images/', $filename);
            $property['brochure'] = $filename;
        }
        if($request->file('image'))
        {
            $destinationPath = 'public/images/';
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'k.'.$extention;
            $file->move($destinationPath, $filename);
            $property['image'] = $filename;
        }
        prop::create($property);
        return redirect()->route('list.prop')
            ->with('success', 'Post created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function show(Property $property)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $prop = prop::find($id);
    
        return view('property.edit', compact('prop'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $prop =$request->all();
        $post = prop::find($id);
        if($request->file('map'))
        {
            $destination = 'public/images/'.$post->map;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file = $request->file('map');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('public/images/', $filename);
            $prop['map'] = $filename;
        }
        if($request->file('brochure'))
        {
            $destination = 'public/images/'.$post->brochure;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file = $request->file('brochure');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'g.'.$extention;
            $file->move('public/images/', $filename);
            $prop['brochure'] = $filename;
        }
        if($request->file('image'))
        {
            $destination = 'public/images/'.$post->image;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'k.'.$extention;
            $file->move('public/images/', $filename);
            $prop['image'] = $filename;
        }
        
        $post->update($prop);

        return redirect()->route('list.prop')
            ->with('success', 'Post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = prop::find($id);
        $destination = 'public/images/'.$post->map;
        $destination2 = 'public/images/'.$post->brochure;
        $destination3 = 'public/images/'.$post->image;
    if(File::exists($destination))
    {
        File::delete($destination);
    }
    if(File::exists($destination2))
    {
        File::delete($destination2);
    }
    if(File::exists($destination3))
    {
        File::delete($destination3);
    }
        $post->delete();

        return redirect()->route('list.prop')
            ->with('success', 'Post deleted successfully');
    }
}
