<?php
namespace App\Http\Controllers\Auth;
namespace App\Http\Controllers;

use App\User;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Paystack;
use App\Payment;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */
    public function redirectToGateway()
    {
        request()->metadata = json_encode(request()->all());
        return Paystack::getAuthorizationUrl()->redirectNow();
    }

    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback()
    {

        //$customer= Paystack::getAllCustomers();
        //dd($customer);
        $paymentDetails = Paystack::getPaymentData();
        //dd($paymentDetails);

        $paid = new Payment();

        $paid->reference =  data_get($paymentDetails, 'data.reference');
        $paid->amount = data_get($paymentDetails, 'data.amount');
        $paid->gateway_response= data_get($paymentDetails, 'data.gateway_response');
        $paid->customer_code = data_get($paymentDetails, 'data.customer.customer_code');
        $paid->customer_email = data_get($paymentDetails, 'data.customer.email');
        $paid->customer_name = data_get($paymentDetails, 'data.metadata.user_name');
        $paid->bank = data_get($paymentDetails, 'data.authorization.bank');
        $paid->card_type = data_get($paymentDetails, 'data.authorization.card_type');

        $paid->status =data_get($paymentDetails, 'status');
        $paid->paid_at =data_get($paymentDetails, 'data.paidAt');
        $paid->user_id = auth()->user()->id;
        $user = User::find($paid->user_id);
        $paid->order_id = data_get($paymentDetails, 'data.metadata.order_id');

        if($paid->order_id == 1){
            if($user->payments()->save($paid)){
            // dd($paid);
                return view('Article/single_article',['paid'=>$paid])->with('success', 'Transfer Successful');
            }
        }elseif ($paid->order_id == 2) {
            # code...
            if($user->payments()->save($paid)){
                // dd($paid);

                    return redirect(route('papers.create', ['paid'=>$paid]))->with('success', 'Transfer Successful');
            }
        }

    }

    public function create(){
        $fee = \App\Fee::all();
        return view('Payment/maKepayment',['fee'=>$fee]);
    }


}
