<?php

namespace App\Http\Controllers;

use App\Publish;
use App\Archive;
use Illuminate\Http\File;
use PDF;
use Illuminate\Http\Request;

class PublishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $publish = Publish::all();
        return view('Publish/index',['publish'=>$publish]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $archive = Archive::all();

        return view('Publish/create',['archive'=>$archive]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(),[
            'title'=>'required|string:max:1000',
            'abstract'=>'required|string:max:1000000',
            'authors_email'=>'required|string:max:100',
            'author_name'=>'required|string:max:1000',
            'no_pages'=>'required|string:max:8',
            
            
        ]);
    if($request->hasFile('filename')){
        //get file name with extension
        $fileNameWithExt = $request->file('filename')->getClientOriginalName();
        //get just file name
        $filename = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
        //get just extension
        $extension =  $request->file('filename')->getClientOriginalExtension();
        //file name to store
        $fileNameToSave = $filename.'_'.time().'.'.$extension;
        //upload image
        $path =  $request->file('filename')->storeAs('public/published/', $fileNameToSave);
    }else{
        $fileNameToSave= 'nofile.mime';
    }

    $publish = new Publish();
    
    $publish->title = $request->Input('title');
    $publish->abstract = $request->Input('abstract');
    $publish->author_name =  $request->Input('author_name');
    $publish->authors_email =  $request->Input('authors_email');
    $publish->keywords =  $request->Input('keywords');
    $publish->no_pages =  $request->Input('no_pages');
    $publish->archive_id=  $request->Input('archive_id');
       
    $archive = Archive::find($publish->archive_id); 
         
    $publish->filename = $fileNameToSave;

    if($archive->archive_pub()->save($publish)){

        return redirect(route('publish.create'))->with('success', "Article has been Published");
    }

       
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Publish  $publish
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $publish = Publish::find($id);
        //dd($publish );
        return view('Publish/show')->with('publish',$publish);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Publish  $publish
     * @return \Illuminate\Http\Response
     */
    public function edit(Publish $publish)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Publish  $publish
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Publish $publish)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Publish  $publish
     * @return \Illuminate\Http\Response
     */
    public function destroy(Publish $publish)
    {
        //
    }

    public function downloadPDF($id){
        $article= Publish::find($id);
        //dd($article);
        $file_path = public_path('storage/published/'.$article->filename);
        return response()->download($file_path);
          
         
    }
    public function readBook($id)
    {
        $file = Publish::findOrFail($id);
        $file_path = public_path('storage/published/'.$file->filename);
        return response()->file($file_path);
          
    }
}
