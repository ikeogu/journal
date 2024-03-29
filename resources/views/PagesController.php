<?php

namespace App\Http\Controllers;
use App\Product;
use Illuminate\Http\Request;
use App\Category;
use App\Size;
use App\Subcategory;
use App\Colour;
use App\Cart;
use Session;
use DB;
use App\Order;
use Paystack;
use App\User;
use App\Country;
use App\Ads;
use Illuminate\Support\Facades\Auth;
use function Opis\Closure\unserialize;
use Mail;
use Notification;
use App\Notifications\MailSent;
use App\Notifications\NewOrder;

class PagesController extends Controller
{
    
    public function index(){
        //category display in the nav bar
        $categories = category::all();
        $ads = Ads::latest()->take(2)->get();
        $currency = '₦'; 
        //Adult frame subcategory and products on index page
        $glass_cat = $this->categoryQuery('Adult Glass Frames');
        $category = $glass_cat->first();
        $glasses = $category->products ? $category->products->take(4) : null;
        //Kid Frames Subcategory and products
        $kids_frame_cats = $this->categoryQuery('Kids Glass Frames');
        //dd($kids_frame_cats);
        $k_frame_cat = $kids_frame_cats->first();
        $kFrames = $k_frame_cat->products ? $k_frame_cat->products->take(4) : null;
        $products = Product::all()->where('promote', 1)->take(8);
        return view('pages.index', compact(['products','ads','currency','category','glasses','categories','kFrames','k_frame_cat']));
    }

    public function about(){
        $categories = category::all();
        return view('pages.about',compact('categories'));
    }

    public function helpPage(){
        $categories = category::all();
        return view('pages.help',compact('categories')); 
    }

    public function policy(){
        $categories = category::all();
        return view('pages.policy',compact('categories')); 
    }
    public function subcategoryQuery($subcategroy){
        $allSubcats = Subcategory::where('subcategory_name', $subcategroy)->get();
        //$subcats = $allSubcats->take(4);
        //$subcat = $subcats->first();
        
        return $allSubcats;
    }

    public function categoryQuery($categroy){
        $allCats = category::where('category_name', $categroy);
        //$cats= $allCats->take(4);
        //$cat = $allCats->first();
        
        return $allCats;
    }

    public function viewProduct($id){
        $currency = '₦';
        $categories = Category::all();
        $product = Product::findOrFail($id);
        $price = $product->price/100;
        $colours = $product->colours;
        $sizes = $product->sizes;
        $relatedId = $product->category_id;
        $relatedCategory = Category::findOrfail($relatedId);
        $relatedProducts = $relatedCategory->products->take(4);
        return view('pages.view', compact(['price','colours','sizes','categories','relatedProducts','relatedId','currency']))->withProduct($product);
    }

    

    public function profile(){
       if(Auth::user()){
        $countries = Country::all(); 
           //dd($user->orders);
           $orders = Auth::user()->orders;
           $orders->transform(function($order, $key){
               $order->cart = unserialize(base64_decode($order->cart));

               return $order;
           });
           $currency = '₦';
           $categories = Category::all();
           $relatedProducts = Product::latest()->take(8)->get();
        return view('pages.profile',compact(['categories','orders','relatedProducts','countries','currency']));
       }
    }

    public function editProfile($id){
        if(Auth::user()){
        $user = User::findOrFail($id);
        $categories = Category::all();
        $countries = Country::all();
        return view('pages.edit_profile',compact(['user','categories','countries']));
        }

    }

    public function orderDetails($id){
        if(Auth::user()){
        $currency = '₦';
        $order = Order::findOrfail($id);
        $cart = unserialize(base64_decode($order->cart));
        $categories = Category::all();
        return view('pages.order_details', compact(['order', 'cart','categories', 'currency']));
        }
    }

    public function fetchStates(Request $request){
        
        $country_id = $request->country_id;
        $country = Country::findOrFail($country_id);
        $states = $country->states;
        return response()->json(['states' => $states]);
    }

    public function viewByCategory($id){
        $currency = '₦';
        $ads = Ads::latest()->take(2)->get();
        $categories = category::all();
        $category = Category::findOrFail($id);
        $products = $category->products->take(12);
        return view('pages.see_all',compact(['category','products','categories','currency','ads']));
    }

    public function viewBySubcategory($id){
        $currency = '₦';
        $ads = Ads::latest()->take(2)->get();
        $categories = Category::all();
        $category = Category::findOrFail($id);
        $products = $category->products->take(4);
        return view('pages.see_all',compact(['category','products','categories','currency','ads']));
    }

    public function searchProduct(Request $request){
        $name = $request->name;
         $searchProducts = DB::table('products')->where('product_name','like',"%$name%" )->orWhere('serial_number','like',"%$name%" )->get();
        return response()->json(['products' => $searchProducts]);
    }


    public function addToCart(Request $request){
        //dd($request->all());
        $product_id = $request->product_id;
        if($request->id){
            $cart_id = $request->id;
        }else{
            $cart_id = $product_id;
        }
        
        $product = Product::findOrFail($product_id);
        $colour = $request->colour ? $request->colour : "Available";
        $size = $request->size ? $request->size : "normal";
        $qty = $request->quantity ? $request->quantity : 1;
        $oldCart = $request->session()->has('cart') ? $request->session()->get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $cart_id, $colour, $size, $qty);

