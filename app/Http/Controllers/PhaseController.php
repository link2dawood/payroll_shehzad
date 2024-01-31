<?php

namespace App\Http\Controllers;

use App\Models\Phase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PhaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $phase = Phase::all();
    
        return view('phase.view' ,compact('phase'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('phase.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $phase =$request->all();
           
    

        if($request->file('map'))
        {
            $destinationPath = 'public/images/';
            $file = $request->file('map');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move($destinationPath, $filename);
            $phase['map'] = $filename;
        }
        if($request->file('brochure'))
        {
            $file = $request->file('brochure');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'g.'.$extention;
            $file->move('public/images/', $filename);
            $phase['brochure'] = $filename;
        }
        if($request->file('image'))
        {
            $destinationPath = 'public/images/';
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'k.'.$extention;
            $file->move($destinationPath, $filename);
            $phase['image'] = $filename;
        }
        Phase::create($phase);
        return redirect()->route('list.phase')
            ->with('success', 'Post created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Phase  $phase
     * @return \Illuminate\Http\Response
     */
    public function show(Phase $phase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Phase  $phase
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $phase = Phase::find($id);
    
            return view('phase.edit', compact('phase'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Phase  $phase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $phase =$request->all();
        $post = Phase::find($id);
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
            $phase['map'] = $filename;
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
            $filename = time().'m.'.$extention;
            $file->move('public/images/', $filename);
            $phase['brochure'] = $filename;
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
            $filename = time().'m.'.$extention;
            $file->move('public/images/', $filename);
            $phase['image'] = $filename;
        }
       
        $post->update($phase);

        return redirect()->route('list.phase')
            ->with('success', 'Post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Phase  $phase
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Phase::find($id);
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

        return redirect()->route('list.phase')
            ->with('success', 'Post deleted successfully');
    }
}
