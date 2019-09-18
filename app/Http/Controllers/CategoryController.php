<?php

namespace App\Http\Controllers;

use App\Category;
use App\Publish;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except(['index2','pubs']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $cat = Category::all();
       return view('Admin/allcat',['cat'=>$cat]);
    }
    public function index2()
    {
       $cat = Category::paginate(5);
       return view('pages/categories',['cat'=>$cat]);
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('Admin/category');
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
            'name' => 'required|string',
            'description' => 'required|string',
        ]);

        $cat = new Category();
        $cat->name = $request->input('name');
        $cat->description = $request->input('description');
        if($cat->save()){
            return redirect(route('category.create'))->with('success','Category Created.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($category)
    {
        $cat = Category::find($category);
        return view('category/edit',['cat'=>$cat]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        Category::whereId($category->id)->update($request->except(['_method','_token']));
        return redirect(route('category.index'))->with('success', ' Updated');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($category)
    {
        $cat = Category::find($category);
        $cat->delete();
        return redirect(route('category.index'))->with('success','Deleted');
    }   
    
    // list of funtions for category views.
    public function pubs($id){
        $publish = Publish::where('category_id',$id)->paginate(5);
        return view('pages/pub_art',['publish'=>$publish]);
    }
}