        $request->session()->put('cart', $cart);
        return back();
    }

    public function getCart(Request $request){
        //dd(request()->session()->get('cart'));
        $currency = '₦';
        $ads = Ads::latest()->take(2)->get();
        $categories = Category::all();
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $products = $cart->items;
        $totalPrice = $cart->totalPrice;
        $totalQty = $cart->totalQty;
        $relatedProducts = Product::all()->take(4);
        return  view('pages.cartView', compact(['categories','products','ads','totalPrice','totalQty','relatedProducts','currency']));
    }

    public function reduceItemByOne($id){
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($id);
        Session::put('cart', $cart);
        return back();
        
    }

    public function removeItem($id){
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        Session::put('cart', $cart);
        return back();
    }

    public function emptyCart(){
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        Session::forget('cart');
        $cart = null;

      return redirect(route('index'));
   }

   public function checkout(){
    if(Auth::user()){
       $user = Auth::user();
       $currency = '₦';
       $countries = Country::all();
    $categories = Category::all();
    $oldCart = Session::has('cart') ? Session::get('cart') : null;
    $cart = new Cart($oldCart);
    $products = $cart->items;
    $totalPrice = $cart->totalPrice;
    $totalPriceCheckout = $cart->totalPrice*100;
    $totalQty = $cart->totalQty;
    return  view('pages.checkout', compact(['categories','products','totalPrice','totalQty','totalPriceCheckout','user','countries','currency']));
    }
   }

       /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */
    public function redirectToGateway()
    {
        if(Auth::user()){
        request()->metadata = json_encode(request()->all());
        return Paystack::getAuthorizationUrl()->redirectNow();
        }
    }
    

    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback()
    {
        if(Auth::user()){
        $paymentDetails = Paystack::getPaymentData();

       //dd($paymentDetails);
        $paymentDetails = Paystack::getPaymentData();
        $cart = Session::get('cart');
       // $cart = new Cart($oldCart);
        if($paymentDetails){
            $order = new Order();
            $order->order_id = $paymentDetails['data']['reference'];
            $order->amount = $paymentDetails['data']['amount'];
            $order->state = $paymentDetails['data']['metadata']['state'];
            $order->address = $paymentDetails['data']['metadata']['address'];
            $order->full_name = $paymentDetails['data']['metadata']['first_name']. " " .$paymentDetails['data']['metadata']['last_name'];
            $order->country = $paymentDetails['data']['metadata']['country'];
            $order->city = $paymentDetails['data']['metadata']['city'];
            $order->quantity = $paymentDetails['data']['metadata']['quantity'];
            $order->phone = $paymentDetails['data']['metadata']['phone'];
            $order->email = $paymentDetails['data']['metadata']['email'];
            $order->paid_at = $paymentDetails['data']['paidAt'];
            $order->currency = $paymentDetails['data']['currency'];
            $order->cart =  base64_encode(serialize($cart));
            $order->status = "Pending";
            if(Auth::user()){
                $order->user_id = Auth::user()->id;
            }
            $order->save();
            $user = User::findOrFail($order->user_id);
            $user->notify(new NewOrder($order->order_id));

        }
        $this->emptyCart();
                return redirect(route('profile'));
    }

        // Now you have the payment details,
        // you can store the authorization_code in your db to allow for recurrent subscriptions
        // you can then red
        //redirect or do whatever you want
    }
    public function getContactForm(){
        
        return 'contact form';
    }

    public function postContact(Request $request){
        $this->validate($request,[
            'email' => 'required|email',
            'subject' => 'min:3',
            'phone' => 'required',
            'body' => 'string',
            'name' => 'required'
        ]);

        $data = [
            'email' => $request->email,
            'subject' => $request->subject,
            'phone' => $request->phone,
            'bodyMessage' => $request->body,
            'name' => $request->name
        ];

        Mail::send('email.contact', $data, function($message) use ($data){
            $message->from($data['email']);
            $message->to('solomoreal@yahoo.com');
            $message->subject($data['subject']);
        });

        Notification::route('mail', $request->email)
            ->notify(new MailSent());
            return redirect(route('about'));
    }
    
    public function postComplain(Request $request){
        if(Auth::user()->role = 'Customer'){
        $this->validate($request,[
            'email' => 'required|email',
            'subject' => 'min:3',
            'phone' => 'required',
            'body' => 'string',
            'order_id' => 'nullable'

        ]);

        $data = [
            'email' => $request->email,
            'subject' => $request->subject,
            'phone' => $request->phone,
            'bodyMessage' => $request->body,
            'name' => $request->name,
            'order_id' => $request->order_id
        ];

        Mail::send('email.complain', $data, function($message) use ($data){
            $message->from($data['email']);
            $message->to('solomoreal@yahoo.com');
            $message->subject($data['subject']);
        });

        Notification::route('mail', $request->email)
            ->notify(new MailSent());
            return back()->with('success', 'Message Sent');
    }
    }

    public function customerInvoice($id){
        if(Auth::user()->role = 'Customer'){
        $user = Auth::user();
        $currency = '₦';
        $order = Order::findOrfail($id);
        $cart = unserialize(base64_decode($order->cart));
        return view('pages.customer_invoice', compact(['user','currency','order','cart']));
        }

    }

     

     


}
