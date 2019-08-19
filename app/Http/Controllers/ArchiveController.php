<?php

namespace App\Http\Controllers;

use App\Archive;
use Illuminate\Http\Request;
use Carbon\Carbon;
class ArchiveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $issues = Archive::paginate(9);
        return view('archive/index',['issues'=>$issues]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('archive/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
       $this->validate(request(),[
           'title'=>'required|string:max:1000',
       ]);
       if($request->hasFile('cover_page_front')){
        //get file name with extension
        $fileNameWithExt = $request->file('cover_page_front')->getClientOriginalName();
        //get just file name
        $filenames = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
        //get just extension
        $extension = $request->file('cover_page_front')->getClientOriginalExtension();
        //file name to store
        $fileNameToStore = $filenames.'_'.time().'.'.$extension;
        //upload image
        $path = $request->file('cover_page_front')->storeAs('public/cover_page_front/', $fileNameToStore);
    }else{
        $fileNameToStore = 'noimage.jpg';
    }

    if($request->hasFile('cover_page_back')){
        //get file name with extension
        $fileNameWithExt = $request->file('cover_page_back')->getClientOriginalName();
        //get just file name
        $filename = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
        //get just extension
        $extension =  $request->file('cover_page_back')->getClientOriginalExtension();
        //file name to store
        $fileNameToSave = $filename.'_'.time().'.'.$extension;
        //upload image
        $path =  $request->file('cover_page_back')->storeAs('public/cover_page_back/', $fileNameToSave);
    }else{
        $fileNameToSave = 'noimage.jpg';
    }

        $archive = new Archive();
        $archive->title = $request->Input('title');
        $archive->cover_page_front = $fileNameToStore;
        $archive->cover_page_back = $fileNameToSave;
        $archive->subtitle = $request->input('subtitle');
        $archive->description = $request->input('description');

        if($archive->save()){
            return redirect(route('archives.create'))->with('success', "Archive has been created");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Archive  $archive
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $issues = Archive::with('archive_pub')->find($id);
        //dd($issues);
        return view('archive/show')->with('issues',$issues);
    }

    public function current_issue(){
        $issue = Archive::all()->last();
        //dd($issue);
        return view('pages/current')->with('issue',$issue);
    }

    public function prev_issue(){
        $art=Archive::where("created_at",">", Carbon::now()->subMonths(6))->get();
        //dd($art);
        return view('pages/prev')->with('art',$art);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Archive  $archive
     * @return \Illuminate\Http\Response
     */
    public function edit(Archive $archive)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Archive  $archive
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Archive $archive)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Archive  $archive
     * @return \Illuminate\Http\Response
     */
    public function destroy(Archive $archive)
    {
        //
    }
}
