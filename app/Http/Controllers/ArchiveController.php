<?php

namespace App\Http\Controllers;

use App\Archive;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Category;
use App\Table_Of_Content;
class ArchiveController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index','current_issue','prev_issue','show']);
    }
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
        $cat = Category::all();
        $cont = Table_Of_Content::all();
        return view('archive/create',['cat'=>$cat,'cont'=>$cont]);
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
        $archive->table_of_content = "hello";
        $archive->category_id = $request->cat_id;
       
        
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
    public function edit($archive)
    {
       $arch = Archive::find($archive);
       return view('archive/edit',['arch'=>$arch]);
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
        Archive::whereId($archive->id)->update($request->except(['_method','_token']));
        return redirect(route('archives'))->with('success', ' Updated');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Archive  $archive
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $del = Archive::find($id);
        $del->delete();
        return redirect(route('archives'))->with('success', ' Deleted');
    }
}
