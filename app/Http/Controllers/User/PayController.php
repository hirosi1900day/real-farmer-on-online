<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Charge;

class PayController extends Controller
{
    public function index(){
        
        return view('pay.index');
    }
    public function payment(Request $request){
        try
        {
            if(\Auth::check()){
                Stripe::setApiKey(env('STRIPE_SECRET'));
            
            $customer = Customer::create(array(
                'email' => $request->stripeEmail,
                'source' => $request->stripeToken
            ));
            
            $charge = Charge::create(array(
                'customer' => $customer->id,
                'amount' => 1000,
                'currency' => 'jpy'
            ));
            
            $user=\Auth::user();
            $point=$user->point;
            $user->point=$point+300;
            $user->save();
            return redirect()->route('user.pay.complete');
            }
            return back();
            
        }
        catch(Exception $e)
        {
            return $e->getMessage();
        }
    }
    public function complete(){
        return view('pay.complete');
    }
}
