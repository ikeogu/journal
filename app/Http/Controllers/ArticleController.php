<?php

namespace App\Http\Controllers;

use App\Article;
use App\Payment;
use Illuminate\Http\Request;
use Auth;
use App\User;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
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

    public function create2()
    {
        return view('Article/single_article');
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
            'reference_code' => 'required','string',

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
            $path = $request->file('filename')->storeAs('public/submited_articles/', $fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }


        $paper = new Article();
        $paper->filename = $fileNameToStore;

        // for refrence code


        $paper->title = $request->Input('title');

        $paper->email = $request->Input('email');
        $paper->phone= $request->Input('phone');
        $paper->phone= $request->Input('city');
        $paper->keywords = $request->Input('keywords');
        $paper->category = $request->Input('category');
        $paper->abstract = $request->Input('abstract');

        $paper->author_name = $request->Input('author_name');
        $paper->subject_area = $request->Input('subject_area');
        $paper->publication_edition = $request->Input('publication_edition');


        $paper->know_us = $request->Input('know_us');
        $paper->agree = $request->Input('agree');
        $paper->user_id = Auth()->user()->id;
        $user = User::find($paper->user_id);

        $user->articles()->save($paper);


        return redirect(route('index'))->with('success', 'Paper Submitted Successfully. You\'ll be Contacted Soon.');
    }

    public function single_article(Request $request)
    {

        //dd($request->all());
        $this->validate(request(), [
            'title' => 'required','string',
            'author_name' => 'required','string',
            'reference_code' => 'required','string',

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
            $path = $request->file('filename')->storeAs('public/articles/', $fileNameToStore);
        }else{
            $fileNameToStore = 'nofile.pdf';
        }


        $paper = new Article();
        $paper->filename = $fileNameToStore;

        $paper->title = $request->Input('title');

        $paper->email = $request->Input('email');
        $paper->phone= $request->Input('phone');
        $paper->phone= $request->Input('city');
        $paper->keywords = $request->Input('keywords');
        $paper->category = $request->Input('category');
        $paper->abstract = $request->Input('abstract');

        $paper->author_name = $request->Input('author_name');
        $paper->subject_area = $request->Input('subject_area');



        $paper->know_us = $request->Input('know_us');
        $paper->agree = $request->Input('agree');
        $paper->user_id = Auth()->user()->id;
        $user = User::find($paper->user_id);


        $user->articles()->save($paper);


        return redirect(route('index'))->with('success', 'Article Submitted Successfully. You\'ll be Contacted Soon');
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
