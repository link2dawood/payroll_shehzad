<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\Comp;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
   

   
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {
            $comp = Comp::all();
    
            return view('compnay.view',compact('comp'));
        }
    
        /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */
        public function store(Request $request)
        {    $company =$request->all();
           
    

            if($request->file('document'))
            {
                $destinationPath = 'public/images/';
                $file = $request->file('document');
                $extention = $file->getClientOriginalExtension();
                $filename = time().'.'.$extention;
                $file->move($destinationPath, $filename);
                $company['document'] = $filename;
            }
            if($request->file('logo'))
            {
                $file = $request->file('logo');
                $extention = $file->getClientOriginalExtension();
                $filename = time().'m.'.$extention;
                $file->move('public/images/', $filename);
                $company['logo'] = $filename;
            }
            
            Comp::create($company);
            // sleep(1s);
            return redirect()->route('list')
                ->with('success', 'Post created successfully.');
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

            $company = $request->all();
          
            $post = Comp::find($id);
            if($request->file('document'))
            {
                $destination = "public/images/".$post->document;

                if(File::exists($destination))
                {
                    File::delete($destination);
                }
                $file = $request->file('document');
                $extention = $file->getClientOriginalExtension();
                $filename = time().'.'.$extention;
                $file->move('public/images/', $filename);
                $company['document'] = $filename;
            }
            if($request->file('logo'))
            {
                $destination = "public/images/".$post->logo;
                // dd($destination);

                if(File::exists($destination))
                { 

                    File::delete($destination);
                }
                $file = $request->file('logo');
                $extention = $file->getClientOriginalExtension();
                $filename = time().'m.'.$extention;
                $file->move('public/images/', $filename);
                $company['logo'] = $filename;
            }
            $post->update($company);
    
            return redirect()->route('list')
                ->with('success', 'Post updated successfully.');
        }
    
        /**
         * Remove the specified resource from storage.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function destroy($id)
        {
    
            $post = Comp::find($id);
            $destination = asset("images/".$post->document);
            $destination2 = asset("images/".$post->logo);
        if(File::exists($destination))
        {
            File::delete($destination);
        }
        if(File::exists($destination2))
        {
            File::delete($destination2);
        }
            $post->delete();
    
            return redirect()->route('list')
                ->with('success', 'Post deleted successfully');
        }
    
        // routes functions
        /**
         * Show the form for creating a new post.
         *
         * @return \Illuminate\Http\Response
         */
        public function create()
        {
            return view('compnay.create');
        }
    
    
        /**
         * Display the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function show($id)
        {
            $post = Comp::find($id);
    
            return view('posts.show', compact('post'));
        }
    
        /**
         * Show the form for editing the specified post.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function edit($id)
        {
            $comp = Comp::find($id);
    
            return view('compnay.edit', compact('comp'));
        }
    
}
