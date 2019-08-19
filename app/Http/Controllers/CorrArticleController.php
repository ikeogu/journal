<?php

namespace App\Http\Controllers;

use App\CorrArticle;
use Auth;
use App\User;
use App\Payment;
use Illuminate\Http\Request;

class CorrArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function single()
    {
       return view('CorrArticle/single');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'customer_code' => 'required','string',

            'email' => 'required','string',

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
            $path = $request->file('filename')->storeAs('public/corrected_articles/', $fileNameToStore);
        }else{
            $fileNameToStore = 'nofilename.txt';
        }


      $corrected_article = new CorrArticle();
      $corrected_article->filename = $fileNameToStore;

        // for refrence code


      $corrected_article->title = $request->Input('title');

      $corrected_article->email = $request->Input('email');
      $corrected_article->phone= $request->Input('phone');
      $corrected_article->phone= $request->Input('city');
      $corrected_article->keywords = $request->Input('keywords');
      $corrected_article->category = $request->Input('category');
      $corrected_article->abstract = $request->Input('abstract');
      $corrected_article->amount = $request->input('amount');
      $corrected_article->customer_code = $request->input('customer_code');
      $paid = Payment::find($corrected_article->customer_code);
      $corrected_article->pay()->associate($paid);
      $corrected_article->author_name = $request->Input('author_name');
      $corrected_article->subject_area = $request->Input('subject_area');
      $corrected_article->payment_mode = $request->input('payment_mode');
      $corrected_article->publication_edition = $request->Input('publication_edition');
      $corrected_article->user_id = Auth()->user()->id;
      $user = User::find( $corrected_article->user_id);

        $user->articles()->save($corrected_article);


        return redirect(route('index'))->with('success', 'Congratulations! Your Article is about to be published.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CorrArticle  $corrArticle
     * @return \Illuminate\Http\Response
     */
    public function show(CorrArticle $corrArticle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CorrArticle  $corrArticle
     * @return \Illuminate\Http\Response
     */
    public function edit(CorrArticle $corrArticle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CorrArticle  $corrArticle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CorrArticle $corrArticle)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CorrArticle  $corrArticle
     * @return \Illuminate\Http\Response
     */
    public function destroy(CorrArticle $corrArticle)
    {
        //
    }

    public function single_article(Request $request)
    {

        //dd($request->all());
        $this->validate(request(), [
            'title' => 'required','string',
            'author_name' => 'required','string',
            'customer_code' => 'required','string',

            'email' => 'required','string',

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


        $corrected_article = new CorrArticle();
        $corrected_article->filename = $fileNameToStore;

        $corrected_article->title = $request->Input('title');

        $corrected_article->email = $request->Input('email');
        $corrected_article->phone= $request->Input('phone');

        $corrected_article->keywords = $request->Input('keywords');
        $corrected_article->category = $request->Input('category');
        $corrected_article->abstract = $request->Input('abstract');

        $corrected_article->author_name = $request->Input('author_name');
        $corrected_article->subject_area = $request->Input('subject_area');
        $corrected_article->amount = $request->input('amount');
        $corrected_article->customer_code = $request->input('customer_code');
        $paid = Payment::find($corrected_article->customer_code);
        $corrected_article->pay()->associate($paid);
        $corrected_article->payment_mode = $request->input('payment_mode');


        $corrected_article->user_id = Auth()->user()->id;
        $user = User::find($corrected_article->user_id);


        $user->articles()->save($corrected_article);


        return redirect(route('index'))->with('success',  'Congratulations! Your Article is about to be published.');
    }

}
