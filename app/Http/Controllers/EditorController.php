<?php

namespace App\Http\Controllers;

use App\Editor;
use Illuminate\Http\Request;

class EditorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $editors = Editor::all();
        return view('Admin/alleditors',['editors'=>$editors]);
    }

    public function editors(){
        $editor = Editor::where('status',1)->get();
        return view('pages/about',['editor'=>$editor]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('editor/create');
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
        'fullname'=> 'required|string',
        'email' =>'required|string',
        'qualification'=>'required|string',

       ]);

       if($request->hasFile('resume')){
           //get file name with extension
           $fileNameWithExt = $request->file('resume')->getClientOriginalName();
           //get just file name
           $filename = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
           //get just extension
           $extension =  $request->file('resume')->getClientOriginalExtension();
           //file name to store
           $fileNameToSave = $filename.'_'.time().'.'.$extension;
           //upload image
           $path =  $request->file('resume')->storeAs('public/Resume/', $fileNameToSave);
       }else{
           $fileNameToSave= 'nofile.mime';
       }


       $editor = new Editor();
       $editor->salutation = $request->Input('salutation');
       $editor->fullname  = $request->Input('fullname');
       $editor->gender  =  $request->Input('gender');
       $editor->email =  $request->Input('email');
       $editor->position =  $request->Input('position');
       $editor->qualification  =  $request->Input('qualification');
       $editor->current_org =  $request->Input('current_org');
       $editor->research_area =  $request->Input('research_area');
       $editor->phone =  $request->Input('phone');
       $editor->authored_pub =  $request->Input('authored_pub');
       $editor->books_authored=  $request->Input('books_authored');

       $editor->resume = $fileNameToSave;
       //dd($editor);

        if($editor->save()){

           return redirect(route('editors.create'))->with('success', "Application sent Successfully! Kindly wait for our Response.");
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Editor  $editor
     * @return \Illuminate\Http\Response
     */
    public function show(Editor $editor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Editor  $editor
     * @return \Illuminate\Http\Response
     */
    public function edit(Editor $editor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Editor  $editor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $editor)
    {
       $edit = Editor::findOrFail($editor);
       $edit->status = $request->input('status');
       $edit->save();

       if($edit){
            return redirect(route('editors'))->with('Applicant is Made an Editor!');

        }
        else{
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Editor  $editor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Editor $editor)
    {
        //
    }

    public function resume($id)
    {
        $file = Editor::findOrFail($id);
        $file_path = public_path('storage/Resume/'.$file->resume);
        return response()->file($file_path);

    }
}
