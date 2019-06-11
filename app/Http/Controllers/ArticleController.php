<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paper = Article::all();
        return view('Article/index',['paper'=>$paper]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Article/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //dd($request->all());
        $this->validate(request(), [
            'title' => 'required','string',
            'author_name' => 'required','string',
            'payment_proof' => 'required','string',
            
            'email' => 'required','string',
            'agree'=>'required','boolean',
            
        ]);
       
        if($request->hasFile('filename')){
            //get file name with extension
            $fileNameWithExt = $request->file('filename')->getClientOriginalName();
            //get just file name
            $filenames = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            //get just extension
            $extension = $request->file('filename')->getClientOriginalExtension();
            //file name to store
            $fileNameToStore = $filenames.'_'.time().'.'.$extension;
            //upload image
            $path = $request->file('filename')->storeAs('public/papers/', $fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }

        if($request->hasFile( 'payment_proof' )){
            //get file name with extension
            $fileNameWithExt = $request->file('payment_proof')->getClientOriginalName();
            //get just file name
            $filename = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            //get just extension
            $extension =  $request->file('payment_proof')->getClientOriginalExtension();
            //file name to store
            $fileNameToSave = $filename.'_'.time().'.'.$extension;
            //upload image
            $path =  $request->file('payment_proof')->storeAs('public/Payment_Proof', $fileNameToSave);
        }else{
            $fileNameToSave = 'noimage.jpg';
        }
        $paper = new Article();
        $paper->filename = $fileNameToStore;
        $paper->payment_proof=$fileNameToSave;
        $paper->title = $request->Input('title');
        
        $paper->email = $request->Input('email');
        $paper->phone= $request->Input('phone');
        $paper->phone= $request->Input('city');
        $paper->keywords = $request->Input('keywords');
        $paper->category = $request->Input('category');
        $paper->author_name = $request->Input('author_name');
        $paper->subject_area = $request->Input('subject_area');
        $paper->publication_edition = $request->Input('publication_edition');
        
        $paper->payment_mode = $request->Input('payment_mode');
        $paper->amount = $request->Input('amount');
        $paper->know_us = $request->Input('know_us');
        $paper->agree = $request->Input('agree');
        $archive = Archive::find($paper->publication_edition);
        
        
        $paper->save();
         
           
        return redirect(route('index'))->with('success', 'Paper Submitted Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        //
    }
}
