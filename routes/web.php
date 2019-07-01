<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Category;
use App\Publish;
use Illuminate\Support\Facades\Input;


Route::get('/', function () {
    $cat = Category::all();

    return view('pages/index')->with('cat',$cat);

})->name('index');
Route::get('/contact', function () {
    return view('pages/contact');
});
Route::get('/about','EditorCOntroller@editors');
Route::get('/login', function () {
    return view('pages/login');
});
Route::get('/author_s', function () {
    return view('pages/authors');
});
Route::get('/readers', function () {
    return view('pages/reader');
});
Route::get('/compose', function () {
    return view('Mail/compose');
});
Route::get('/inbox', function () {
    return view('Mail/inbox');
});
Route::get('/read', function () {
    return view('Mail/read');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/papers','ArticleController');
Route::post('/papers','ArticleController@store')->name('pap');
Route::post('/single-papers','ArticleController@single_article')->name('single');

Route::resource('archives', 'ArchiveController');
Route::resource('publish', 'PublishController');
Route::resource('editors','EditorController');
Route::resource('category','CategoryController');
Route::resource('fee','FeeController');
Route::get('/current_issue','ArchiveController@current_issue')->name('current');
Route::get('/prev_issue','ArchiveController@prev_issue')->name('prev');

//logout
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');

//for single article post
Route::get('/single','ArticleController@create2')->name('sing');

//
Route::get('/downloadPDF/{id}','PublishController@downloadPDF')->name('download');
Route::get('/readfile/{id}','PublishController@readBook')->name('preview');

//admin Pages
Route::get('/admin_dashboard','AdminController@index')->name('dash');
Route::get('/allusers','AdminController@allusers')->name('user');
Route::get('/contact_users','AdminController@contact')->name('contact_us');
Route::get('/allarticles','AdminController@allarticles')->name('articles');
Route::get('/allarchives','AdminController@archives')->name('archives');
Route::get('/alleditors','AdminController@editors')->name('editors');
Route::get('/removeditors','AdminController@removedit')->name('remove');
Route::get('/verifed_payment','AdminController@transaction')->name('tranx');

//Route::get('/all_editors','AdminController@editboard')->name('edit');
//paystack
Route::get('/make_payment','PaymentController@create')->name('makepay');
Route::post('/pay', 'PaymentController@redirectToGateway')->name('pay');
Route::get('/payment/callback', 'PaymentController@handleGatewayCallback');



//editor
Route::get('/resume/{id}','EditorController@resume')->name('cv');

/// search function
Route::any('/search',function(){
    $query = Input::get ( 'q' );
    $publish = Publish::where('title','like','%'.$query.'%')
    ->orWhere('abstract','like','%'.$query.'%')
    ->orWhere('author_name','like','%'.$query.'%')
    ->orWhere('no_pages','like','%'.$query.'%')
    ->orWhere('authors_email','like','%'.$query.'%')
    ->orWhere('keywords','like','%'.$query.'%')->limit(8)
    ->get();
    if(count($publish) > 0){
        return view('search')->withDetails($publish)->withQuery ( $query );
    }
    else{
    return view ('search')->with('No Details found. Try to search again !');
    }
})->name('search');

//contact us
Route::get('/contact-us', 'ContactUSController@contactUS');
Route::post('/contact_us', 'ContactUSController@contactUSPost')->name('contacts');


